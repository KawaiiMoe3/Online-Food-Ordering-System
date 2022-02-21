<?php
    include "./includes/MenuHeader.php"
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-food text-center">
        <div class="container">
            
            <form action="FoodSearch.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form> 

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        //Check whether categories id is passed or not
        if(isset($_GET['id'])){
            //Category id is set and get the id
            $id = $_GET['id'];
            //get the Category Name based on category ID
            $sql = "SELECT categoryName FROM foodcategorylist WHERE id = $id ";

            //Execute the query
            $res = mysqli_query($db, $sql);
            //Get the data from database
            $row2 = mysqli_fetch_assoc($res);
            //Get the category name
            $categoryName = $row2['categoryName'];

        }
        else{
            //Category not passed
            //Redirect to Home
            header('location:Menu.php');
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-food text-center">
        <div class="container">
            <h2>Foods on: "<a href="javascript:void(0)" class="text-black"><?php echo $categoryName; ?></a>"</h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            

            <?php 
                //Create SQL Query to get foods based on selected category
                $sql2 = "SELECT * FROM foodmenulist WHERE foodCategory = '$categoryName' AND foodAvailable = 'Yes' ";
                //Execute the Query
                $res2 = mysqli_query($db, $sql2);
                //Count the rows
                $count2 = mysqli_num_rows($res2);

                //Check whether food is available or not
                if($count2 > 0){
                    //Food is available
                    while($row = mysqli_fetch_assoc($res2)){
                        //get the details
                        $id = $row['id'];
                        $foodName = $row['foodName'];
                        $foodDescription = $row['foodDescription'];
                        $foodPrice = $row['foodPrice'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php echo '<img src="../../Admin/admin/FoodImages/'.$row['foodImage'].'" title="'.$row['foodName'].'" alt="'.$row['foodName'].'" class="img-responsive img-curve">' ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $row['foodName']; ?></h4>
                                <p class="food-price">RM <?php echo $row['foodPrice']; ?></p>
                                <p class="food-detail">
                                    <?php echo $row['foodDescription']; ?>
                                </p>
                                <br>

                                <!-- Add to cart button Starts here -->
                                <?php
                                    include "./includes/AddToCart.php";
                                ?>
                                <!-- Add to cart button Ends here -->
                            </div>
                        </div>
                        <?php
                    }
                }
                else{
                    //Food not available
                    echo "<div class='error-message'>Foods still not available on this category yet...</div>";
                }
            ?>  

            <div class="clearfix"></div>
            
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include "./includes/MenuFooter.php"
?>