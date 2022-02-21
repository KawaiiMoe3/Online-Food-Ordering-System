<?php
include "connectionDB.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(60deg, #29323c 0%, #485563 100%);
        }
        
        .row {
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }
        
        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            
        }
        
        .btn1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: crimson;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            transition: .3s ease background-color;
            transition-property: background-color, color;
        }
        
        .btn1:hover {
            background: white;
            border: 1px solid;
            color: crimson;
        }

        ::-webkit-scrollbar{
            width: 10px;
        }

        ::-webkit-scrollbar-thumb{
            background: linear-gradient(transparent, #008aff);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover{
            background: linear-gradient(transparent, #00c6ff);
        }

        ::-webkit-scrollbar-track{
            background-color: rgb(216, 216, 255);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="https://images.pexels.com/photos/2641886/pexels-photo-2641886.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid" alt=" ">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1>Welcome back!</h1>
                    <h4>Sign into your account</h4>
                    <!-- Show Error Message -->
                    <p id="errorMessage" class="text-white text-center fw-bold bg-danger"></p>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="username" placeholder="Enter your username" class="form-control my-3 p-4" name="clientUsername" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="password" placeholder="Enter your password" class="form-control my-3 p-4" name="clientPassword" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn1 mt-3 mb-5" name="Login">Login</button>
                            </div>
                        </div>
                        <p>Don't have an account?
                            <a href="SignUp.php">Register here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </script>

</body>
</html>

<?php
        /* After client press the "Login" button */
        if (isset($_POST['Login'])) {
            /* Obtain the login information from database */
            $count=0;
            $res=mysqli_query($db,"SELECT * FROM `clientsignup` WHERE clientUsername='$_POST[clientUsername]' && clientPassword='$_POST[clientPassword]';");
            $count=mysqli_num_rows($res);

            /* Alert if username or password are incorrect and cannot let him/her login the system */
            if ($count==0) {
                ?>
                <script type="text/javascript">
                    document.getElementById("errorMessage").innerText="Wrong username or password!"
                </script>
                <?php
            }
            else {
                /* If username and password are matche */
                $_SESSION['login_client']=$_POST['clientUsername'];
                ?>
                
                <!--Jump to homepage after logged in-->
                <script type="text/javascript">
                    window.location="HomePage.php";
                </script>
                <?php
            }
        }
    ?>
