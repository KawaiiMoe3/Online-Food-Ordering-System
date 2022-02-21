<?php
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile Settings</h1>
            </div>

            <!-- markup -->
            <!-- note: your server code `/site/avatar_upload/2` will receive `$_FILES['avatar-2']` on form submission -->
            <!-- the avatar markup -->

            <!-- Link js source file for Verify User's Input  -->
            <script src="./js/VerifyInputProfile.js" type="text/javascript"></script>
            <form id="formUpdateProfile" class="form form-vertical" action="" method="POST" enctype="multipart/form-data">
                <?php 
                    $currentAdmin = $_SESSION['login_admin'];
                    $sql = "SELECT * FROM `adminsignup` WHERE adminUsername = '$currentAdmin' ";
                    $res = mysqli_query($db,$sql);

                    if($res){
                        if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_array($res)){
                                //print_r($row['adminUsername']);
                                ?>
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
                                                    <label for="adminUsername">Admin's Username</label>
                                                    <input value="<?php echo $row['adminUsername']; ?>" type="text" class="form-control" style="cursor: not-allowed;" name="adminUsername" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-md-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="adminEmail">Email</label>
                                                    <input id="email" value="<?php echo $row['adminEmail']; ?>" type="text" class="form-control" name="adminEmail" required>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row justify-content-md-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="adminPhone">No.Telephone</label>
                                                    <input id="phone" value="<?php echo $row['adminPhone']; ?>" type="text" class="form-control" name="adminPhone" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-md-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="adminDescription" class="form-control" rows="5" cols="20" placeholder="Write Somethings here..."><?php echo $row['adminDescription']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <hr>
                                            <div class="text-center">
                                                <a href="Profile.php" class="btn btn-secondary">Cancel</a>
                                                <button id="updateProfileBtn" type="submit" class="btn btn-primary" name="adminUpdateProfileBtn">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <?php
                            }
                        }
                    }
                ?> 
            </form>
            <?php
                if (isset($_POST['adminUpdateProfileBtn'])){
                    //echo "<pre>", print_r($_FILES['adminAvatar']) , "</pre>";
                    //echo "<pre>", print_r($_FILES['adminAvatar']['name']) , "</pre>";
                    $currentAdmin = $_SESSION['login_admin'];
                    $query = "UPDATE `adminsignup` SET adminEmail='$_POST[adminEmail]', 
                            adminPhone='$_POST[adminPhone]', adminDescription='$_POST[adminDescription]'
                            WHERE adminUsername='$currentAdmin' ";
                    $query_run=mysqli_query($db,$query);

                    /* $adminAvatar = time() . '_' . $_FILES['adminAvatar']['name'];
                    $target = 'img/' . $adminAvatar;

                    move_uploaded_file($_FILES['adminAvatar']['tmp_name'], $target); */

                    if($query_run){
                        echo '<script type="text/javascript"> alert("Profile Updated") </script>';
                    }
                    else {
                        echo '<script type="text/javascript"> alert("Profile Update failed!") </script>';
                    }
                }
            ?>

            <!-- the fileinput plugin initialization -->
            
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