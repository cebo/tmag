/**about
Description: JSDB reference web server
Creator: Shanti Rao
Version: 5
Date: 20110910
Requires: jsdb-1.8.0.6; javascript-1.7
*/
/**help
Basic use of the web server

var server = new HTTPD()  //creates a web server instance
server.run(8080,true)     //runs the server on port 8080, and tries to open a browser to view it

Advanced use

var server = new HTTPD({debug: false})
server.hosts = ['localhost']     //restrict access
server.handlers["jsp"] = HTTPD.execJSP //enable server-parsed JavaScript pages 
                                 //you can add special handlers for other types, too
server.functions["quit"] = function(client, data, httpd)
  {
    httpd.stop();
    client.writeln("Content-type: text/html");
    client.writeln();
    client.close();
  }
server.folders['virtual']='/opt/www/directory'
*/
/**Todo
- adjust Expires and If-modified-since to return 304 Not Modified 
- use system.wait() to efficiently handle multiple simultaneous connections. Have a "pending" queue of connections and a state machine for filling in the header and flagging them as ready for handling.
*/

function HTTPD(options)
{
 options=options||{}
 this.debug = options.debug || false
 this.http = null;
 this.running = true; //set this.running = false to exit the server
 this.types = {'html': "text/html; charset=utf-8", 
              'htm': "text/html", 
              'png': "image/png", 
              'gif': "image/gif", 
              'jpeg': "image/jpeg", 
              'jpg': "image/jpeg", 
              'txt': "text/plain",
              'css': "text/css",
              'svg': "image/svg+xml",
              'js': "application/x-javascript",
              '*': "application/x-unknown"}
 this.handlers = {'jsp': HTTPD.execJSP, 'jsc': HTTPD.execCGI}
 this.functions = {}
 this.folders={} //remap page names, such as 'data':"../data/20110621"
 this.functions["quit"] = function(client, data, page, httpd)
  {
    httpd.running = false;
    client.writeln("Content-type: text/html");
    client.writeln()
    client.close()
  }
  
 this.hosts = [system.name,'localhost']
 if (system.platform != 'Windows') 
 {
  let a = new Stream('exec://ifconfig -a')
  this.hosts.concat(a.readFile().match(/inet.*?\d+\.\d+\.\d+\.\d+/g).map(function(x)x.replace('inet ','')))
  a.close()
 }
 
 var indexOrder = ['index.html','index.jsp'];
 this.index = HTTPD.directory ; //'index.html'
 for each (let n in indexOrder) if (system.exists(n)) {this.index=n; break;}
 this.forbidden = ['httpd.js']
}

HTTPD.prototype.toStream = function() 
{
 return this.httpd;
}

HTTPD.prototype.home = function(client,data)
{
 client.writeln("Content-type: text/html");
 client.writeln();

 client.writeln("<html><body><p>Hello, world!</p>")

 client.writeln("HTTP headers\n<pre>"); 
 if (client.header)
 client.writeln(client.header.toString())
 client.writeln("</pre>")

 client.writeln("Form fields\n<pre>");
 if (data)
 client.writeln(data.toString())
 client.writeln("</pre>")

 client.writeln("</body></html>");
}

HTTPD.prototype.sendOK = function(client)
{
 client.writeln("HTTP/1.1 200 OK");
 client.writeln("Client: close");
 client.writeln("Date: ", client.startTime.toUTCString());
 client.writeln("Expires: ", 0);
 client.writeln("Server: JSDB/"+system.version);
}

HTTPD.prototype.sendERROR = function(client)
{
 client.writeln("HTTP/1.1 404 NOT FOUND");
 client.writeln("Client: close");
 client.writeln("Date: ", client.startTime.toUTCString());
 client.writeln("Expires: ", 0);
 client.writeln("Server: JSDB/"+system.version);
 client.writeln("Content-type: text/html\n");
 client.writeln("<H2>HTTP/1.1 404 Not Found</H2>");
 client.writeln("<br>URL:",client.uri);
 client.writeln("<br><a href=/>Home</a>");
 client.close();
}

HTTPD.prototype.stop = function()
{
 this.running = false
}

HTTPD.prototype.start = function(port, browser)
{
 if (!port) port = 8080
 if (this.http != null) return;

 this.http = null;
 var lastPort = port + 100
 for (; this.http == null && port < lastPort; port++)
  {
  try {
   this.http = new Server(port);
   } catch(err)
   {
    writeln('Port ', port,' appears to be in use');
   }
  }

 let address = this.http.toString().replace(/:.*/,'');
 

 if (this.hosts.length && this.hosts.indexOf(this.http.hostName) == -1)
  this.hosts.push(this.http.hostName);
  
 if (this.hosts.length && this.hosts.indexOf(address) == -1)
  this.hosts.push(address);
  
 if (this.debug && this.hosts.length) writeln("Accept from ",this.hosts);
 
 writeln("Server started on port " , this.http.port , " on ", this.http.hostName);
 if (browser)
 {
  let url = 'http://'+this.http.toString() + '/' + (typeof browser == "string" ? browser : "")
  system.browse(url)
  writeln("Browsing ",url);
 }

 this.running = true
// while (this.running && !system.kbhit())
}

