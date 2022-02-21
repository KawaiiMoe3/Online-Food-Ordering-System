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
            <h2 class="text-center">Food Categories List</h2>

            <?php
                $query = "SELECT * FROM foodcategorylist WHERE categoryAvailable = 'Yes'";
                $query_run = mysqli_query($db, $query);

                if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_assoc($query_run)){
                        $id = $row['id'];
                        ?>
                        <a href="CategoryFood.php?id=<?php echo $id ?>">
                            <div class="box-3 float-container">
                                <?php echo '<img src="../../Admin/admin/FoodCategoryImages/'.$row['foodCategoryImage'].'" title="'.$row['categoryName'].'" alt="'.$row['categoryName'].'" class="img-responsive img-curve" style="width: 320px; height: 300px; filter:brightness(0.9)">' ?>

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

<?php
    include "./includes/MenuFooter.php"
?>