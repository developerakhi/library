<?php 
ob_start();
include "dbconnect.php";

$customer_phone = $_POST['customer_phone'];
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_address = $_POST['customer_address'];
$customer_age = $_POST['customer_age'];


$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($customer_phone))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=1">

<?php 
exit();
}
else
if(empty($customer_name))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=1">

<?php 
exit();
}
else
if(empty($customer_email))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO customer (customer_phone, customer_name, customer_email, customer_address, customer_age, created_by, updated_by, username) 
VALUES ('$customer_phone', '$customer_name', '$customer_email', '$customer_address', '$customer_age', '$created_by', '$updated_by', '$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>