#!/usr/local/bin/php
<?php
/* Set oracle user login and password info */
$msg=$_GET['v'];
$db = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
if (!$db)  {
    echo "An error occurred connecting to the database";
    exit;
}
session_start();
  $_SESSION['message'] = '';
  $userid=$_SESSION['userid'];
?>

<html><head><title>GATOR CART</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GATOR CART</title>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="center"> Gator Cart - Admin</h1></font></div></div>


<div class="tool">
<div class="btn-toolbar" role="toolbar">
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
<body>
<div id="bottom_div">
<!--<br><br><br>-->
<center>
<font color = "#1E90FF"><h1 align="center"><h1>Modify Clothes</h1><br><br></font>
<form name="regForm" action="admin_clothes.php" method="post">
<table >
<tr>
<td><h4><b></b> </td>
<td ><input  name="brand" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Brand"></h4></td>
</tr>

<tr>
<td><h4><b></b> </td>
<td><input name="size" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Size"></h4></td>
</tr>

<tr>
<td><h4><b></b></td>
<td><input name="productid" style="width:200%; padding:0 2%;" type="number"  class="form-control" placeholder="Product ID"></h4></td>
</tr>

<tr>
<td><h4><b></b></td>
<td><input name="price" style="width:200%; padding:0 2%;" type="number"  class="form-control" placeholder="Price"></h4></td>
</tr>

<tr>
<td><h4><b></b></td>
<td><input name="quantity" style="width:200%; padding:0 2%;" type="number"  class="form-control" placeholder="Quantity"></h4></td>
</tr>

<tr>
<td><h4><b></b></td>
<td><input name="action" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Action: 'Add', 'Del' or 'Upd'"></h4></td>
</tr>



</table>
<h4><p><font color="red"><?PHP echo $msg; ?></font></p></h4>
<input type="submit" class="btn btn-primary" value="Submit"><br>
</form>
</center>
</div>
</body>
</html>

<?PHP
oci_close($db);
?>