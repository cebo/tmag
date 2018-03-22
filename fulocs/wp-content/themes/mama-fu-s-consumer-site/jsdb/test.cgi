data = eval(readln())

writeln("Content-type: text/plain");
writeln()
writeln("Parameters passed to test.cgi:")
for ([x,y] in data)
 writeln(x,'=',y)
//system.sleep(500)
