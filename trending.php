#!/usr/local/bin/php
<?php 
session_start();
$userid=$_SESSION['userid'];
$name=$_SESSION['name'];

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
<body background="img/background9.jpg">
<div id="bottom_div">
 <?php
  $_SESSION['category'] = 1;
  $connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

 //$query = "select * from product"	;
 $query = "SELECT PRODUCT_ID,TITLE,AUTHOR,PRICE FROM BOOKS INNER JOIN(SELECT SUM(ORDERS.QUANT) AS TOTAL,ORDERS.PRODUCT_ID AS PID FROM ORDERS INNER JOIN BOOKS ON ORDERS.PRODUCT_ID = BOOKS.PRODUCT_ID GROUP BY ORDERS.PRODUCT_ID) ON BOOKS.PRODUCT_ID = PID WHERE TITLE IS NOT NULL AND ROWNUM<=10 ORDER BY TOTAL DESC";
$result = oci_parse($connection, $query);
oci_execute($result);

print"<font color = \"#1E90FF\"><h2>Top Selling Books</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>Product ID</th>
    <th>Title</th>
    <th>AUTHOR</th>
	<th>Price</th>
</tr>";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[0]</td>";
    print"<td>$row[1]</td>";
    print"<td>$row[2]</td>";
	print"<td>$row[3]</td>";	

}


print"</table></br>"; 
  print "</table> ";
  

	


 ?>
  <?php
  $_SESSION['category'] = 2;
 //$query = "select * from product"	;
 $query = "SELECT PRODUCT_ID,MODEL_NO,BRAND,OS,PRICE FROM CELLPHONES INNER JOIN(SELECT SUM(ORDERS.QUANT) AS TOTAL,ORDERS.PRODUCT_ID AS PID FROM ORDERS INNER JOIN CELLPHONES ON ORDERS.PRODUCT_ID = CELLPHONES.PRODUCT_ID GROUP BY ORDERS.PRODUCT_ID) ON CELLPHONES.PRODUCT_ID = PID WHERE ROWNUM<=10 ORDER BY TOTAL DESC";
$result = oci_parse($connection, $query);
oci_execute($result);

print"<font color = \"#1E90FF\"><h2>Top Selling CellPhones</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>Product ID</th>
    <th>Model</th>
    <th>Brand</th>
	<th>OS</th>
	<th>Price</th>

</tr>";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[0]</td>";
    print"<td>$row[1]</td>";
    print"<td>$row[2]</td>";
	print"<td>$row[3]</td>";
	print"<td>$row[4]</td>";	
	
}


print"</table></br>"; 
  print "</table> ";
  

	
	
 



 ?>
 
   <?php
   $_SESSION['category'] = 3;
 //$query = "select * from product"	;
 $query = "SELECT PRODUCT_ID,BRAND,CLOTH_SIZE,PRICE FROM CLOTHES INNER JOIN(SELECT SUM(ORDERS.QUANT) AS TOTAL,ORDERS.PRODUCT_ID AS PID FROM ORDERS INNER JOIN CLOTHES ON ORDERS.PRODUCT_ID = CLOTHES.PRODUCT_ID GROUP BY ORDERS.PRODUCT_ID) ON CLOTHES.PRODUCT_ID = PID WHERE ROWNUM<=10 ORDER BY TOTAL DESC";
$result = oci_parse($connection, $query);
oci_execute($result);

print"<font color = \"#1E90FF\"><h2>Top Selling Apparels</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>Product ID</th>
    <th>Brand</th>
    <th>Size</th>
	<th>Price</th>
	
</tr>";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[0]</td>";
    print"<td>$row[1]</td>";
    print"<td>$row[2]</td>";
	print"<td>$row[3]</td>";
}


print"</table></br>"; 
  print "</table> ";
  
 ?>
 </p>
 </body>
</html>


<?PHP
oci_close($connection);
?>