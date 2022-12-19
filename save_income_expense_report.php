<?php 
ob_start();
include "dbconnect.php";

$income_category = $_POST['income_category'];
$expense_category = $_POST['expense_category'];
$price = $_POST['price'];
$comment_info = $_POST['comment_info'];

$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($income_category))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=income_expense_report.php?success=1">

<?php 
exit();
}
else
if(empty($expense_category))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=income_expense_report.php?success=1">

<?php 
exit();
}
else
if(empty($price))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=income_expense_report.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO ie (income_category, expense_category, price, comment_info, created_by, updated_by, username) 
VALUES ('$income_category','$expense_category','$price','$comment_info','$created_by', '$updated_by','$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=income_expense_report.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>