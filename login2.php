#!/usr/local/bin/php
<html><head><title>Login Page</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Gator Cart</title>
<link rel="stylesheet" href="form.css" type="text/css">


<?php
$connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
						  
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$query = "SELECT * FROM USER_DETAILS WHERE USERNAME='".$myusername."' and USERPWD='".$mypassword."'";
$result = oci_parse($connection, $query);
oci_execute($result);
$numrows = oci_fetch_all($result, $res);
if($numrows!=0){
$result1 = oci_parse($connection, "SELECT * FROM USER_DETAILS WHERE USERNAME='".$myusername."' and USERPWD='".$mypassword."'");
oci_execute($result1);
$row = oci_fetch_array($result1, OCI_BOTH);
$name= $row['FIRST_NAME']." ".$row['LAST_NAME'];
$userid = $row['USER_ID'];
$utype= $row['USER_TYPE'];
$email=$row['EMAIL'];
session_start();
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['userid']=$userid;
}
oci_free_statement($result);
oci_close($connection);
if($numrows==0)
{
$msg="Incorrect Credentials";
				header("location:index.php?v=$msg");
}
	
	if($utype==1 and $numrows>0)
	{
		header("location:Admin.php"); 
     } 
	if($utype==0 and $numrows >0){
			$msg=" ";
			header("location:usernew.php?v=$msg"); 
	}
?>
<!--<meta http-equiv="refresh" content="1;url=/userL.php">
        <script type="text/javascript">
            window.location.href = "/INTEGRATED/usernew.php"
        </script>-->
</head>
</html>
