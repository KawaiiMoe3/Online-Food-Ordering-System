<?php
    /* Connect to databse */
    include "connectionDB.php";
    /* Admin login */
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <!-- import Login.css -->
    <link rel="stylesheet" type="text/css" href="./CSS/LoginSignUp.css" />
    <!-- import bootstrap -->
    <link rel="stylesheet" type="text/css" href="./Bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./Bootstrap/bootstrap.min.js" />
    <link rel="stylesheet" type="text/css" href="./Bootstrap/jquery.min.js" />
    <link rel="stylesheet" type="text/css" href="./Bootstrap/popper.min.js" />
</head>
<body>
    <div class="admin-login-form">
        <p>
            <span style=" font-family: 'Monstserrat', sans-serif; color: red;">FOODIE</span> <br>
            Administrator Login
        </p>
        <!-- border -->
        <form action="" method="POST">
            <div class="wrapper">
                <!-- Admin's Username -->
                <div class="input-data">
                    <input name="adminUsername" type="text" required="" />
                    <div class="underline"></div>
                    <label>Admin's Username</label>
                </div>
                <br>
                <!-- Password -->
                <div class="input-data">
                    <input name="adminPassword" type="password" required="" />
                    <div class="underline"></div>
                    <label>Password</label>
                </div>
                <br>
                <!-- Login btn -->
                <button class="btn btn-success" name="adminLoginBtn">Login</button>
                <!-- Sign Up -->
                <span style="margin-left: 90px;">Don't have an account?<a href="SignUp.php">Sign Up</a></span>
                <br>
                <!-- Error message -->
                <span style="color: red; font-weight: bold;" id="errorMessage"></span>
        </form>
    </div>
    <?php
        /* After admin press the "Login" button */
        if (isset($_POST['adminLoginBtn'])) {
            /* Obtain the login information from database */
            $count=0;
            $res=mysqli_query($db,"SELECT * FROM `adminsignup` WHERE adminUsername='$_POST[adminUsername]' && adminPassword='$_POST[adminPassword]';");
            $count=mysqli_num_rows($res);

            /* Alert if username or password are incorrect and cannot let him/her login the system */
            if ($count==0) {
                ?>
                <script type="text/javascript">
                    document.getElementById("errorMessage").innerText="Admin's Username or Password are wrong!"
                </script>
                <?php
            }
            else {
                /* If username and password are matche */
                $_SESSION['login_admin']=$_POST['adminUsername'];
                ?>
                
                <!--Jump to homepage after logged in-->
                <script type="text/javascript">
                    window.location="index.php";
                </script>
                <?php
            }
        }
    ?>
</body>
</html>