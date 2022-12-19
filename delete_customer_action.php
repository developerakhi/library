<?php 

ob_start();

include "dbconnect.php";



	$customer_id = $_GET['customer_id'];
//	echo $book_id;
//	exit();



//$sql  = "DELETE FROM customer WHERE customer_id = '$customer_id'";

$sql = "DELETE FROM customer where customer_id = '$customer_id' ";  

 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=2&customer_id=<?php echo $customer_id; ?>">

	//	header('Location: ../../expense.php');
   <?php 
} else {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=customer.php?success=0&customer_id=<?php echo $customer_id; ?>">
<?php
	//	header('Location: ../../expense.php');
 
}

$connection->close();
							
?>
					



<?php  ob_flush(); ?>