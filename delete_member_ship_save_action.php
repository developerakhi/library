<?php 

ob_start();

include "dbconnect.php";



	$membership_id = $_GET['membership_id'];
//	echo $membership_id;
//	exit();



//$sql  = "DELETE FROM membership WHERE membership_id = '$membership_id'";

$sql = "DELETE FROM membership where membership_id = '$membership_id' ";  

 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=2&membership_id=<?php echo $membership_id; ?>">

	//	header('Location: ../../expense.php');
   <?php 
} else {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=0&membership_id=<?php echo $membership_id; ?>">
<?php
	//	header('Location: ../../expense.php');
 
}

$connection->close();
							
?>
					



<?php  ob_flush(); ?>