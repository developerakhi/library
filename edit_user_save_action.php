<?php 
ob_start();
include "dbconnect.php";

$user_id = $_POST['user_id'];

$username2 = $_POST['username2'];
$password = $_POST['password'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$active_info = $_POST['active_info'];
$sales = $_POST['sales'];
$branch = $_POST['branch'];
$password = md5($_POST['password']);


//$created_by = date("Y-m-d");
//$updated_by = date("Y-m-d");

// $username = $_POST['username'];

$sql = "UPDATE users SET username='$username2', password = '$password',email = '$email', user_type = '$user_type', active_info = '$active_info', sales = '$sales', branch = '$branch'
where user_id = ".$user_id;

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=edit_user.php?success=2&user_id=<?php echo $user_id; ?>">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>