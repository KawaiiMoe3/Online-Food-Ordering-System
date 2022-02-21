<?php
    /* Connect to databse */
    include "./connectionDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Sign Up</title>
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
            Administrator Sign Up
        </p>
        <!-- Link js source file for Verify User's Input -->
        <script src="./js/VerifyInput.js" type="text/javascript"></script>
        <!-- border -->
        <form id="formRegister" action="" method="POST">
            <div class="wrapper">
                <!-- Admin's Username -->
                <div class="input-data">
                    <input id="username" name="adminUsername" type="text" required="" />
                    <div class="underline"></div>
                    <label>Admin's Username</label>
                </div>
                <br>
                <!-- Password -->
                <div class="input-data">
                    <input id="password" name="adminPassword" type="password" required="" />
                    <div class="underline"></div>
                    <label>Password</label>
                </div>
                <br>
                <!-- Enail -->
                <div class="input-data">
                    <input id="email" name="adminEmail" type="text" required="" />
                    <div class="underline"></div>
                    <label>Email</label>
                </div>
                <br>
                <!-- Phone No -->
                <div class="input-data">
                    <input id="phone" name="adminPhone" type="text" required="" />
                    <div class="underline"></div>
                    <label>No.Telephone</label>
                </div>
                <br>
                <!-- Sign up btn -->
                <button id="signUpBtn" class="btn btn-primary" name="adminSignUpBtn">Sign Up</button>
                <!-- Login -->
                <span style="margin-left: 75px;">Already have an account?<a href="Login.php">Login</a></span>
                <br>
                <!-- Error message -->
                <span style="color: red; font-weight: bold" id="errorMessage"></span>
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['adminSignUpBtn'])) {
            $adminUsername = $_POST['adminUsername'];
            $adminPassword = $_POST['adminPassword'];
            $adminEmail = $_POST['adminEmail'];
            $adminPhone = $_POST['adminPhone'];

            $count=0;
            $sql="SELECT adminUsername from `adminsignup`";
            $res=mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res))
            {
                if($row['adminUsername']==$_POST['adminUsername'])
                {
                    $count=$count+1;
                }
            }

            if($count==0)
                {
                    $query = "INSERT INTO `adminsignup`(`adminUsername`, `adminPassword`, `adminEmail`, `adminPhone`) 
                            VALUES ('$adminUsername', '$adminPassword', '$adminEmail', '$adminPhone')";
                    $query_run = mysqli_query($db, $query);

                    if($query_run){
                        echo "<script>
                            alert('Sign Up Successfully');
                            window.location.href = 'Login.php';
                        </script>";
                    }
                    else{
                        echo "<script>
                            alert('Sign Up Failure!');
                            window.location.href = 'Login.php';
                        </script>";
                    }
                }
            else
                {
        
                ?>
                <script type="text/javascript">
                    document.getElementById("errorMessage").innerText = "The username already exist."
                </script>
                <?php
                }
          }
            ?>
</body>
</html>