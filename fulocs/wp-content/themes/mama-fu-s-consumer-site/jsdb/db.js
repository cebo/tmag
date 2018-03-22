
if (!system.httpd) 
{
load('httpd.js')
load('xml2.js')
system.httpd = new HTTPD();
system.runhttpd = true;
}

system.databases = {};

function database(name)
{
 if (!name) return null;
 if (name in system.databases) return system.databases[name];
 return system.databases[name] = new SQLite(name+'.sqlite');
}

//server config
system.httpd.forbidden = ['httpd.js','db.js']

//establish a database
if (!system.database) system.database =  new SQLite('data.sqlite');

function escapeSQL(src) {return src.replace(/'/g,"''")}

system.httpd.functions["ls"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   client.writeln(JSON.stringify(system.folders(system.cwd + (data.path || ''))))
  }

system.httpd.functions["echo"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   client.writeln(JSON.stringify(data))
  }

//intended to be called by AJAX
system.httpd.functions["databases"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   var result = system.files("*.sqlite")
   client.writeln(JSON.stringify(result))
  }

//intended to be called by AJAX
system.httpd.functions["tables"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   var db = database(data.name)
   if (db) client.writeln(JSON.stringify(db.tables()));   
  }

//intended to be called by AJAX
system.httpd.functions["insert"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   var table = data.table
   if (!table) return;
   var columns = system.database.columns(table)
   var fields = ''
   var values = ''
   for each (var c in columns)
   {
    if (!data[c]) continue
    fields += ",'" + escapeSQL(c) + "'"
    values += ",'" + escapeSQL(data[c]) + "'"
   }
   fields = fields.substr(1)
   values = values.substr(1)
   var cmd = "insert into " + table + " (" + fields + ") values (" + values + ")"
   var result = system.database.exec(cmd)
   if (!result) 
   {
    writeln(cmd)
    writeln(system.database.error)
   } 
   client.writeln(result)
  }

//CREATE TABLE foobar (id INTEGER PRIMARY KEY AUTOINCREMENT, ...)
//intended to be called by AJAX
system.httpd.functions["update"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   var table = data.table
   delete data.table
   var fields = ''
   var values = ''
   for (var i in data)
   {
    fields += ",'" + escapeSQL(i) + "'"
    values += ",'" + escapeSQL(data[i]) + "'"
   }
   fields = fields.substr(1)
   values = values.substr(1)
   var cmd = "insert into " + table + " (" + fields + ") values (" + values + ")"
   var result = system.database.exec(cmd)
   client.writeln(result)
  }

if (system.runhttpd)
{
 server.run();
 delete server;
}
