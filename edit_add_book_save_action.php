<?php 
ob_start();
include "dbconnect.php";

$book_id = $_POST['book_id'];

$book_name = $_POST['book_name'];
$book_code = $_POST['book_code'];
$book_author = $_POST['book_author'];
$book_publisher = $_POST['book_publisher'];
$book_stock = $_POST['book_stock'];
$book_price = $_POST['book_price'];
$book_type =$_POST['book_type'];
$book_isbn =$_POST['book_isbn'];
$status_info =$_POST['status_info'];


//$created_by = date("Y-m-d");
//$updated_by = date("Y-m-d");

$username = $_POST['username'];

$sql = "UPDATE book SET book_name='$book_name', book_code = '$book_code',book_author = '$book_author', book_publisher = '$book_publisher', book_stock = '$book_stock', book_price = '$book_price', book_type = '$book_type', book_isbn = '$book_isbn', status_info = '$status_info', username = '$username' 
where book_id = ".$book_id;

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=edit_add_book.php?success=2&book_id=<?php echo $book_id; ?>">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>