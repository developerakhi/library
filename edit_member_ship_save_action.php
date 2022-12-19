<?php 
ob_start();
include "dbconnect.php";

$membership_id = $_POST['membership_id'];
$member_name = $_POST['member_name'];
$member_package_name = $_POST['member_package_name'];
$member_phone = $_POST['member_phone'];
$member_address = $_POST['member_address'];
$member_book_list = $_POST['member_book_list'];



//$created_by = date("Y-m-d");
//$updated_by = date("Y-m-d");

$username = $_POST['username'];

$sql = "UPDATE membership SET member_name='$member_name', member_package_name = '$member_package_name',member_phone = '$member_phone', member_address = '$member_address', member_book_list = '$member_book_list', username = '$username' 
where membership_id = ".$membership_id;

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=edit_member_ship.php?success=2&membership_id=<?php echo $membership_id; ?>">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>