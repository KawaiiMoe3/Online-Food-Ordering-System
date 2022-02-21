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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search-food text-center">
        <div class="container">
            <?php
                //Get the search keywords
                $search = $_POST['search'];
            ?>
            <h2>Foods on Your Search: "<a href="javascript:void(0)" class="text-black"><?php echo $search; ?></a>"</h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                

                //Sql Query to get foods based on search keywords
                $sql = "SELECT * FROM foodmenulist WHERE 
                        foodName LIKE '%$search%' AND foodAvailable = 'Yes'
                        OR foodDescription LIKE '%$search%' AND foodAvailable = 'Yes' ";

                //Execute the query
                $res = mysqli_query($db, $sql);
                //Count rows
                $count = mysqli_num_rows($res);

                //check whether food available or not
                if($count > 0){
                    //Food available
                    while($row = mysqli_fetch_assoc($res)){
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
                                <h4><?php echo $foodName; ?></h4>
                                <p class="food-price">RM <?php echo $foodPrice; ?></p>
                                <p class="food-detail">
                                    <?php echo $foodDescription; ?>
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
                    echo "<div class='error-message'>Foods not found...</div>";
                }
            ?>

            

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include "./includes/MenuFooter.php"
?>