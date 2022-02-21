<!-- Add to cart button Starts here -->
<?php
    //check user's login status
    if (isset($_SESSION['login_client'])){
        ?>

        <form action="" method="POST">
            <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
            <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="food_name" value="<?php echo $row['foodName']; ?>">
            <input type="hidden" name="food_price" value="<?php echo $row['foodPrice']; ?>">
        </form>

        <?php
    }
    else{
        ?>

        <a href="Cart_BeforeLogin.php" class="btn btn-primary">Add to Cart</a>
        
        <?php
    }
?>
<!-- Add to cart button Ends here -->

<!-- Transfer data after 'Add to Cart' button pressed Starts here -->
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['addToCart'])){
            if(isset($_SESSION['cart'])){
                $foodItems = array_column($_SESSION['cart'], 'food_name');
                if(in_array($_POST['food_name'], $foodItems)){
                    echo "<script>
                        alert('Foods already added');
                        window.location.href = 'FoodMenu.php';
                    </script>";
                }
                else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('food_name'=>$_POST['food_name'], 'food_price'=>$_POST['food_price'], 'Quantity'=>1);
                    echo "<script>
                            alert('Foods added');
                            window.location.href = 'FoodMenu.php';
                        </script>";
                }
            }
            else{
                $_SESSION['cart'][0] = array('food_name'=>$_POST['food_name'], 'food_price'=>$_POST['food_price'], 'Quantity'=>1);
                echo "<script>
                        alert('Foods added');
                        window.location.href = 'FoodMenu.php';
                    </script>";
            }
        }
    }
?>
<!-- Transfer data after 'Add to Cart' button pressed Ends here -->