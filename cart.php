#!/usr/local/bin/php
<?php session_start();
$userid=$_SESSION['userid'];
$name=$_SESSION['name'];
$category = $_SESSION['category'];
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
<font color = "#1E90FF"><h1 align="CENTER">Gator Cart</h1></font></div></div>

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
<body>
<div id="bottom_div">
 <?php
  
  $connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

if($category == 1){
      $query = "select * from BOOKS inner join ORDERS ON BOOKS.PRODUCT_ID = ORDERS.PRODUCT_ID WHERE USER_ID = '$userid'";
      $result = oci_parse($connection, $query);
      oci_execute($result);
      print"<font color = \"#1E90FF\"><h2>Bill Details</h2></font>"  ;

      print"<table border='2'>";

      print"<tr>
          <th>Product ID</th>
          <th>Title</th>
          <th>AUTHOR</th>
          <th>ISBN</th>
          <th>Price</th>
          <th>Quantity</th>
      </tr>";

      $total = 0;
      print"<form action = \"complete_order.php\" method=\"post\">";
      while ($row=oci_fetch_row($result))
      {
          print"<tr><td>$row[4]</td>";
          print"<td>$row[1]</td>";
          print"<td>$row[2]</td>";
          print"<td>$row[0]</td>";
          print"<td>$row[5]</td>";
          print"<td>$row[11]</td></tr>";
          $total = $total + $row[11] * $row[5];
      }


      print"</table></br>"; 
      print "</table> ";
      ?> <font color = "#1E90FF"><?php   
      echo "Total bill Amount is $";
      echo $total;
      echo ' .';  
  
      print"<td > <input class= \"btn btn-primary\" type=\"submit\" name=\"Pay and leave\" /><Checkout>></td></tr>";
      print"</form>";
      
      // If the category ID is 3 for Clothing 

      }else if($category == 3){
      $query = "select * from clothes inner join ORDERS ON clothes.PRODUCT_ID = ORDERS.PRODUCT_ID WHERE USER_ID = '$userid'";
      $result = oci_parse($connection, $query);
      oci_execute($result);
      print"<font color = \"#1E90FF\"><h2>Bill Details</h2></font>"  ;

      print"<table border='2'>";

      print"<tr>
          <th>Product ID</th>
          <th>Brand</th>
          <th>Size</th>
          <th>Rating</th>
          <th>Price</th>
          <th>Quantity</th>
      </tr>";

      $total = 0;
      print"<form action = \"complete_order.php\" method=\"post\">";
      while ($row=oci_fetch_row($result))
      {
          print"<tr><td>$row[3]</td>";
          print"<td>$row[0]</td>";
          print"<td>$row[1]</td>";
          print"<td>$row[5]</td>";
          print"<td>$row[4]</td>";
          print"<td>$row[10]</td></tr>";
          $total = $total + $row[10] * $row[4];
      }


      print"</table></br>"; 
      print "</table> ";
      
      ?><font color = "#1E90FF"> <?PHP
      echo "Total bill Amount is $";
      echo $total;
      echo ' .';  
  
      print"<td > <input class=\"btn btn-primary\" type=\"submit\" name=\"Pay and leave\" /><Checkout>></td></tr>";
      print"</form>";

      }else if($category == 2){
        $query = "select * from cellphones inner join ORDERS ON cellphones.PRODUCT_ID = ORDERS.PRODUCT_ID WHERE USER_ID = '$userid'";
      $result = oci_parse($connection, $query);
      oci_execute($result);
      print"<font color = \"#1E90FF\"><h2>Bill Details</h2></font>"  ;

      print"<table border='2'>";

      print"<tr>
          <th>Model No </th>
    <th>OS</th>
    <th>Brand</th>
    <th>Product ID</th>
    <th>Price</th>
    <th>Ratings</th>
    <th>Quantity</th>
      </tr>";

      $total = 0;
      print"<form action = \"complete_order.php\" method=\"post\">";
      while ($row=oci_fetch_row($result))
      {
          print"<tr><td>$row[0]</td>";
          print"<td>$row[1]</td>";
          print"<td>$row[2]</td>";
          print"<td>$row[4]</td>";
          print"<td>$row[5]</td>";
          print"<td>$row[6]</td>";
          print"<td>$row[11]</td></tr>";
          $total = $total + $row[11] * $row[5];
      }


      print"</table></br>"; 
      print "</table> ";
      ?> <font color = "#1E90FF"><?php 
      echo "Total bill Amount is $";
      echo $total;
      echo ' .';  
  
      print"<td > <input class= \"btn btn-primary\" type=\"submit\" name=\"Pay and leave\" /><Checkout>></td></tr>";
      print"</form>";

      }




 ?>
 </font>
 </p>
 </body>
</html>

<?PHP
oci_close($connection);
?>