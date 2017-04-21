#!/usr/local/bin/php
<?php
//echo $c_id;
session_start();
$connection = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
if (!$connection)  {
    echo "An error occurred connecting to the database";
    exit;
}

$userid = $_SESSION['userid'];
$email=$_POST['email'];
/*$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$region = $_POST['region']; */
$query2 = "update user_details set EMAIL =:email where USER_ID=:userid";


$result2 = oci_parse($connection, $query2);
oci_bind_by_name($result2,':email',$email);
/*oci_bind_by_name($result2,':street',$street);
oci_bind_by_name($result2,':city',$city);
oci_bind_by_name($result2,':state',$state);
oci_bind_by_name($result2,':zipcode',$zipcode);
oci_bind_by_name($result2,':country',$country);*/
oci_bind_by_name($result2,':userid',$userid);
$que2=oci_execute($result2,OCI_COMMIT_ON_SUCCESS);
if ($que2){
                       $msg="User Records updated !";
                       header("location:My_Account.php?v=$msg"); 
                }else{
                       $msg="Attempt to update Record Failed!";
                       header("location:My_Account.php?v=$msg"); 
                } 

?>

<?PHP
oci_close($connection);
?>