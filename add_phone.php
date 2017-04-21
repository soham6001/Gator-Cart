#!/usr/local/bin/php
<?php
/* Set oracle user login and password info */

$db = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
if (!$db)  {
    echo "An error occurred connecting to the database";
    exit;
}
  session_start();
  $_SESSION['message'] = '';
  $user=$_SESSION['userid'];
  $phone = $_POST['phno'];
  echo $user;
  echo $phone;
	        
                $sql_form = "insert into phone_numbers (phone_number, user_id)".
                            " values ($phone, $user)";
						  
                $compiled = oci_parse($db, $sql_form);				
				
				
                if(!$compiled){
                    echo "SQL parsing error";
                }


                    $check =  oci_execute($compiled,OCI_COMMIT_ON_SUCCESS); 
               
				
              //  if the query is successsful, redirect to welcome.php page, done!
            if($check){
					        $msg="Phone Added to the Database !";
						      header("location:My_Account.php?v=$msg"); 
            }else{
					      $msg="Query to Add Phone Failed !";
						    header("location:My_Account.php?v=$msg"); 
            }  echo $msg;

   
?>

<?PHP
oci_close($db);
?>