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
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  //$category=1;
  $title = $_POST['title'];
  $author = $_POST['author'];
  $product = $_POST['product'];
  $price=$_POST['price'];
  $quantity = $_POST['quantity'];
  $action = $_POST['action'];
  $sql_form='';
  //$b_price=isset($_POST['price'])
  //$b_quants=isset($_POST['quantity']);
  echo $price;
  echo $quantity;
  //echo isset($_POST['price']);
  //echo isset($_POST['quantity']);
  
				
					if(strcmp($action,"Add")==0){
						$sql_form="insert into BOOKS(ISBN, TITLE, AUTHOR, CATEGORY_ID, PRODUCT_ID, PRICE, RATINGS, QUANTITY)"."VALUES(ISBN_SEQ.NEXTVAL,:title,:author,1,:product,:price,5,:quantity)";
					}
					else if(strcmp($action,"Del")==0){
						$sql_form="DELETE FROM BOOKS WHERE PRODUCT_ID=:product";
					}
					else if(strcmp($action,"Upd")==0){
						if(!empty($price) and !empty($quantity)){
							$sql_form="update BOOKS SET quantity=:quantity and price=:price WHERE PRODUCT_ID=:product";
							echo "price & quantity";
						}
						else if(!empty($price)){
							$sql_form="update BOOKS SET price=:price WHERE PRODUCT_ID=:product";
							echo "price";
						}
						else if(!empty($quantity)){
							$sql_form="update BOOKS SET quantity=:quantity WHERE PRODUCT_ID=:product";
							echo "quantity";
						}		
						
						
					}
				
		        
		        // $sql_form = "insert into address (STREET, CITY, STATE, ZIP,USER_ID,REGION ) "."values (:street , :city, :state, :zip, :cid, :reg)";
				 

						  
                $compiled = oci_parse($db, $sql_form);
				
				
				
                if(!$compiled){
                    echo "SQL parsing error";
                }
				
                	oci_bind_by_name($compiled, ':title', $title);
                    oci_bind_by_name($compiled, ':author', $author);
                    oci_bind_by_name($compiled, ':product', $product);
                    oci_bind_by_name($compiled, ':price', $price);
                    oci_bind_by_name($compiled, ':quantity', $quantity);
                    
                    $check1 = oci_execute($compiled,OCI_COMMIT_ON_SUCCESS); 
                
				
              //  if the query is successsful, redirect to welcome.php page, done!
                if ($check1){
					             $msg="Product Added to the Database !";
						           header("location:Admin.php?v=$msg"); 
                }else{
					             $msg="";
						           header("location:admin_books.php?v=$msg"); 
                } 
				
}   
   
?>

<html><head><title>GATOR CART</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GATOR CART - Admin</title>
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
<font color = "#1E90FF"><h1 align="center"><h1>Modify Books</h1><br><br></font>
<form name="regForm" action="admin_books.php" method="post">
<table >
<tr>
<td><h4><b></b> </td>
<td ><input  name="title" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Title"></h4></td>
</tr>

<tr>
<td><h4><b></b> </td>
<td><input name="author" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Author"></h4></td>
</tr>

<tr>
<td><h4><b></b></td>
<td><input name="product" style="width:200%; padding:0 2%;" type="number"  class="form-control" placeholder="Product"></h4></td>
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