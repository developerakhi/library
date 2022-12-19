<?php 
ob_start();
include "dbconnect.php";
session_cache_limiter( FALSE );
session_start(); 
if (isset($_SESSION['username'])) 
{
    
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users where username='$username'";  
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $username = $row['username'];

    // PANEL ID 
    $panel_id = $_GET['panel_id'];
    $sql_panel = "SELECT * FROM panel_setting where panel_id='$panel_id'";  
    $result_panel = $connection->query($sql_panel);
    $row_panel = $result_panel->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laiberay - Add Book</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Company  - Brand name start -->
            <?php include "companyinfo.php"; ?>
           
            <!-- Company  - Brand name end -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
             <!-- LEFT MENU START -->
             <?php include "leftmenu.php"; ?>
             <!-- LEFT MENU END -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts SECTION START-->
                        <?php //include "alert.php"; ?>
                        <!-- Nav Item - Alerts SECTION END-->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information START -->
                        <?php include "profile.php"; ?>
                        <!-- Nav Item - User Information END -->

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel Setting</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;</a>
                    </div>

                    <!--BOOK FORM START -->
                    <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create a New Panel Setting!</h1>
                            </div>
                            <form class="user" action="edit_panel_setting_acion.php" name="form" id="form" method="post"  enctype="multipart/form-data">>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="company_name" name="company_name"
                                            value="<?php echo $row_panel['company_name']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="company_address" name="company_address"
                                        value="<?php echo $row_panel['company_address']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <h6>Current Logo</h6>
                                        <img src="<?php echo $row['company_logo']; ?>" width="50" height="50" /><br>
                                    <h6><font color="black"><b>Are you want to change logo?</b></font></h6>
                                    <select class="form-control" id="changelogo" name="changelogo">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                             </select>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    
                                </div>
                               
                                <input type="hidden" class="form-control form-control-user" id="panel_id" name="panel_id" value="<?php echo $panel_id; ?>"
                        >     
                        <input type="hidden" class="form-control form-control-user" id="currentlogo" name="currentlogo" value="<?php echo $row['company_logo']; ?>"
                        >             
                        <input type="hidden" class="form-control form-control-user" id="username" name="username" value="<?php echo $username; ?>"
                        >                    
                                <button type="button submit"  class="btn btn-primary btn-user btn-block">Update Panel Setting</button>
                                <hr>
                               
                            </form>
                            <hr>
                           
                           
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Panel Setting</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>company_name</th>
                                            <th>company_address</th>
                                            <th>company_logo</th>
                                            <th>created_by</th>
                                            <th>updated_by</th>
                                            <th>Username</th>
                                            <th>EDIT</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    // QUERY
                                    // START LOOP 
                                    include "dbconnect.php";
                                    $serial_no = 0;
                                    // Read data
                                    $sql_book = "SELECT * FROM panel_setting ORDER BY panel_id  DESC";
                                    $result_book = $connection->query($sql_book);
                                    // output data of each row  
                                    while($row_book= $result_book->fetch_assoc()) 
                                    {  
                                        $serial_no =  $serial_no + 1 ;
                                    ?>

                                        <tr>
                                            <td><?php echo  $serial_no ?></td>
                                            <td><?php echo $row_book['company_name']; ?></td>
                                            <td><?php echo $row_book['company_address']; ?></td>
                                            <td><?php echo $row_book['company_logo']; ?></td>
                                            <td><?php echo $row_book['created_by']; ?></td>
                                            <td><?php echo $row_book['updated_by']; ?></td>
                                            <td><?php echo $row_book['username']; ?> </td>
                                           
                                            <td><a href="edit_panel_setting.php?panel_id=<?php echo $row_book['panel_id']; ?>">EDIT</a></td>
                                        </tr>
                                        <?php
                                   
                                    // END LOOP 
                                    }
                                    ?>

                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- BOOK FORM END -->

                    

                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             <!-- Footer -->
             <?php include "footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php

} 

else {
    
        header ('Location: login.php?success=1'); 
        exit();
        }
        
        ob_flush();
?>