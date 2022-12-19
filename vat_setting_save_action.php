<?php 
ob_start();
include "dbconnect.php";


$commission_rate = $_POST['commission_rate'];
$discount = $_POST['discount'];
$vat_rate = $_POST['vat_rate'];
$vat_registration_no = $_POST['vat_registration_no'];


$sql_book = "SELECT * FROM vat where vat_id";


// echo $commission_rate;
// echo "<br>";
// echo $discount;
// echo "<br>";
// echo $vat_rate;
// echo "<br>";
// echo $vat_registration_no;
// echo "<br>";



$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($commission_rate))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=vat_setting.php?success=1">

<?php 
exit();
}
else
if(empty($discount))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=vat_setting.php?success=1">

<?php 
exit();
}
else
if(empty($vat_rate))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=vat_setting.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO vat (commission_rate, discount, vat_rate, vat_registration_no, created_by, updated_by,username) 
VALUES ('$commission_rate','$discount','$vat_rate','$vat_registration_no','$created_by', '$updated_by','$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=vat_setting.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>