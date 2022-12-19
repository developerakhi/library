<?php 
ob_start();
include "dbconnect.php";

$book_author = $_POST['book_author'];
$book_publisher = $_POST['book_publisher'];
$search_content = $_POST['search_content'];

// IF AUTHOR AND PUBLISHER EMPTY THEN BOOK NAME APPLIED
//if((empty($book_author)) OR (empty($book_publisher)))
//{

$sql_book = "SELECT * FROM book where book_name	LIKE '%$search_content%' ";
$result_book = $connection->query($sql_book);
$row_book= $result_book->fetch_assoc();
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=search_book.php?search_content=<?php echo $search_content; ?>&flag=1">
<?php
//}


// IF BOOK NAME AND PUBLISHER EMPTY THEN AUTHOR APPLIED
//if((empty($search_content)) OR (empty($book_publisher)))
//{

$sql_book = "SELECT * FROM book where book_author LIKE '%$book_author%' ";
$result_book = $connection->query($sql_book);
$row_book= $result_book->fetch_assoc();
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=search_book.php?book_author=<?php echo $book_author; ?>&flag=1">
<?php
//}

// IF BOOK NAME AND AUTHOR EMPTY THEN PUBLISHER APPLIED
//if((empty($search_content)) OR (empty($book_author)))
//{

$sql_book = "SELECT * FROM book where book_publisher LIKE '%$book_publisher%' ";
$result_book = $connection->query($sql_book);
$row_book= $result_book->fetch_assoc();
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=search_book.php?book_publisher=<?php echo $book_publisher; ?>&flag=1">
<?php
//}
exit();
/*
echo $row_book['book_name'];echo "<br>";
echo $row_book['book_code'];echo "<br>";
echo $row_book['book_author']; echo "<br>";
echo "<br>";
exit();*/

?>

