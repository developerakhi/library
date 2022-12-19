<?php 
ob_start();
include "dbconnect.php";

$passengers_id = $_POST['passengers_id'];
$passengers_firstname = $_POST['passengers_firstname'];
$passengers_surname = $_POST['passengers_surname'];
$country = $_POST['country'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob_info = $_POST['dob_info'];
$passport_info = $_POST['passport_info'];
$passport_issue_date = $_POST['passport_issue_date'];
$passport_expire_date = $_POST['passport_expire_date'];
$others_documents = $_POST['others_documents'];
$country = $_POST['country'];

$passengers_type = $_POST['passengers_type'];


$created_at = date("Y-m-d");
$updated_at = date("Y-m-d");

if(empty($passengers_firstname))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url= edit_passengers.php?success=1">

<?php 
exit();
}
else
if(empty($passengers_surname))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url= edit_passengers.php?success=1">

<?php 
exit();
}
else
if(empty($passport_info))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url= edit_passengers.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO passengers_info (passengers_firstname, passengers_surname, country, email, phone, dob_info, passport_info, passport_issue_date, passport_expire_date, others_documents, passengers_type, created_at,updated_at) 
VALUES ('$passengers_firstname','$passengers_surname','$country','$email','$phone','$dob_info','$passport_info','$passport_issue_date','$passport_expire_date','$passengers_type', '$others_documents','$created_at','$updated_at')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url= edit_passengers.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>