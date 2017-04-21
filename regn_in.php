#!/usr/local/bin/php
<?php
/* Set oracle user login and password info */
session_start();
$db = oci_connect($username = 'rchavan',
                          $password = 'Shaurya2711',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
if (!$db)  {
    echo "An error occurred connecting to the database";
    exit;
}
$username = $_POST['username'];
$email = $_POST['uname'];
$first = $_POST['fname'];
$last = $_POST['lname'];
$password1 = $_POST['pwd'];
$utype = $_POST['usertype'];


//$utype = 1;


//$_SESSION['userrr'] = $username;


if ($_SERVER["REQUEST_METHOD"] == "POST") {    


               

                //insert user data into database
		       
		        
		         $sql_form = "insert into user_details (USER_ID, USERNAME, USERPWD, FIRST_NAME,LAST_NAME, EMAIL, USER_TYPE) values (seq.nextval, :un1 , :pwd1, :fir1, :lst1, :em1, : ut1 )";
				 

						  
                $compiled = oci_parse($db, $sql_form);
				
				
				
                if(!$compiled){
                    echo "SQL parsing error";
                }
				
                $nameb = oci_bind_by_name($compiled, ':un1', $username);
                $emailb = oci_bind_by_name($compiled, ':em1', $email);
                $firstb = oci_bind_by_name($compiled, ':fir1', $first);
                $lastb =  oci_bind_by_name($compiled, ':lst1', $last);
                $pwdb = oci_bind_by_name($compiled, ':pwd1', $password1);
                $utypeb = oci_bind_by_name($compiled, ':ut1',$utype);
                $check1 = oci_execute($compiled); 
				$error1 = oci_error($compiled);
								
				if($nameb){
					echo 'nameb';
				}
				
				if($emailb){
					echo 'emailb';
				}
				if($firstb){
					echo 'firstb';
				}
				if($lastb){
					echo ' lastb';
				}
				if($pwdb){
					echo 'pwd err';
				}
				if($utypeb){
					echo ' utype err';
				}
				
              // 	
                if ($check1){
					$msg="Registered Successfully!!!";
						header("location:index.php?v=$msg"); 
                }
                else {
					$msg="Registration Failed!";
						header("location:regn.php?v=$msg"); 
                } 
          
}
     
   
?>




?>
<?PHP
oci_close($connection);
?>