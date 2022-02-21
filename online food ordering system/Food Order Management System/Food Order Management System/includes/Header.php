<?php 
    include "./connectionDB.php";
    session_start();
?>

<?php

if (isset($_SESSION['login_client']))
{
    
 ?>
    <!-- Header Section -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1><span>FOODIE</span></h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li>
                            <a href="#hero" data-after="Home">Home</a>
                        </li>

                        <li>
                            <a href="#services" data-after="Service">Service</a>
                        </li>

                        <li>
                            <a href="#projects" data-after="Projects">Food</a>
                        </li>

                        <li>
                            <a href="#about" data-after="About">About</a>
                        </li>
                        <li>
                            <a href="#contact" data-after="Contact">Contact</a>
                        </li>
                        <li>
                            <div class="navbar">
                                <div class="dropdown">
                                    <button class="dropbtn" onclick="myFunction()">account</button>
                                    <div class="dropdown-content" id="myDropdown">
                                        <a href="Profile.php">Profile</a>
                                        <a href="MyOrdersAfterLogin.php">My Order</a>
                                    </div>
                                </div> 
                            </div>
                            <script src="http://localhost/Online%20Food%20Ordering%20System/online%20food%20ordering%20system/Food%20Order%20Management%20System/Food%20Order%20Management%20System/JS%20Source%20Files/Dropdown.js" type="text/javascript"></script>
                        </li>
                        <li>
                            <a href="Logout.php" class="cta">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header Section -->  

        <!-- Hero Section -->
        <section id="hero">
        <div class="hero container">
            <div>
                <h1>Welcome, <?php echo $_SESSION['login_client']; ?> <span></span></h1>
                <h1>Discover The Most Unique<span></span></h1>
                <h1>TASTE IN FOODIE<span></span></h1>
                <a href="Menu.php" type="button" class="cta">discover menu</a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->
<?php
}

else
{
    ?>
    <!-- Header Section -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1><span>FOODIE</span></h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li>
                            <a href="#hero" data-after="Home">Home</a>
                        </li>

                        <li>
                            <a href="#services" data-after="Service">Service</a>
                        </li>

                        <li>
                            <a href="#projects" data-after="Projects">Food</a>
                        </li>

                        <li>
                            <a href="#about" data-after="About">About</a>
                        </li>
                        <li>
                            <a href="#contact" data-after="Contact">Contact</a>
                        </li>
                        <li>
                            <a href="Login.php" class="cta" >Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header Section -->

        <!-- Hero Section -->
        <section id="hero">
        <div class="hero container">
            <div>
                <h1>Discover <span></span></h1>
                <h1>The Most Unique<span></span></h1>
                <h1>TASTE IN FOODIE<span></span></h1>
                <a href="Menu.php" type="button" class="cta">discover menu</a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

<?php
} 

?> 