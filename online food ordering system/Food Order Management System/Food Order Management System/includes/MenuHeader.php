<?php
    include "./connectionDB.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>

    <!-- Link CSS file -->
    <link rel="stylesheet" href="./css/MenuStyle.css">
    <link rel="stylesheet" href="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/library/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="HomePage.php" title="FOODIE">
                    <h1><span style="color: crimson;">FOODIE</span></h1>
                </a>
            </div>
            <?php
                if (isset($_SESSION['login_client'])){
                    ?>
                    <div class="menu text-right">
                        <ul>
                            <li>
                                <a href="Menu.php">Home</a>
                            </li>
                            <li>
                                <a href="FoodCategories.php">Categories</a>
                            </li>
                            <li>
                                <a href="FoodMenu.php">Foods</a>
                            </li>
                            <li>
                                <?php
                                $count = 0;
                                    if(isset($_SESSION['cart'])){
                                        $count = count($_SESSION['cart']);
                                    }
                                ?>
                                <a href="Cart_AfterLogin.php">Cart <sup>(<?php echo $count; ?>)</sup></a>
                            </li>
                            <li>
                                <a href="MyOrdersAfterLogin.php">myOrders</a>
                            </li>
                            <li>
                                <a href="Logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="menu text-right">
                        <ul>
                            <li>
                                <a href="Menu.php">Home</a>
                            </li>
                            <li>
                                <a href="FoodCategories.php">Categories</a>
                            </li>
                            <li>
                                <a href="FoodMenu.php">Foods</a>
                            </li>
                            <li>
                                <a href="Cart_BeforeLogin.php">Cart</a>
                            </li>
                            <li>
                                <a href="MyOrdersBeforeLogin.php">myOrders</a>
                            </li>
                            <li>
                                <a href="Login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Main fOOD Image Section Starts Here -->
    <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            

            <div class="slide first">
                <img src="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/images/foodie-bg.jpg" alt="">
            </div>
            <div class="slide">
                <img src="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/images/foodie-bg2.png" alt="">
            </div>
            <div class="slide">
                <img src="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/images/foodie-bg3.jpg" alt="">
            </div>
            <div class="slide">
                <img src="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/images/foodie-bg4.jpg" alt="">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
        </div>
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
    </div>

    <script type="text/javascript">
        //Initial count
        let counter = 1
        //Set an interval between 5s
        setInterval(function(){
            //Show the relevant image
            document.getElementById('radio' + counter).checked = true
            counter ++
            //If count more than 4, then counter = 1
            if(counter > 4){
                counter = 1
            }
        },5000)
    </script>
    <!-- Main fOOD Image Section Ends Here -->

    