<?php 
ob_start();
include "dbconnect.php";


$changelogo = $_POST['changelogo'];
$company_logo = 0;
if($changelogo == "Yes")

{
   $uploaddir = 'uploads/';
   $uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

   if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) 
   {
      // echo "File is valid, and was successfully uploaded.\n";
      $company_logo = $uploadfile;

   } else {
   //  echo " Logo Upload error, back again and try!\n";
      // exit();
   }
}
else
if($changelogo == "No")
{
   $currentlogo = $_POST['currentlogo'];
   $company_logo = $currentlogo;
}

//echo "$company_logo";
//exit();

$company_name = $_POST['company_name'];
$company_address = $_POST['company_address'];



$username = $_POST['username'];
$panel_id = $_POST['panel_id'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");



$sql = "UPDATE panel_setting set company_name='$company_name', company_address = '$company_address',company_logo = '$company_logo',
created_by='$created_by', updated_by = '$updated_by', 
username = '$username'
	  where panel_id = ".$panel_id;

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=edit_panel_setting.php?success=2&panel_id=<?php echo $panel_id; ?>">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>