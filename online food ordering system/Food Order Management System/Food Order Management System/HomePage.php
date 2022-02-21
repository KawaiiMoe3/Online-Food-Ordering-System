<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/MainStyle.css">
    <title>FOODIE</title>
</head>

<body>

<?php 
    include "./includes/Header.php";
?>
    <!-- Service Section -->
    <section id="services">
        <div class="services container">
            <div class="service-top">
                <h1 class="section-title">Why <span>foodie </span>?</h1>
                <p>FOODIE offers unique tastes in food with emotional satisfaction...Real excitement. We are known for our great quality food and different styles of cooking so come and have try out in FOODIE!!</p>
            </div>
            <div class="service-bottom">
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/office/160/000000/hamburger.png"/>
                    </div>
                    <h2>Unique Styles of food</h2>
                    <p>FOODIE has a secret recipe, which only the chef knows, our chef has undergone a great deal of training to ensure we reach your satisfaction when you taste our food. </p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/office/80/000000/menu--v1.png"/>
                    </div>
                    <h2>Variety of food choice</h2>
                    <p>Do you want a pizza? Sure! Want a burger? Not a problem! FOODIE has variety of food choice for you to choose as we know that hate eating the same thing evryday.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/office/80/000000/cook-male--v1.png"/>
                    </div>
                    <h2>professional chefs</h2>
                    <p>As we mentioned, our restaurant serve customers with our secret recipe.To ensure our food taste reach the maximun satisfaction to you, we had a course for every chefs.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="https://img.icons8.com/office/80/000000/service-bell.png"/>
                    </div>
                    <h2>Well trained staffs</h2>
                    <p>Well, besides delicious food, services is also an important to customers and we did that too as we had a course to train staffs for giving you a better services in FOODIE.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Section -->

    <!-- Projects Section -->
    <section id="projects">
        <div class="projects container">
            <div class="projects-header">
                <h1 class="section-title"><span>recommended</span> food</h1>
            </div>

            <div class="all-projects">

                <div class="project-item">
                    <div class="project-info">
                        <h1>Spaghetti</h1>
                        <h2>with cabonara sauce</h2>
                        <p>In FOODIE, you eat not only a spaghetti, but with the memories of mother making this dish to you</p>
                    </div>
                    <div class="project-img">
                        <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="img">
                    </div>
                </div>

                <div class="project-item">
                    <div class="project-info">
                        <h1>Burger</h1>
                        <h2>With cheese, vegetables, onions, tomatoes, etc</h2>
                        <p>When ordering burgers, you are free to choose different patties and side dishes and also your puttings. Just say it, and we'll do it for you.</p>
                    </div>
                    <div class="project-img">
                        <img src="https://images.pexels.com/photos/2983101/pexels-photo-2983101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="img">
                    </div>
                </div>

                <div class="project-item">
                    <div class="project-info">
                        <h1>Ramen</h1>
                        <h2>Japanese style, but bigger version</h2>
                        <p>Love ramen? Here you go! We make not only ramen, but a HUGE size of ramen which can be enjoyed by 2~3 people.</p>
                    </div>
                    <div class="project-img">
                        <img src="https://images.pexels.com/photos/3026808/pexels-photo-3026808.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="img">
                    </div>
                </div>


                <a href="Menu.php" type="button" class="cta">Check out our menu</a>
            </div>
        </div>
    </section>
    <!-- End projects Section -->

    <!-- About Section -->
    <section id="about">
        <div class="about container">
            <div class="col-left">
                <div class="about-img">
                    <img src="https://images.pexels.com/photos/1106476/pexels-photo-1106476.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="img">
                </div>
            </div>
            <div class="col-right">
                <h1 class="section-title">About <span>us</span></h1>
                <h2>we cook, but with satisfaction</h2>
                <p> Founded by a group of members. Angus, David and Jun Sam. Founded in 2021-10-07. Inspired by someone else who was a nice guy. With the guy help, our restaurant runs smoothly.</p>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Footer -->
    <?php
        include "./includes/Footer.php";
    ?>
</body>

</html>