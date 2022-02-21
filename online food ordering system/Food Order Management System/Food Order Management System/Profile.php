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
    <title>Profile</title>
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
            <div class="col-md-10 my-4 pt-5">
                <div class="row z-depth-3">
                    <!-- Card Body (Left) Start -->
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><?php echo $_SESSION['login_client']; ?></h2>
                            <div class="row justify-content-center">
                                <div class="col-sm-6 mt-2">  
                                    <a href="ProfileEdit.php" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-6 mt-2">
                                    <a href="Password.php" class="btn btn-primary btn-sm">
                                        <i class="fas fa-key"></i>
                                        Password
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body (Left) End -->

                    <!-- Card Body (Right) Start -->
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center text-uppercase">Profile</h3>
                        <hr class="badge-primary mt-0 w-25">
                        <?php 
                            $currentClient = $_SESSION['login_client'];
                            $sql = "SELECT * FROM `clientsignup` WHERE clientUsername = '$currentClient'";
                            $res = mysqli_query($db,$sql);
                
                            if($res){
                                if(mysqli_num_rows($res) > 0){
                                    while($row = mysqli_fetch_array($res)){
                                        //print_r($row['adminUsername']);
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="font-weight-bold">Email:</p>
                                                <h6 class="text-muted"><?php echo $row['clientEmail']; ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="font-weight-bold">Phone:</p>
                                                <h6 class="text-muted"><?php echo $row['clientPhone']; ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="font-weight-bold">Address:</p>
                                                <h6 class="text-muted"><?php echo $row['clientAddress']; ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="font-weight-bold">State:</p>
                                                <h6 class="text-muted"><?php echo $row['clientState']; ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="font-weight-bold">City:</p>
                                                <h6 class="text-muted"><?php echo $row['clientCity']; ?></h6>
                                            </div>
                                        </div>
                                        <hr class="bg-primary">
                                        <div class="row">
                                        <div class="col-sm-12">
                                                <p class="font-weight-bold">Description:</p>
                                                <pre class="text-break"><?php echo $row['clientDescription']; ?></pre>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    <!-- Card Body (Right) End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Ends -->
</body>
</html>