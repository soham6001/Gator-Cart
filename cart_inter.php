#!/usr/local/bin/php
<?php session_start(); ?>
<?php 
$userid=$_SESSION['userid']; 
$category =$_SESSION['category'];
$productss = $_POST['check_list'];
$quantitiess = array_filter($_POST['qty']);
$name=$_SESSION['name'];
//print_r($quantitiess);
$quantitiess_without_null = array_values($quantitiess);


?>
<?php

  $db = oci_connect($username = 'rchavan',
                    $password = 'Shaurya2711',
                    $connection_string = '//oracle.cise.ufl.edu/orcl');
						  
	if (!$db)  {
		echo "An error occurred connecting to the database";
		exit;
	}


$uids = $userid;

	
	for ($i=0; $i<count($productss); $i++)
	{
		
		$pid = $productss[$i];				
		$quant = $quantitiess_without_null[$i];
		
		//echo $quant." ";
		//echo $pid." ";
		//echo "loop<br>" ;
		
		

		//insert user data into database       
					
		$sql_form = "insert into ORDERS (ORDER_ID, PRODUCT_ID, USER_ID, QUANT,ORDER_DATE,CAT_ID) values (order_seq.nextval, :pi , :us, :qu, sysdate ,:cat)";
					   
		$compiled = oci_parse($db, $sql_form);				
					
		if(!$compiled){
			 echo "SQL parsing error";
		}

					$nameb = oci_bind_by_name($compiled, ':pi', $pid);
					$emailb = oci_bind_by_name($compiled, ':qu', $quant);
					$firstb = oci_bind_by_name($compiled, ':us', $uids);
					oci_bind_by_name($compiled, ':cat', $category);
					$check1 = oci_execute($compiled);	 
	}

				
              //  if the query is successsful, redirect to welcome.php page, done!
                if ($check1){
					echo "Successsss!!!";
				
					header("location:cart.php?v=$msg"); 
                }
                else {
					echo "Query Failed!";
					$e = oci_error($compiled);
					//echo $e;
						header("location:My_Account.php?v=$msg"); 
                } 

?>



<?PHP
oci_close($db);
?>
