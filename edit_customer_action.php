<?php 
ob_start();
include "dbconnect.php";

$customer_id = $_POST['customer_id'];

$customer_phone = $_POST['customer_phone'];

$customer_name = $_POST['customer_name'];

$customer_email = $_POST['customer_email'];
$customer_address = $_POST['customer_address'];
$customer_age = $_POST['customer_age'];



//$created_by = date("Y-m-d");
//$updated_by = date("Y-m-d");

$username = $_POST['username'];

$sql = "UPDATE customer SET customer_phone = '$customer_phone', customer_name = '$customer_name',customer_email = '$customer_email', customer_address = '$customer_address', customer_age = '$customer_age', username = '$username' 
where customer_id = ".$customer_id;

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=edit_customer.php?success=2&customer_id=<?php echo $customer_id; ?>">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>