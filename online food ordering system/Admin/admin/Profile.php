<?php 
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            </div>
            <!-- Profile -->
            <!-- Show Profile -->
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block"><img style="height: 580px; width: 450px;" src="../Images/profileImage2.jpg"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <!--Card Body -- Profile title -->
                                                <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Profile</h1>
                                        </div>
                                        <hr>
                                            <?php 
                                                $currentAdmin = $_SESSION['login_admin'];
                                                $sql = "SELECT * FROM `adminsignup` WHERE adminUsername = '$currentAdmin' ";
                                                $res = mysqli_query($db,$sql);
                                    
                                                if($res){
                                                    if(mysqli_num_rows($res) > 0){
                                                        while($row = mysqli_fetch_array($res)){
                                                            //print_r($row['adminUsername']);
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    Name : 
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <h5 class="text-right"><?php echo $row['adminUsername']; ?></h5>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    Email : 
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <h5 class="text-right"><?php echo $row['adminEmail']; ?></h5>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    No.HP : 
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <h5 class="text-right"><?php echo $row['adminPhone']; ?></h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    Description :
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <p class="h5"><?php echo $row['adminDescription']; ?></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                            <hr>
                                            <!-- Profile Settings - Edit button -->
                                            <a href="SettingsProfile.php">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa-user-edit"></i>
                                                    Edit Profile
                                                </button>
                                            </a>
                                    </div>
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

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>