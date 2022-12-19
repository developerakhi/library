<?php 
ob_start();
include "dbconnect.php";

$sales_date = $_POST['sales_date'];
$invoice_id = $_POST['invoice_id'];
$book_id = $_POST['book_id'];
$sales_price = $_POST['sales_price'];
$total_price = $_POST['total_price'];
$due_amount = $_POST['due_amount'];
$customer_name = $_POST['customer_name'];

$vat = $_POST['vat'];
$discount = $_POST['discount'];

$discount_price = 100 - $discount;
$afterdiscountprice1 = (($sales_price*$discount_price)/100);

$afterdiscountprice = (round($afterdiscountprice1));

//echo (floor($afterdiscountprice));

//exit();

$payment_by = $_POST['payment_by'];

$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($sales_date))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=sales.php?success=1">

<?php 
exit();
}
else
if(empty($invoice_id))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=sales.php?success=1">

<?php 
exit();
}
else
if(empty($book_id))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=sales.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO sales (sales_date, invoice_id, book_id, sales_price, total_price, due_amount, customer_name, vat, discount, afterdiscountprice, payment_by,created_by, updated_by,username) 
VALUES ('$sales_date','$invoice_id','$book_id','$sales_price','$total_price','$due_amount','$customer_name','$vat','$discount','$afterdiscountprice','$payment_by','$created_by', '$updated_by','$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=sales.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>