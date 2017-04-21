#!/usr/local/bin/php
<?php
$msg=$_GET['v'];
?>
<html><head><title>Registration Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GatorCart</title>
<link rel="stylesheet" href="form.css" type="text/css">
<style type="text/css">
<!--@import url("css/bootstrap.min.css");-->
</style>
<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="center"></a>Gator Cart</h1></div></div></font>
<SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
	   function validateFirstName()
		{
			var x=document.forms["regForm"]["fname"].value;
			if (x==null || x=="")
  				{
  				alert("First name must be filled out");
  				return false;
  				}
		}
		function validateEmail()
		{
		var x=document.forms["regForm"]["uname"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  		{
  			alert("Not a valid e-mail address");
  			return false;
  		}
		}
    </SCRIPT>

</head>
<body>
<div id="bottom_div">
<!--<br><br><br>-->
<center>
<font color = "#1E90FF"><h3>New User Registration !<h3></font><br>
<form name="regForm" action="regn_in.php" method="post">
<table >
<tr>
<td><h4><b></b> </td>
<td><input name="uname" style="width:200%; padding:0 2%;" type="text"  onsubmit="return validateEmail();" class="form-control" placeholder="Email"></h4></td>
</tr>

<tr>
<td><h4><b></b> </td>
<td><input type="password" input name="pwd" style="width:200%; padding:0 2%;" type="password"  class="form-control" placeholder="Enter your Password"></h4></td>
</tr>

<tr>
<td><h4><b></b> </td>
<td><input name="fname" style="width:200%; padding:0 2%;" type="text"  onsubmit="return validateFirstName();" class="form-control" placeholder="First Name"></h4></td>
</tr>


<tr>
<td><h4><b></b> </td>
<td><input name="lname" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Last Name"></h4></td>
</tr>


<tr>
<td><h4><b></b> </td>
<td><input name="username" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="User Name"></h4></td>
</tr>

<tr>
<td><h4><b></b> </td>
<td><input name="usertype" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="User type"></h4></td>
</tr>


<br><br>
</table>
<h4><p><font color="red"><?PHP echo $msg; ?></font></p></h4>
<input type="submit" class="btn btn-primary" value="Submit"><br>
</form>
</center>
</div>
</body>
</html>