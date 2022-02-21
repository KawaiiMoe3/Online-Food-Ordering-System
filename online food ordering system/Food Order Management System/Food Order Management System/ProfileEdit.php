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
    <title>Edit Profile</title>
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
                        <h3 class="mt-3 text-center text-uppercase">Edit Profile</h3>
                        <hr class="badge-primary mt-0">
                        <!-- Link js source file for Verify User's Input -->
                        <script src="./JS Source Files/VerifyInputProfile.js" type="text/javascript"></script>
                        <!-- Show Error Message -->
                        <p id="errorMessage" class="text-white text-center font-weight-bold bg-danger"></p>
                        <?php 
                            $currentClient = $_SESSION['login_client'];
                            $sql = "SELECT * FROM `clientsignup` WHERE clientUsername = '$currentClient'";
                            $res = mysqli_query($db,$sql);
                
                            if($res){
                                if(mysqli_num_rows($res) > 0){
                                    while($row = mysqli_fetch_array($res)){
                                        //print_r($row['adminUsername']);
                                        ?>
                                        <form id="profileEditor" action="" method="POST">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="font-weight-bold">Email:</p>
                                                        <input id="email" name="clientEmail" value="<?php echo $row['clientEmail']; ?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="font-weight-bold">Phone:</p>
                                                        <input id="phone" name="clientPhone" value="<?php echo $row['clientPhone']; ?>"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="font-weight-bold">Address:</p>
                                                        <input id="address" name="clientAddress" value="<?php echo $row['clientAddress']; ?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="font-weight-bold">State:</p>
                                                        <?php $clientState = $row['clientState']; ?>
                                                        <select id="state" name="clientState" onchange="makeSubmenu(this.value)" class="form-control" required>
                                                            <option disabled selected>Choose your State</option>
                                                            <option <?php if($clientState == "Selangor") echo 'selected="selected"'; ?> value="Selangor">Selangor</option>
                                                            <option <?php if($clientState == "Sabah") echo 'selected="selected"'; ?> value="Sabah">Sabah</option>
                                                            <option <?php if($clientState == "Johor") echo 'selected="selected"'; ?> value="Johor">Johor</option>
                                                            <option <?php if($clientState == "Sarawak") echo 'selected="selected"'; ?> value="Sarawak">Sarawak</option>
                                                            <option <?php if($clientState == "Perak") echo 'selected="selected"'; ?> value="Perak">Perak</option>
                                                            <option <?php if($clientState == "Kedah") echo 'selected="selected"'; ?> value="Kedah">Kedah</option>
                                                            <option <?php if($clientState == "Kelantan") echo 'selected="selected"'; ?> value="Kelantan">Kelantan</option>
                                                            <option <?php if($clientState == "Pulau_Pinang") echo 'selected="selected"'; ?> value="Pulau_Pinang">Pulau Pinang</option>
                                                            <option <?php if($clientState == "WP_Kuala_Lumpur") echo 'selected="selected"'; ?> value="WP_Kuala_Lumpur">W.P. Kuala Lumpur</option>
                                                            <option <?php if($clientState == "Pahang") echo 'selected="selected"'; ?> value="Pahang">Pahang</option>
                                                            <option <?php if($clientState == "Terengganu") echo 'selected="selected"'; ?> value="Terengganu">Terengganu</option>
                                                            <option <?php if($clientState == "Negeri_Sembilan") echo 'selected="selected"'; ?> value="Negeri_Sembilan">Negeri Sembilan</option>
                                                            <option <?php if($clientState == "Melaka") echo 'selected="selected"'; ?> value="Melaka">Melaka</option>
                                                            <option <?php if($clientState == "Perlis") echo 'selected="selected"'; ?> value="Perlis">Perlis</option>
                                                            <option <?php if($clientState == "WP_Putrajaya") echo 'selected="selected"'; ?> value="WP_Putrajaya">W.P. Putrajaya</option>
                                                            <option <?php if($clientState == "WP_Labuan") echo 'selected="selected"'; ?> value="WP_Labuan">W.P. Labuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="font-weight-bold">City:</p>
                                                        <?php $clientCity = $row['clientCity']; ?>
                                                        <select id="city" name="clientCity" class="form-control" required>
                                                            <option value="<?php echo $clientCity; ?>"><?php echo $clientCity; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="bg-primary">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <p class="font-weight-bold">Description:</p>
                                                        <textarea id="description" name="clientDescription" rows="5" cols="40" class="form-control" placeholder="Write Somethings here..."><?php echo $row['clientDescription']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Link js source file for option state and city -->
                                            <script src="./JS Source Files/OptionStateCity.js" type="text/javascript"></script>

                                            <div class="row">
                                                <div class="col-sm-2 my-2">  
                                                    <a href="Profile.php" class="btn btn-secondary">
                                                        Cancel
                                                    </a>
                                                </div>
                                                <div class="col-sm-4 my-2">
                                                    <button id="saveBtn" type="submit" name="clientProfileEditBtn" class="btn btn-primary">
                                                        <i class="far fa-save"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Ends -->
</body>
</html>

<?php
    if (isset($_POST['clientProfileEditBtn'])){
        
        $query = "UPDATE `clientsignup` SET `clientEmail`='$_POST[clientEmail]',`clientPhone`='$_POST[clientPhone]',
                `clientAddress`='$_POST[clientAddress]',`clientState`='$_POST[clientState]',
                `clientCity`='$_POST[clientCity]',`clientDescription`='$_POST[clientDescription]'
                WHERE clientUsername='$currentClient'";
        $query_run=mysqli_query($db,$query);

        if($query_run){
            echo "<script type=text/javascript>
                alert('Profile Updated')
                window.location.href = 'Profile.php'
            </script>";
        }
        else {
            echo "<script type=text/javascript>
                alert('Profile Update Failure!')
                window.location.href = 'Profile.php'
            </script>";
        }
    }
?>