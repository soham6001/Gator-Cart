#!/usr/local/bin/php
<?php
session_start();
$userid=$_SESSION['userid'];
$name=$_SESSION['name'];
//echo $_SESSION['userid'];
//echo $SESSION['name'];
$connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
?>
<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GATOR CART</title>
<link rel="stylesheet" href="form.css" type="text/css">

<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="center"><h1 align="CENTER">GATOR CART - ADMIN</h1></font></div></div>

<div class="tool">
<div class="btn-toolbar" role="toolbar">
<div class="btn-group">
      <button type="button" class="btn btn-info" onClick="window.location.href='usernew.php';">Home</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='My_Account.php';">My Account</button>
    <button type="button" class="btn btn-success" onClick="window.location.href='logout.php';">LogOut</button>
      </div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary" onClick="window.location.href='admin_books.php';">Modify Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='admin_clothes.php';">Modify Clothes</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='admin_cellphones.php';">Modify Cellphones</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='sales.php';">Sales By Region</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='trending.php';">Top Selling Products</button>
    </div>  
</div></div></div>
</div>    
</div>
</head>

<div id="bottom_div"><br><br>
<font color = "#1E90FF"><h2 align="middle"> Welcome <?php echo $name."!"; ?> </h2></font><br>
</div>
<div><font color = "#1E90FF">
   <h1 align="center">     
            <?PHP echo "Name: ".$_SESSION["name"];?><br>
            <?PHP echo "User ID: ".$_SESSION["userid"];?><br>
            <?PHP echo "Email ID: ".$_SESSION["email"];?><br>
            <?PHP echo "Privileges: Administrator";?><br>
  </h1></font>
</div>



</div>
<!--
  <div class="btn-group btn-group-vertical btn btn-group-lg" style="top:1%">

      <button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Purchase_History.php';">My Purchase History</button>        
      <button type="button" class="btn btn-info btn-large" onclick="window.location.href='My_Feedback_and_Rating.php';">My Feedback and Rating</button>           
      <button type="button" class="btn btn-info btn-large" onclick="window.location.href='addAddress.php';">Add Address</button>  
    <button type="button" class="btn btn-info btn-large" onclick="window.location.href='addPhone.php';">Add Phone</button>   
        <button type="button" class="btn btn-info btn-large" onclick="window.location.href='personalInfo.php';">Update User Information</button>     
      </div>
	-->
<!---
      <div class="btn-group"><tr><tr>
  <button type="button" class="btn btn-primary" onClick="window.location.href='books.php';">Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">Clothing</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='mobile.php';">Cellphones</button>
    </div>
-->

</div>
</body>

<?PHP
oci_close($connection);
?>