HTTPD.prototype.run = function(port, browser)
{
 var needgc = false
 this.start(port,browser)
 while (this.running && !system.kbhit())
  if (this.http.wait(1000))
    needgc = this.step();
  else if (needgc)
    system.gc();
 this.finish()
}
HTTPD.prototype.step = function()
 {
   let client = this.http.accept(0);
   if (client == null)
    return false;
      
   if (this.hosts.length && this.hosts.indexOf(client.name) == -1)
   {
    writeln('Rejected ',client.name)
    writeln('Allowed: ',this.hosts)
    client.close()
    return true;
   }
   if (this.debug) writeln('Connected ',client.name)
   return this.handleRequest(client,client.readLine())
}

HTTPD.prototype.handleRequest = function(client,request)
{
   request = request.split(/\s+/); //GET /index.html HTTP/1.1
   if (this.debug) writeln(request)

   client.method = request[0];
   client.uri = request[1];
   if (client.uri == null || client.uri == '') client.uri = '/';
   client.version = request[2];
   //give enough time for the header packet to arrive
   
   if (!client.canRead) client.wait(500)
   client.startTime = new Date();
   client.header = new Record;
   client.readMIME(client.header);
   
   client.page = decodeURI(client.uri.substr(1));
   client.query = ''
   request = client.uri.match(/\/?([^?]*)\?(.*)/);
   if (request != null)
    {
     client.page = request[1];
     client.query = request[2];
    }

   let rawData = null
   client.data = {}
   if (client.method == "GET" && client.query)
      rawData = client.query
   else if (client.method = "POST" && client.header)
   {
      //wait for data to come over the socket. 
      //smarter: add tp the queue and wait until it's done
      client.dataLength = client.header.get('Content-length')
      var l = client.dataLength;
      rawData = ''
      while (l > 0 && !client.eof)
      {
        var x = client.read(l)
        rawData += x;
        l -= x.length;
      }
      writeln('Data: ',client.dataLength,' ',rawData)      
   }
   if (rawData)
    {
      client.content = rawData;
      let source = rawData.split(/\&/g)
      if (source)
      for (let x=0; x< source.length; x++)
      {
       let y = source[x].indexOf('=')
	   let name, value;
       if (y == -1) {name = decodeURL(source[x]); value=null}
       else {name = decodeURL(source[x].slice(0,y)); value=decodeURL(source[x].slice(y+1));}   
	   if (client.data[name] !== undefined)
       {
		 if (client.data[name].constructor === String)
           client.data[name] = [client.data[name],value];
	     else
	       client.data[name].push(value);
       }
       else
        client.data[name] = value;
      }
    }

   if (client.page == '')
   {
    if (typeof this.index == "string")
    {
     client.page = this.index
    }
    else if (typeof this.index == "function")
    {
      this.sendOK(client);      
      let done = this.index(client,client.data,'',this)

      if (typeof done == "string")
      {
        client.page = done; //redirect
      }
      else
      {
        client.close();
        return true;
      }
    }
   }
                                     

   if (client.page == 'test')
   {
    try 
    {
     this.sendOK(client);
     this.home(client);
    } 
    catch(err)
    {
     writeln("Error: ",err);
     client.writeln("Error: ",err);
    }
    client.close();
    return true;
   }
   
   // filter the file names. No URLs, wildcards, or path changes
   //if (client.page.search(/(\\|\/|\*)/) != -1)
   //{
   // client.close()
   // return true;
   //}

   let path = client.page.lastIndexOf('/')
   path = (path == -1) ? '' : client.page.substr(0,path+1)
   if (path[0] == '/' || path[0] == '\\' || client.page.indexOf('\\') != -1 || client.page.indexOf('*') != -1 || path.indexOf('..') != -1)
   {
    client.close()
    if (this.debug) writeln("Blocked ",client.page)
    return true;
   }
   
   for (let [n,v] in this.folders)
   {// oldpath=new/path converts /oldpath/foo/bar to /new/path/foo/bar
    let l = n.length
    let k = client.page.length
    if (k >= l && client.page.substr(0,l) == n && (k == l || client.page[l]=='/'))
    {     
     v = (typeof v == 'function' ? v(client) : v)
     if (this.debug) writeln(n,'->',v)
     client.page = v + client.page.substr(l)
     break;
    }
   }
   if (this.functions[client.page]) //special function handler
   {
      let handler = this.functions[client.page]
      if (this.debug) writeln('executing ',handler.name,' for ',client.page)
      this.sendOK(client);      
      let done = handler(client,client.data,client.page,this)
      
      if (typeof done == "string")
      {
        client.page = done;
      }
      else
      {
        client.close();
        return true;
      }
   }

   if (client.page && system.exists(client.page))
   {
     let page = client.page
     //leaves room for a redirection table later
     if (this.debug) writeln(client.name,'\t',page,'\t',client.query,'\t',new Date())
     if (this.debug) writeln(client.header)
     if (this.forbidden.indexOf(client.page) != -1)
       this.sendERROR(client) //forbidded file
       
     let type = page.match(/\.([^.]+)$/)

     let handler = this.handlers[type[1]]
     if (handler)
     {
      this.sendOK(client);
      if (this.debug) writeln('executing ',handler.name,' for ',client.page)
      try
      {
       handler(client,client.data,client.page,this);
      }
    catch(err)
    {
     writeln("Error calling ",page,': ',err)   
     for (let [n,v] in err) writeln(n,': ',v)
      }
      client.close();
      return true;
     }
     
     if (type) type = this.types[type[1].toLowerCase()]
     if (!type) type = this.types['*']
     
     if (!type)
     {
      this.sendERROR(client) //forbidded file type
      writeln("Unknown MIME type for ",page)
      return true;
     }

     this.sendOK(client);
     
     try
     {
      let src = new Stream("file://" + page,"rb")
      if (this.debug) writeln('sending ',page,' ',type,' ',src.size)
      client.writeln("Content-type: ",type);
      client.writeln("Content-length: ",src.size);
      client.writeln();
      client.append(src);
      src.close();
     }
     catch(err)
     {
     writeln("Error opening ",page,': ',err)   
     for (let [n,v] in err) writeln(n,': ',v)
     }
     client.close();
     return true;
   }

   if (!client.page)
   {
     this.sendOK(client);
     this.home(client);
     client.close()
     return true;
   }
   writeln("Can't find ",client.page)
   this.sendERROR(client)
   client.close();
   return true;
 }

