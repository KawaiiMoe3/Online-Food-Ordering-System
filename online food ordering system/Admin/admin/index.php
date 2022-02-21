<?php 
    include "connectionDB.php";
    session_start();
    include "./includes/Header.php";
    include "./includes/Navbar.php";
?>

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

        <!-- Topbar Timing -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <div><i class="far fa-clock fa-2x"></i></div>
        <div id="localtime">
        <i class="fas fa-clock"></i>
            <script src="./js/LocalTime.js"></script>
        </div>
            

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo $_SESSION['login_admin']; ?>
                    </span>
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="ChangePassword.php">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a> -->
        </div>

        <!-- Content Row Dashboard -->
        <div class="row">

            <!-- Pending Orders Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Customer Orders
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <!-- Dynamic show the quantity -->
                                    <?php
                                        $query = "SELECT orderID FROM client_order_manager ORDER BY orderID";
                                        $query_run = mysqli_query($db, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo $row;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-list-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirmed Orders Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Revenues
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $sql = "SELECT SUM(grandTotal) AS GrandTotal 
                                                FROM client_order_manager
                                                WHERE orderStatus = 'Delivered'";
                                        $res = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_assoc($res);
                                        //Get the Total Revenue
                                        $totalRevenue = $row['GrandTotal'];
                                        //Show the total revenue
                                        echo "RM " .$totalRevenue;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quantity of Food List Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Quantity of Food List
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <!-- Dynamic show the quantity -->
                                    <?php
                                        $query = "SELECT id FROM foodmenulist ORDER BY id";
                                        $query_run = mysqli_query($db, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo $row;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-pizza-slice fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

        <!-- Quantity of Food Categories Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Quantity of Food Categories
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <!-- Dynamic show the quantity -->
                                    <?php
                                        $query = "SELECT id FROM foodcategorylist ORDER BY id";
                                        $query_run = mysqli_query($db, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo $row;
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-th-list fa-2x text-gray-300 "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-arrow-up"></i>
</a>

</div>
<!-- End of Page Wrapper -->


<!-- include Scripts and footer files -->
<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>