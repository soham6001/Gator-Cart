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
<body>
<div id="bottom_div">
 <?php

  $connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

 // Sales by region
 $query = "SELECT SUM(TOTAL) AS SALES, REGION FROM ADDRESS INNER JOIN 
  (SELECT SUM(ORDERS.QUANT)AS TOTAL,ORDERS.USER_ID AS USR FROM ORDERS INNER JOIN 
    ADDRESS ON ORDERS.USER_ID = ADDRESS.USER_ID GROUP BY ORDERS.USER_ID) 
ON ADDRESS.USER_ID = USR GROUP BY REGION ORDER BY SALES DESC";
$result = oci_parse($connection, $query);
oci_execute($result);

print"<font color = \"#1E90FF\"><h2>SALES BY REGION</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>REGION</th>
    <th>Total SALES</th>

</tr>";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[1]</td>";
    print"<td>$row[0]</td></tr>";
}


print"</table></br>"; 
  print "</table> ";


 ?>
 
  <?php

 // Sales by State
 $query = "SELECT SUM(TOTAL) AS SALES, STATE FROM ADDRESS INNER JOIN (SELECT SUM(ORDERS.QUANT)AS TOTAL,ORDERS.USER_ID AS USR FROM ORDERS INNER JOIN ADDRESS ON ORDERS.USER_ID = ADDRESS.USER_ID GROUP BY ORDERS.USER_ID) ON ADDRESS.USER_ID = USR GROUP BY STATE ORDER BY SALES DESC";
$result = oci_parse($connection, $query);

$abc = oci_execute($result);


print"<font color = \"#1E90FF\"><h2>SALES BY STATE</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>STATE</th>
    <th>Total SALES</th>

</tr>";
while ($row=oci_fetch_row($result))
{
     
    print"<tr><td>$row[1]</td>";
    print"<td>$row[0]</td></tr>";
}


print"</table></br>"; 
  print "</table> ";
  


 ?>
 
  <?php


 // Sales By City:
 $query = "SELECT SUM(TOTAL) AS SALES, CITY FROM ADDRESS INNER JOIN 
  (SELECT SUM(ORDERS.QUANT)AS TOTAL,ORDERS.USER_ID AS USR FROM ORDERS INNER JOIN 
    ADDRESS ON ORDERS.USER_ID = ADDRESS.USER_ID GROUP BY ORDERS.USER_ID) 
ON ADDRESS.USER_ID = USR GROUP BY CITY ORDER BY SALES DESC";
$result = oci_parse($connection, $query);
oci_execute($result);

print"<font color = \"#1E90FF\"><h2>SALES BY CITY</h2></font>"  ;

print"<table border='2'>";

print"<tr>
    <th>CITY</th>
    <th>Total SALES</th>

</tr>";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[1]</td>";
    print"<td>$row[0]</td></tr>";
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