HTTPD.prototype.finish = function()
{
 this.http.close();
}

HTTPD.directory = function(client, data, page, httpd)
{
 client.writeln("Content-type: text/html\n");
 client.writeln('Directory of /',page,'<br>');
 let files = system.files(page+'*.jsp').concat(system.files(page+'*.html')).sort()
 files.forEach(function(x) client.writeln(x.fixed().link(x),'<br>'));
 return true;
}

//JSP code runs in the global execution context, because we use run() and not eval()
//because eval() doesn't report errors well
HTTPD.execJSP = function(client, data, page, httpd)
{
 try
 {  
  /*
  let header = "function include(page) {return this.execJSP(client,data,page);}\n" + 
               "function print() {this.print.apply(this,arguments);}\n"
  client.execJSP = execJSP
  */

  function include(page) {execJSP(client,data,page);}
  oldprint = print
  oldprintln = println
  print = function () {client.write.apply(client,arguments);}
  println = function () {client.writeln.apply(client,arguments);}
  system.httpData = function() {return [client.data, 
      client.header['Cookie'], client.name];}

  let src  = new Stream("file://" +page,'rt')
 
  if (src.read(2) == "#!")
   src.readLine()
  else
   src.rewind()
  client.writeln("Content-type: text/html")
  client.writeln()  
  
  let text = new Stream
  let code = new Stream
  
  let block = 1
  while (!src.eof) 
  { 
    src.readUntil("<%",client)
    if (src.eof) break
    text.clear()
    code.clear()
    //(function() {var [data, cookie, hostName] = system.httpData();  writeln('Client: ',hostName); })();
    text.write('(function() {var [data, cookie, hostName] = system.httpData(); ')
    src.readUntil("%>",code)  
      code.rewind();  
	if (code.read(1) == '=')
	{
     text.write('print(');
     text.append(code);
     text.write(')');
    }
    else
    {
      code.rewind();
      text.append(code);
    }
    text.write('})();');
    text.rewind();
    //writeln(text)
    try 
    {
      run(text,page + ":" + (block++))
    }
    catch(err) 
    {
     if (typeof err == "object")
     {
      writeln('Error in ',err.fileName,':',err.lineNumber,' ',err.message)
      for (let [n,v] in err) writeln(n,': ',v)
     }     
     else writeln('Error ',err,'in\n',text)     
    }
  }
  print = oldprint
  println = oldprintln
  delete system.httpData
  src.close()
 }
 catch(err)
 {
   httpd.sendERROR(client)
   writeln("Error in ",page,": ",err);
   for (let [n,v] in err) writeln(n,': ',v)
   client.writeln("<h1>Error in ",page,": ",err,"</h1><pre>");
   for (let [n,v] in err) client.writeln(n,': ',v)
   client.writeln("</pre>")
 }
 system.gc()
}

HTTPD.execCGI = function(client, data, page, httpd)
{
    let data = client.data
    let cgi = null
    try 
    {
      cgi = new Stream('exec://"'+system.program+'" ' + page);  
      
      cgi.writeln(data.toSource())
      if (httpd.debug)
      {
       let result = cgi.readFile()
       write(result)
       client.write(result)
      }
      else
       client.append(cgi)
      if (httpd.debug) writeln('exited')
    } 
    catch(err)
    {
     writeln("Error in ",page,': ',err)   
     for (let [n,v] in err) writeln(n,': ',v)
     client.writeln("<h1>Error in ",page,": ",err,"</h1><pre>");
     for (let [n,v] in err) client.writeln(n,': ',v)
     client.writeln("</pre>")
    } 
    if (cgi) cgi.close()
}

if (system.script=="httpd.js") (system.httpd = new HTTPD({debug:true})).run(8000 + Math.floor(1000*Math.random()),true)
