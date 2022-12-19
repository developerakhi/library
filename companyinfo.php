<?php 
ob_start();
include "dbconnect.php";

    $sql = "SELECT * FROM panel_setting ";  
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $company_logo = $row['company_logo'];
    $company_name = $row['company_name'];
?>
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
               
                <img src="<?php echo $row['company_logo']; ?>" width="50" height="50" />
               
                <div class="sidebar-brand-text mx-3"><?php echo $row['company_name']; ?></div>
            </a>