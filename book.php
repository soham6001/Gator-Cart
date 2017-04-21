#!/usr/local/bin/php
<?php 
session_start();
$userid=$_SESSION['userid'];
$name=$_SESSION['name'];
$_SESSION['category'] = 1;
?>
<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Gator Cart</title>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="center">Gator Cart</h1></div></div></font>

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
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">Clothing</button>
  
	</div>
</div></div></div>
</div>    
</div>
</head>
<body background="img/background9.jpg">
<div id="bottom_div">
 <?php
  
  $connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

 //$query = "select * from product"	;
  $query = "select * from BOOKS where rownum <=10";
  $result = oci_parse($connection, $query);
  oci_execute($result);

  print"<font color = \"#1E90FF\"><h2>Book Details</h2></font>"  ;

  print"<table border='2'>";

  print"<tr>
    <th>Product ID</th>
    <th>Title</th>
    <th>AUTHOR</th>
	<th>ISBN</th>
	<th>Price</th>
	<th>Reviews</th>
	<th>Quantity</th>
	<th>Buy</th>
</tr>";
print"<form action = \"cart_inter.php\" method=\"post\">";
while ($row=oci_fetch_row($result))
{
    print"<tr><td>$row[4]</td>";
    print"<td>$row[1]</td>";
    print"<td>$row[2]</td>";
    print"<td>$row[0]</td>";
	print"<td>$row[5]</td>";
	print"<td>$row[6]</td>";	
	print"<td > <input type=\"number\" name=\"qty[]\" /></td>";
	print"<td > <input type=\"checkbox\" name=\"check_list[]\" value =\"$row[4]\"/></td></tr>";
}


print"</table></br>"; 
  print "</table> ";
  

	
	
  print"<td > <input class=\"btn btn-primary\" type=\"submit\" name=\"Submit\" /></td></tr>";
print"</form>";



 ?>
 
 </p>
 </body>
</html>

<?PHP
oci_close($connection);
?>