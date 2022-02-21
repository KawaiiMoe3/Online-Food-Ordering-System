<?php
    include "./connectionDB.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/Profile.css">
</head>
<body class="bg">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 text-danger">FOODIE</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="HomePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Menu.php">Menu</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Profile Start -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 my-4 py-2">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><?php echo $_SESSION['login_client']; ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center text-uppercase">Password</h3>
                        <hr class="badge-primary mt-0">

                        <!-- Link js source file for Verify User's Input -->
                        <script src="./JS Source Files/VerifyPassword.js" type="text/javascript"></script>
                        <!-- Show Error Message -->
                        <p id="errorMessage" class="text-white text-center font-weight-bold bg-danger"></p>
                        
                        <form id="passwordChanger" action="" method="POST">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input id="currentPassword" name="currentPassword" type="password" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input id="newPassword" name="newPassword" type="password" class="form-control" required>
                                <small class="form-text text-muted">
                                    Make sure your password contains atleast 1 capital, 1 lowercase and 1 numeric characters.
                                </small>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="confirmPassword" type="password" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 my-2">
                                    <a href="Profile.php" class="btn btn-secondary">Cancel</a>
                                </div>
                                <div class="col-sm-4 my-2">
                                    <button id="savePasswordBtn" name="savePasswordBtn" type="submit" class="btn btn-primary">
                                        <i class="far fa-save"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Ends -->
</body>
</html>

<!-- Password change -->
<?php
    if(isset($_POST['savePasswordBtn'])){
        $clientUsername = $_SESSION['login_client'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];

        $query = mysqli_query($db,"SELECT clientPassword FROM clientsignup WHERE clientPassword = '$currentPassword' ");
        $num = mysqli_fetch_array($query);

        //change password success if the Current Password is correct
        if($num > 0){
            $con = mysqli_query($db,"UPDATE clientsignup SET clientPassword = '$newPassword' WHERE clientPassword = '$currentPassword' AND clientUsername = '$clientUsername' ");
            ?>
            <script type="text/javascript">
                alert("Password change Successfully.")
                window.location.href = "Profile.php"
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