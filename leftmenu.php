<?php 
/*ob_start();
include "dbconnect.php";
session_cache_limiter( FALSE );
session_start(); 
if (isset($_SESSION['username'])) 
{
    */
    
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users where username='$username'";  
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $user_type = $row['user_type'];
?>
<?php

/*
$sql = "SELECT * FROM users where  username='$username'";  
$result = $connection->query($sql);
while($row = $result->fetch_assoc()){
$user_type = $row['user_type'];
}
*/
if($user_type=="admin")
{
?>
 
 <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="add_book.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Book</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_ship.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Membership</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="chart.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Chart</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panel_setting.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Panel Setting</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vat_setting.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Vat Setting</span></a>
            </li>
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="search_book.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Search Book</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="income_expense_report.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Income Expense Report</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calculator/calculator.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Calculator</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="sales_report.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales Report</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="barcode-generate/index.php" target="_blank">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Barcode Print</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="barcode-generate-membership/index.php" target="_blank">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Print Membership Id Card</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_user.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Create User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>
<?php 
}
else
if($user_type=="sales")
{
    ?>
    <li class="nav-item">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales</span></a>
     </li>
     <li class="nav-item">
                <a class="nav-link" href="sales_report.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales Report</span></a>
      </li>
    <?php
}
//}
?>
