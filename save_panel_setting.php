<?php 
ob_start();
include "dbconnect.php";


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

//echo "$company_logo";
//exit();

$company_name = $_POST['company_name'];
$company_address = $_POST['company_address'];



$username = $_POST['username'];


$created_by = date("Y-m-d");
$updated_by = date("Y-m-d");

if(empty($company_name))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=panel_setting.php?success=1">

<?php 
exit();
}
else
if(empty($company_address))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=panel_setting.php?success=1">

<?php 
exit();
}
else
if(empty($company_logo))
{
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=panel_setting.php?success=1">

<?php 
exit();
}
					
					

$sql = "INSERT INTO panel_setting (company_name, company_address, company_logo, created_by, updated_by, username) 
VALUES ('$company_name', '$company_address', '$company_logo', '$created_by', '$updated_by', '$username')";

if ($connection->query($sql) === TRUE) {
							
?>
					
<meta HTTP-EQUIV="REFRESH" content="0; url=panel_setting.php?success=2">

					<?php 
				}
					exit();
						
				
									?>
						
						

<?php  ob_flush(); ?>