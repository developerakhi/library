
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
   
    $user_id = $_GET['user_id'];

    // GET USER INFO
    
    $sql_user = "SELECT * FROM users where user_id='$user_id'";  
    $result_user = $connection->query($sql_user);
    $row_user = $result_user->fetch_assoc();
    // FOR EDIT USER USER DATA
    $usernameforedit = $row_user['username'];
    $password = $row_user['password'];
    $password = md5($_POST['password']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library -Edit User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>
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
                        <h1 class="h3 mb-0 text-gray-800">User</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;</a>
                    </div>

                    <!--BOOK FORM START -->
                    <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create a New User!</h1>
                            </div>
                            <form class="user" action="edit_user_save_action.php" name="form" id="form" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="username2" name="username2"
                                            value="<?php echo $row_user['username']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password" name="password"
                                        value="<?php echo $row_user['password']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control form-control-user" id="email" name="email"
                                        value="<?php echo $row_user['email']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                            <h6><font color="black"><b>Select User Type</b></font></h6>
                                            <h6><font color="black"><b>Current User Type = </b></font><?php echo $row_user['user_type']; ?></h6>
                                                    <select class="form-control" id="user_type" name="user_type">
                                                        <option value="admin">Admin</option>
                                                        <option value="sales">Sales</option>
                                                    </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h6><font color="black"><b>Select Active Info</b></font></h6>
                                        <h6><font color="black"><b>Current Active Info = </b></font><?php echo $row_user['active_info']; ?></h6>
                                                        <select class="form-control" id="active_info" name="active_info">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <h6><font color="black"><b>Select Sales</b></font></h6>
                                        <h6><font color="black"><b>Current Sales Info = </b></font><?php echo $row_user['sales']; ?></h6>
                                                        <select class="form-control" id="sales" name="sales">
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="branch" name="branch"
                                            value="<?php echo $row_user['branch']; ?>">
                                    </div>
                                </div>
                               
                                <input type="hidden" class="form-control form-control-user" id="user_id" name="user_id" value="<?php echo $user_id; ?>"
                        >                  
                                <button type="button submit"  class="btn btn-primary btn-user btn-block">Update User</button>
                                
                               
                            </form>
                           
                           
                           
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Users List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>username</th>
                                            <th>password</th>
                                            <th>email</th>
                                            <th>user_type</th>
                                            <th>active_info</th>
                                            <th>sales</th>
                                            <th>branch</th>
                                            <th>Updated By</th>
                                            <th>Username By</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                     <?php
                                    // QUERY
                                    // START LOOP 
                                    include "dbconnect.php";
                                    $serial_no = 0;
                                    // Read data
                                    $sql_user = "SELECT * FROM users ORDER BY user_id DESC";
                                    $result_user = $connection->query($sql_user);
                                    // output data of each row  
                                    while($row_user= $result_user->fetch_assoc()) 
                                    {  
                                        $serial_no =  $serial_no + 1 ;
                                    ?>
                    
                                        <tr>
                                            <td><?php echo  $serial_no   ?></td>
                                            <td><?php echo $row_user['username']; ?></td>
                                            <td><?php echo $row_user['password']; ?></td>
                                            <td><?php echo $row_user['email']; ?></td>
                                            <td><?php echo $row_user['user_type']; ?></td>
                                            <td><?php echo $row_user['active_info']; ?></td>
                                            <td><?php echo $row_user['sales']; ?></td>
                                            <td><?php echo $row_user['branch']; ?></td>
                                            <td><?php echo $row_user['created_by']; ?></td>
                                            <td><?php echo $row_user['updated_by']; ?></td>
                                            
                                            <td><a href="edit_user.php?user_id=<?php echo $row_user['user_id']; ?>"><img src="images/edit.png" alt="image" width="30" height="30"></a></td>
                                            <td><a  href="delete_user_action.php?user_id=<?php echo $row_user['user_id']; ?>" onclick="return confirmation()"><img src="images/delete.png" alt="image" width="30" height="30"></a></td>
                                        </tr>
                                         <?php
                                   
                                    // END LOOP 
                                    }
                                    // ?> 

                                      
                                       
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
                        <span aria-hidden="true">??</span>
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