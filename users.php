<?php
session_start();
include_once 'driver.php';
// $queries = $_POST['queries'];
// $replies = $_POST['replies'];

$sql = "SELECT * FROM users";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query);
// if($result == true){
// header('location:dash.php');
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Chatbot</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed" style="overflow-x: hidden;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand" style="background:white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="dash.php" class="nav-link">Home</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="new.php" class="nav-link">AddQuery</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="users.php" class="nav-link">Clients</a>
                </li>


                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin.php" class="nav-link">Admins</a>
                </li>
                <li style="padding-left: 800px;">
                    <div class="dropdown">
                        <button id="my-dropdown" class="btn btn-primary dropdown-toggle bg-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?></button>
                        <div class="dropdown-menu" aria-labelledby="my-dropdown">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>

            </ul>

            <div class="user-panel d-flex">
                <div class="image">
                    <img src="dist/img/emma.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
            </div>
            <!-- Right navbar links -->
        </nav>


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="background: white;">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/emma.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info" style="padding-left: 30px;">
                        <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dash.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Queries</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="new.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Queries</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="users.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clients</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="admin.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admins</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
        </aside>

        <section class="cont" style="padding-top: 50px; width:2000px;">
            <div class="content align-self-md-center">
                <div class="row p-xl-5" style="margin-left: 420px;">
                    <div class="col-md-6" style="padding-bottom: 30px;">
                        <div class="card card-danger" style="position: flex; width:1000px;">
                            <div class="card-header" style="background:white; color:black;">
                                <h3 class="card-title">List of Clients</h3>
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="padding-left: 30px;">name</th>
                                            <th style="padding-left: 30px;">Email</th>
                                            <th style="padding-left: 40px;">password</th>
                                            <th style="padding-left: 200px;">role</th>
                                            <th style="padding-left: 100px;">edit</th>
                                            <th style="padding-left: 100px;">delete</th>
                                        </tr>

                                    <tbody>

                                        <?php
                                        for ($i = 0; $i < sizeof($results); $i++) { ?>
                                            <tr>
                                                <td><?php echo $results[$i][0] ?></td>
                                                <td style="padding-left: 30px;"><?php echo $results[$i][1] ?></td>
                                                <td style="padding-left: 30px;"><?php echo $results[$i][2] ?></td>
                                                <td style="padding-left: 40px;"><?php echo $results[$i][3] ?></td>
                                                <td style="padding-left: 200px;"><?php echo $results[$i][4] ?></td>
                                                <td style="padding-left: 100px;">
                                                    <a href="edituser.php?id=<?php echo $results[$i][0]; ?>" class="fas fa-edit"></a>
                                                </td>
                                                <td style="padding-left: 100px;">
                                                    <a href="delusers.php?id=<?php echo $results[$i][0]; ?>" class="btn btn-outline-danger">
                                                        del
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                    </thead>
                                </table>
                                <center style="padding-top:20px">
                                    <a href="newusers.php" class="btn btn-outline-success">+Add</a>
                                    <a href="dash.php" class="btn btn-outline-danger">close</a>
                                </center>

                                <!-- /.form group -->

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                    </div>

                </div>

            </div>
        </section>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2025 <a href="#">Hospital Chatbot</a>.</strong>
            All rights reserved.
            <!-- <div class="float-right d-none d-sm-inline-block">
                                    <b>Version</b> 3.2.0
                                </div> -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>