<?php
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
            </div>

            <!-- Link js source file for Verify Paddword  -->
            <script src="./js/VerifyPassword.js" type="text/javascript"></script>
            <!-- Form Body -- Change Password -->
            <form id="formChangePassword" class="form form-vertical" action="" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-md-center">           
                    <div class="col-sm-8">
                        <div class="row justify-content-md-center">
                            <div class="col-sm-6">
                                <p id="errorMessage" class="text-center text-white bg-danger font-weight-bold">
                                    
                                </p>
                            </div>
                        </div>
                        
                        <div class="row justify-content-md-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="adminCurrentPassword">Current Password</label>
                                        <input id="currentPassword" type="password" class="form-control" name="adminPassword"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="adminNewPassword">New Password</label>
                                    <input id="newPassword" type="password" class="form-control" name="newPassword" required>
                                </div>
                            </div> 
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="adminConfirmPassword">Confirm Password</label>
                                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <hr>
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back(-1)">Cancel</button>
                                <button id="changePasswordBtn" type="submit" class="btn btn-primary" name="adminChangePasswordBtn">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Page Wrapper -->

<!-- Password change -->
<?php
    if(isset($_POST['adminChangePasswordBtn'])){
        $cp = $_POST['adminPassword'];
        $np = $_POST['newPassword'];
        $cnp = $_POST['confirmPassword'];

        $query = mysqli_query($db,"SELECT adminPassword FROM adminsignup WHERE adminPassword = '$cp' ");
        $num = mysqli_fetch_array($query);

        //change password success if the Current Password is correct
        if($num > 0){
            $con = mysqli_query($db,"UPDATE adminsignup SET adminPassword = '$np' WHERE adminPassword = '$cp' AND adminUsername = '$_SESSION[login_admin]' ");
            ?>
            <script type="text/javascript">
                alert("Password change Successfully.")
            </script>
            <?php
        }
        //change password failure if the Current Password is wrong
        else{
            ?>
            <script type="text/javascript">
                document.getElementById("errorMessage").innerText = "Current password does not match!"
            </script>
            <?php
        }
    }
?>

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>