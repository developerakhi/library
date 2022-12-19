<?php 

ob_start();

include "dbconnect.php";



	$book_id = $_GET['book_id'];
//	echo $book_id;
//	exit();



//$sql  = "DELETE FROM book WHERE book_id = '$book_id'";

$sql = "DELETE FROM book where book_id = '$book_id' ";  

 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=2&book_id=<?php echo $book_id; ?>">

	//	header('Location: ../../expense.php');
   <?php 
} else {
	?>
	<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=0&book_id=<?php echo $book_id; ?>">
<?php
	//	header('Location: ../../expense.php');
 
}

$connection->close();
							
?>
					



<?php  ob_flush(); ?>