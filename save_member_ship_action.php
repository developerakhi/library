<?php 
ob_start();
include "dbconnect.php";

$member_name = $_POST['member_name'];
$member_package_name = $_POST['member_package_name'];
$member_phone = $_POST['member_phone'];
$member_address = $_POST['member_address'];
$member_book_list = $_POST['member_book_list'];


$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($member_name))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=1">

<?php 
exit();
}
else
if(empty($member_package_name))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=1">

<?php 
exit();
}
else
if(empty($member_phone))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=1">

<?php 
exit();
}
	

$sql = "INSERT INTO membership (member_name, member_package_name, member_phone, member_address, member_book_list, created_by, updated_by, username) 
VALUES ('$member_name', '$member_package_name', '$member_phone', '$member_address', '$member_book_list', '$created_by', '$updated_by', '$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=member_ship.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>