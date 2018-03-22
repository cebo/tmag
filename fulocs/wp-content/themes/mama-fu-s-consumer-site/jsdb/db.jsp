<html>
<%
//load functions into the server. load runs once.
load('db.js')
%>
<head>
<style>
table {border-collapse:collapse; border:1px}
td {border: 1px solid #aaa; margin:0px; padding:5px;}
h1 {font: bold Arial,Helvetica,sans-serif}
body,td,p {font: 12pt Arial,Helvetica,sans-serif}
</style>

<script language="javascript" type="text/javascript" src="common.js">
</script>

<script>
function handleResponse(text)
{
 document.getElementById('response').innerHTML = text;
}
</script>

</head>
<body>

<H1>Web user interface demo</H1>

<H2>Instructions</H2>

<P>There are three ways of writing server-side code for the JSDB web server. The first is with active server pages. The file name ends with <tt>.jsp</tt> (for JavaScript page), and any code within <tt>&lt;% ... %&gt;</tt> will be executed<i> in the server's execution environment</i>. So global variables created in one page can be accessed in another. Within the code, use the <tt>print()</tt> function to write to the web page, <tt>write()</tt> to write to the console (for debugging), and <tt>include(filename)</tt> to include other pages.

<P>The next is by executing a console command, akin to CGI, only we don't have control over environment variables yet. Feel free to hack the source (rs/wrap_system.cpp) and add this ability. For now, you can pass data to the child program through stdin/stdout. The HTTPD.execCGI() function passes GET or POST data as a JavaScript object to the CGI program, already parsed. See <tt>echo.js</tt> for an example. 

<P>The last is by creating custom pages in the web server itself. This has the advantage that it requires no access to the file system, and the disadvantage that you have to restart the server to make changes. Perhaps an example is best:<br>
<table background=#aaa><tr><td><pre>

server.functions["echo"] = function(client,data)
  {
   client.writeln("Content-type: text/plain")
   client.writeln()
   client.writeln(data.toSource())
  }</pre></td>
</table>

<P>The included library <tt>common.js</tt> contains several standard JavaScript functions for writing web pages, including simple AJAX.

<H2>Remote procedure calls</H2>

<div id=control>
<button onClick="loadXMLDoc('echo?message=Can+you+hear+me',handleResponse)">Server extension</button>
<button onClick="loadXMLDoc('echo.jsc?message=Running+a+separate+program&',handleResponse)">Console program</button>
</div>
<div id=response>
</div>

<H2>Server-side scripting example</H2>
<%
var tables = system.database.tables();

system.database.exec('describe people',writeln)
for each(let t in tables)
{
 var fields = system.database.columns(t)
 print("<H3>" + t + "</H3>");
 print('<table>');
 print("<tr>")
 for each (var title in fields)
 {
  print("<td><b>" + title + "</b></td>");
 }
 system.database.exec("select * from " + t,function(d)
  {
   print("<tr>\n");
   for (let i=0;i<d.length;i++)
   {
    print("<td>" + d.value(i) + "</td>");
   }
   print("</tr>\n");
  })
 print("<tr>\n")
 print("<form action=insert>\n")
 print("<input type=hidden name=table value='", t , "'>\n")
 for each(var f in fields)
 {
  print("<td><input name=",f,">\n")
 }

 print('<input type=button onClick="submitForm(this.form,reload);return false" value="Ajax add">\n')

 print("<input type=submit value='Add'>\n")
 print("</form></table>\n");
}
%>

</body>
</html>
