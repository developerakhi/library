<?php 
ob_start();
include "dbconnect.php";

$book_name = $_POST['book_name'];
$book_code = $_POST['book_code'];
$book_author = $_POST['book_author'];
$book_publisher = $_POST['book_publisher'];
$book_stock = $_POST['book_stock'];
$book_price = $_POST['book_price'];
$book_type = $_POST['book_type'];
$book_isbn = $_POST['book_isbn'];
$status_info = $_POST['status_info'];

$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($book_name))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=1">

<?php 
exit();
}
else
if(empty($book_code))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=1">

<?php 
exit();
}
else
if(empty($book_author))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=1">

<?php 
exit();
}
					
									//  check duplicate book name
									$sql_book1 = "SELECT * FROM book";
                                    $result_book1 = $connection->query($sql_book1);
                                    // output data of each row  
                                    while($row_book1= $result_book1->fetch_assoc())
									{
										$book_name1 = $row_book1['book_name'];
										$book_code1 = $row_book1['book_code'];
										$book_isbn1 = $row_book1['book_isbn'];

										if($book_name1==$book_name)
										{
											//echo "Duplicatebookname";
											?>
											<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=1">
											<?php
											exit();
										}
										else
										{

										if($book_code1==$book_code)
											{
												//echo "Duplicatebookcode";
												?>
												<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=6">
												<?php
												exit();
											}
											else
											{
										if($book_isbn1==$book_isbn)
											{
												//echo "Duplicatebookisbn";
												?>
												<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=7">
												<?php
												exit();
											}
												else
											       {		
										$sql = "INSERT INTO book (book_name, book_code, book_author, book_publisher, book_stock, book_price, book_type, book_isbn, status_info, created_by, updated_by,username) 
VALUES ('$book_name','$book_code','$book_author','$book_publisher','$book_stock','$book_price','$book_type','$book_isbn','$status_info','$created_by', '$updated_by','$username')";

										}
									}

								}
							}
if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=add_book.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>