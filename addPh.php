#!/usr/local/bin/php
<?php
$msg=$_GET['v'];
session_start();
?>
<html><head><title>GATOR CART</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GATOR CART</title>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="CENTER">GATOR CART</h1></div></div></font>


<div class="tool">
<div class="btn-toolbar" role="toolbar">
  <div class="btn-group">
      <button type="button" class="btn btn-info" onClick="window.location.href='usernew.php';">Home</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='My_Account.php';">My Account</button>
    <button type="button" class="btn btn-success" onClick="window.location.href='logout.php';">LogOut</button>
      </div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary" onClick="window.location.href='book.php';">Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='cellphone.php';">Electronics</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">Clothes</button>
  </div>
 </div></div></div>
</div>    
</div>
</head>
<body>
<div id="bottom_div">
<!--<br><br><br>-->
<center>
<font color = "#1E90FF"><h1>Add Phone Number</h1><br><br></font>
<form name="regForm" action="add_phone.php" method="post">
<table >
<tr>
<td></td>
<td><input name="phno" style="width:200%; padding:0 2%;" type="Number"  class="form-control" placeholder="Phone # "></h4></td>
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
