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

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">TOP 3 FAMOUS CATEGORIES :</h2>

            <?php
                $query = "SELECT * FROM `foodcategorylist` WHERE 
                        categoryName = 'Dessert' AND categoryAvailable = 'Yes'
                        OR categoryName = 'Best Seller' AND categoryAvailable = 'Yes'
                        OR categoryName = 'Drinks' AND categoryAvailable = 'Yes' ";
                $query_run = mysqli_query($db, $query);

                if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_assoc($query_run)){
                        $id = $row['id'];
                        ?>
                            <a href="CategoryFood.php?id=<?php echo $id ?>">
                                <div class="box-3 float-container">
                                    <?php echo '<img src="../../Admin/admin/FoodcategoryImages/'.$row['foodCategoryImage'].'" title="'.$row['categoryName'].'" alt="'.$row['categoryName'].'" class="img-responsive img-curve" style="width: 320px; height: 300px; filter:brightness(0.9)">' ?>

                                    <h3 class="float-text text-white"><?php echo $row['categoryName']; ?></h3>
                                </div>
                            </a>
                        <?php
                    }
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Best Seller</h2>

            <?php
                $query = "SELECT * FROM foodmenulist WHERE foodCategory = 'Best Seller' AND foodAvailable = 'Yes' ";
                $query_run = mysqli_query($db, $query);

                if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_assoc($query_run)){
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
            ?>
            
            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="FoodMenu.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include "./includes/MenuFooter.php"
?>