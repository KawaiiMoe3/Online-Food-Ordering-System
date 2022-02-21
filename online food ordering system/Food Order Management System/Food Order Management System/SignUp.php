<?php 
include "connectionDB.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup</title>
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
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="https://images.pexels.com/photos/3490368/pexels-photo-3490368.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid" alt=" ">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1>You made the right choice!</h1>
                    <h4>Sign up to your account</h4>

                    <!-- Link js source file for Verify User's Input -->
                    <script src="./JS Source Files/VerifyInput.js" type="text/javascript"></script>
                    <!-- Show Error Message -->
                    <p id="errorMessage" class="text-white text-center fw-bold bg-danger"></p>

                    <!-- Sign up form -->
                    <form id="formRegister" action="" method="POST">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <input id="username" type="username" placeholder="Enter your username" class="form-control my-3 p-2" name="clientUsername" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input id="password" type="password" placeholder="Enter your password" class="form-control my-3 p-2" name="clientPassword" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input id="email" type="email" placeholder="Enter your email" class="form-control my-3 p-2" name="clientEmail" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input id="phone" type="phone" placeholder="Enter your phone number: +60123456789 or 0123456789" class="form-control my-3 p-2" name="clientPhone" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <input id="address" type="address" placeholder="Enter your address: HouseNo, Jalan Foodie, Taman Foodie, Postcode " class="form-control my-3 p-2" name="clientAddress" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12">
                            <select id="state" name="clientState" onchange="makeSubmenu(this.value)" class="form-select" aria-label="Default select example" required>
                                <option disabled selected>Choose your State</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Johor">Johor</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Perak">Perak</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Pulau_Pinang">Pulau Pinang</option>
                                <option value="WP_Kuala_Lumpur">W.P. Kuala Lumpur</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Negeri_Sembilan">Negeri Sembilan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Perlis">Perlis</option>
                                <option value="WP_Putrajaya">W.P. Putrajaya</option>
                                <option value="WP_Labuan">W.P. Labuan</option>
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <select id="city" name="clientCity" class="form-select" aria-label="Default select example" required>
                                    <option disabled selected>Choose your City</option>
                                </select>
                            </div>
                        </div>
                        <!-- Link js source file for option state and city -->
                        <script src="./JS Source Files/OptionStateCity.js" type="text/javascript"></script>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <button id="signUpBtn" type="submit" class="btn1 mt-3 mb-5" name="SignUp">Signup</button>
                            </div>
                        </div>
                        <p>Already have an account?
                            <a href="Login.php">Login Here</a>
                        </p>
                        <section class="Form my-4 mx-5">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js " integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js " integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13 " crossorigin="anonymous "></script>
    </script>
   
</body>

</html>

<?php
    if (isset($_POST['SignUp'])) {
        $clientUsername = $_POST['clientUsername'];
        $clientPassword = $_POST['clientPassword'];
        $clientEmail = $_POST['clientEmail'];
        $clientPhone = $_POST['clientPhone'];
        $clientAddress = $_POST['clientAddress'];
        $clientState = $_POST['clientState'];
        $clientCity = $_POST['clientCity'];

        $count=0;
        $sql="SELECT clientUsername from `clientsignup`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['clientUsername']==$_POST['clientUsername'])
            {
                $count=$count+1;
            }
        }

        if($count==0)
            {
            $query = "INSERT INTO `clientsignup`(`clientUsername`, `clientPassword`, `clientEmail`, `clientPhone`, `clientAddress`, `clientState`, `clientCity`) 
                    VALUES ('$clientUsername', '$clientPassword', '$clientEmail', '$clientPhone', '$clientAddress', '$clientState', '$clientCity')";
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