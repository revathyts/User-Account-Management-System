//alert sum//
/*
x=parseInt(prompt("first number"));
y=parseInt(prompt("second number"));
r=x+y;
alert("result= "+r);
*/

//global and local variable in a function
/*
var a=10;
document.write("<h1>"+a+"</h1>");
function myfunction()
{
	var a="orisys";
	document.write("<h1>"+a+"</h1>");
}
myfunction();
document.write("<h1>"+a+"</h1>");
*/



//------------passing values to index page--------------------------------
/*
document.getElementById("demo").innerHTML="ORISYS";
*/
//------using prompt--------------
/*
var x=prompt("hi");
document.getElementById("demo").innerHTML=x;
*/

/*
function myFunction()
{
	document.getElementById("demo").innerHTML="revathy";

}
*/

/*
function myFunction()
{ 
var x=document.getElementById("sname").value;
alert("Your name is"+" "+x);
}
*/

/*  array
var fruits=['apple','orange','mango'];
alert(fruits);
document.write("<h1>"+fruits+"</h1>");
fruits.push('banana');
for(var i=0;i<fruits.length;i++)
{
	document.write("<h1>"+fruits[i]+"</h1>");
}
fruits.pop('banana');
for(var i=0;i<fruits.length;i++)
{
	document.write("<h1>"+fruits[i]+"</h1>");
}

for(var i=0;i<fruits.length;i++)
{
	document.write("<h1>"+fruits[i]+"</h1>");
}
fruits.shift('banana');
for(var i=0;i<fruits.length;i++)
{
	document.write("<h1>"+fruits[i]+"</h1>");
}
fruits.unshift('banana');
for(var i=0;i<fruits.length;i++)
{
	document.write("<h1>"+fruits[i]+"</h1>");
}
*/
/*
function myFunction()
{
	var x=document.getElementById("name").value;
	var y=document.getElementById("lname").value;
	document.getElementById("demo").innerHTML="x+" "+y";
}

*/

/*using radio button and taking it's values as an alert 
function myFunction()
{
var rd1=document.getElementById("rd1");
var rd2=document.getElementById("rd2");
if(rd1.checked==true)
{
	alert("selected"+rd1.value);
}
else if(rd2.checked==true)
{
	alert("selected"+rd2.value);
}

else
{
	alert("no value");
}
}
*/

/*
 function myFunction()
 {
 var select=document.getElementById("select");
alert(select.options[select.selectedIndex].value);
alert(select.options[1].value);

 }
*/

/*giving different styles to para using forloop
function myFunction()
 {
var para=document.getElementsByTagName("p");
for(var i=0;i<5;i++)
{
para[i].style.color="red";
para[i].style.backgroundColor="yellow";
para[i].style.fontSize="40px";
}

 }
 */





