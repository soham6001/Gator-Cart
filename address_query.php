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
  
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $region = $_POST['region'];

		        
		         $sql_form = "insert into address (STREET, CITY, STATE, ZIP,USER_ID,REGION ) ". 
                      "values (:street , :city, :state, :zip, :cid, :reg)";
				 

						  
                $compiled = oci_parse($db, $sql_form);
				
				
				
                if(!$compiled){
                    echo "SQL parsing error";
                }
				
                	oci_bind_by_name($compiled, ':street', $street);
                    oci_bind_by_name($compiled, ':city', $city);
                    oci_bind_by_name($compiled, ':state', $state);
                    oci_bind_by_name($compiled, ':zip', $zip);
                    oci_bind_by_name($compiled, ':cid', $userid);
                    oci_bind_by_name($compiled, ':reg', $region);
                    $check1 = oci_execute($compiled,OCI_COMMIT_ON_SUCCESS); 
                
				
              //  if the query is successsful, redirect to welcome.php page, done!
                if ($check1){
					             $msg="Address Added to the Database !";
						           header("location:My_Account.php?v=$msg"); 
                }else{
					             $msg="Query to Add Address Failed !";
						           header("location:My_Account.php?v=$msg"); 
                }         
}   
   
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
<center>
<font color = "#1E90FF"><h1>Add Address</h1><br><br></font>
<form name="regForm" action="address_query.php" method="post">
<table >
<tr>
<td></td>
<td><input name="street" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Street"></h4></td>
</tr>

<tr>
<td></td>
<td><input name="city" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="City"></h4></td>
</tr>

<tr>
<td></td>
<td><input name="state" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="State"></h4></td>
</tr>

<tr>
<td></td>
<td><input name="zip" style="width:200%; padding:0 2%;" type="number"  class="form-control" placeholder="Zip"></h4></td>
</tr>

<tr>
<td></td>
<td><input name="region" style="width:200%; padding:0 2%;" type="text"  class="form-control" placeholder="Region"></h4></td>
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

<?PHP
oci_close($db);
?>