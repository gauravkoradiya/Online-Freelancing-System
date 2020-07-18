// JavaScript Document
function ValidateTextBox()
{
 var form = document.getElementById("form1");
 
 var fn_err = document.getElementById("fn_err");
 var ln_err = document.getElementById("ln_err");
 var em_err = document.getElementById("em_err");
 var un_err = document.getElementById("un_err");
 var pass_err = document.getElementById("pass_err");
 var cn1_err = document.getElementById("cn1_err");
 var cn2_err = document.getElementById("cn2_err");
 var add_err = document.getElementById("add_err");
 var city_err = document.getElementById("city_err");
 var que_err = document.getElementById("que_err");
 var ans_err = document.getElementById("ans_err");
 
 
 var fn = form["fn"].value;
 var ln = form["ln"].value;
 var email = form["email"].value;
 var un = form["un"].value;
 var pass = form["pass"].value;
 var cn1 = form["cn1"].value;
 var cn2 = form["cn2"].value;
 var address = form["address"].value;
 var city = form["city"].value; 
 var que = form["que"].value; 
 var ans = form["ans"].value; 
 
 
 cnt=0;
 
 <!-- ID validation -->

 <!-- first name validation -->
 if(fn == "")
 {
 	fn_err.innerHTML = " * Plz... Enter the text character";
	cnt++;
 }
 else if(fn.search(/^[A-Za-z]+$/) == -1)
 {
 	fn_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	fn_err.innerHTML = "";
 }
 <!-- last name validation -->
 if(ln == "")
 {
 	ln_err.innerHTML = " * Plz... Enter the text character";
	cnt++;
 }
 else if(ln.search(/^[A-Za-z]+$/) == -1)
 {
 	ln_err.innerHTML = " * Plz... Enter only text character";
	cnt++;
 }
 else
 {
 	ln_err.innerHTML = "";
 }
 <!-- email validation -->
 if(email == "")
 {
 	em_err.innerHTML = " * Plz... Enter the Email Address ";
	cnt++;
 }
 else if(email.search(/^[A-Za-z0-9._]+@[A-Za-z]+\.[A-Za-z]{2,4}$/i) == -1)
 {
 	em_err.innerHTML = " * Plz... Enter valid Email Address ";
	cnt++;
 }
 else
 {
 	em_err.innerHTML = "";
 }
 <!-- username validation -->
 if(un=="")
 {
 	un_err.innerHTML="* Plz...Enter the user name";
	cnt++;
 }
 else if(un.search(/^[\w.-]+$/)==-1)
 {
	un_err.innerHTML="* Plz...Enter the only letters,digits and the underscore";
	cnt++;
 }
 else
 {
	un_err.innerHTML="";
 }
<!-- password validation -->	
 if(pass=="")
 {
	pass_err.innerHTML="* Plz...Enter the password";
	cnt++;
 }
 else if(pass.search(/^[A-Za-z\d]{6,8}$/)==-1)
 {
 	pass_err.innerHTML="* Plz...Enter upper/lower case character and digit";
	cnt++;
 }
 else
 {
	pass_err.innerHTML="";
 }
 <!-- contact number validatoion-->
 if(cn1 == "")
 {
 	cn1_err.innerHTML=" * Plz... Enter your contact number";
	cnt++;
 }
 else if(cn1.search(/^\d{10}$/) == -1)
 {
 	cn1_err.innerHTML=" * Plz... Enter valid mobile number";
	cnt++;
 }
 else
 {
 	cn1_err.innerHTML="";
 }
 <!-- contact number validatoion-->
 if(cn2 == "")
 {
 	cn2_err.innerHTML=" * Plz... Enter your contact number";
	cnt++;
 }
 else if(cn2.search(/^\d{10}$/) == -1)
 {
 	cn2_err.innerHTML=" * Plz... Enter valid mobile number";
	cnt++;
 }
 else
 {
 	cn2_err.innerHTML="";
 }
  <!-- address validatoion-->
 if(address == "")
 {
 	add_err.innerHTML=" * Plz... Enter your Address";
	cnt++;
 }
 else
 {
 	add_err.innerHTML="";
 }
  <!-- city validatoion-->
 if(city == "")
 {
 	city_err.innerHTML=" * Plz... Enter your city name";
	cnt++;
 }
 else
 {
 	city_err.innerHTML="";
 }
  if(que == "")
 {
 	que_err.innerHTML = " * Plz... Select the question";
	cnt++;
 }
 else
 {
 	que_err.innerHTML = "";
 }
  if(ans == "")
 {
 	ans_err.innerHTML = " * Plz... Enter answer of above question";
	cnt++;
 }
 else
 {
 	ans_err.innerHTML = "";
 }
 
 if(cnt>0)
 {
	alert("Please fill form data correctly");
	cnt=0;
	return false;
 }
 else
 {
	return true;
 }
}