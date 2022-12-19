<?php 
ob_start();
include "dbconnect.php";

$username1 = $_POST['username1'];
$password = $_POST['password'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$active_info = $_POST['active_info'];
$sales = $_POST['sales'];
$branch = $_POST['branch'];
$password = md5($_POST['password']);


// $username = $_POST['username'];

$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($username1))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=create_user.php?success=1">

<?php 
exit();
}
else
if(empty($password))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=create_user.php?success=1">

<?php 
exit();
}
else
if(empty($email))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=create_user.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO users (username,password, email, user_type, active_info, sales, branch, created_by, updated_by) 
VALUES ('$username1','$password','$email','$user_type','$active_info','$sales','$branch','$created_by', '$updated_by')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=create_user.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>