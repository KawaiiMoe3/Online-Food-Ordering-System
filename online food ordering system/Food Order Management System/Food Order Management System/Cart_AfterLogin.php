<?php
    include "./includes/MenuHeader.php";
?>

    <!-- Container FoodCart Starts here -->
    <div class="container">
        <h2 class="text-center">Food Cart</h2>

        <!-- Cart table Starts here -->
        <div>
            <table class="style-table">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Food Name</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                            $sr = $key + 1;
                            ?>
                            <tr>
                                <td><?php echo $sr; ?></td>
                                <td><?php echo $value['food_name']; ?></td>
                                <td><?php echo $value['food_price']; ?> <input type="hidden" class="fprice" value="<?php echo $value['food_price']; ?>"></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="number" name="Mod_Quantity" onchange="this.form.submit()" value="<?php echo $value['Quantity']; ?>" min="1" max="100" class="text-center fquantity" style="font-size: 20px;">
                                        <input type="hidden" name="food_name" value="<?php echo $value['food_name']; ?>">
                                    </form>
                                </td>
                                <td class="fp_total"></td>
                                <td>
                                    <form action="" method="POST">
                                        <button name="remove_food" onclick="return confirm('Sure to remove from cart?')" class="btn-lg btn-danger">
                                            REMOVE
                                        </button>
                                        <input type="hidden" name="food_name" value="<?php echo $value['food_name']; ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }        
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Cart table Ends here -->

        <!-- Container GrandTotal Starts here -->
        <div class="textsize-middle container">
            <h4>Grand Total:</h4>
            <h5 id="gtotal">RM </h5>
            <br>
            <?php
                $currentClient = $_SESSION['login_client'];
                $query = "SELECT * FROM clientsignup WHERE clientUsername = '$currentClient'";
                $query_run = mysqli_query($db, $query);

                foreach($query_run as $row){
                    //Available Place to Order if cart is not empty     
                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="clientUsername" value="<?php echo $row['clientUsername']; ?>">
                        <input type="hidden" name="clientEmail" value="<?php echo $row['clientEmail']; ?>">
                        <input type="hidden" name="clientPhone" value="<?php echo $row['clientPhone']; ?>">
                        <input type="hidden" name="deliveryAddress" 
                            value="<?php echo $row['clientAddress'];?>,<?php echo $row['clientCity']; ?>,<?php echo $row['clientState']; ?>"
                        >
                        <input type="hidden" id="grandTotal" name="grandTotal">
                        <div>
                            <input type="radio" name="payMode" value="COD" id="codRadioButton" checked>
                            <label for="codRadioButton">
                                Cash On Delivery
                            </label>
                        </div>
                        <br>
                        <button name="placeToOrder" onclick="return confirm('Confirm to order these food?')" class="btn-lg btn-prim">
                            Place to Order
                        </button>
                    </form>
                    <?php
                    }
                    else{
                        echo "<h2 class='text-center'>Empty Food Cart...</h2>
                            <h3 class='text-center'>
                            <a href='FoodMenu.php' class='text-black' style='text-decoration: underline;'>
                                ▶Order Now 🤗◀
                            </a>
                            </h3>";
                    }
                }
            ?>
        </div>
        <!-- Container GrandTotal Ends here -->
    </div>
    <!-- Container FoodCart Ends here -->

<!-- Calculate Total and GrandTotal Starts here -->
<script type="text/javascript">
    //declare variable
    let gt = 0
    let fprice = document.getElementsByClassName('fprice')
    let fquantity = document.getElementsByClassName('fquantity')
    let fp_total = document.getElementsByClassName('fp_total')
    let gtotal = document.getElementById('gtotal')
    let grandTotal = document.getElementById('grandTotal')
    
    //function subTotal
    function subTotal() {
        //set initial gt = 0
        gt = 0
        for (let i = 0; i < fprice.length; i++) {
            fp_total[i].innerText = (fprice[i].value) * (fquantity[i].value)
            gt = gt +  (fprice[i].value) * (fquantity[i].value)
        }
        gtotal.innerText ="RM " + gt
        grandTotal.value = gt
    }
    //call function
    subTotal()
</script>
<!-- Calculate Total and GrandTotal Ends here -->

<!-- Keep the Cart Data when Refresh the browser Starts here -->
<?php
    if(isset($_POST['Mod_Quantity'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['food_name'] == $_POST['food_name']){
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                echo "<script>
                    window.location.href = 'Cart_AfterLogin.php';
                </script>";
            } 
        }
    }
?>
<!-- Keep the Cart Data when Refresh the browser Ends here -->

<!-- Remove Food function Starts here -->
<?php
    if(isset($_POST['remove_food'])){
        //Traverse the following data
        foreach($_SESSION['cart'] as $key => $value){
            if($value['food_name'] == $_POST['food_name']){
                //Removed selected food by using $key
                unset($_SESSION['cart'][$key]);
                //Enqueue the data
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                    alert('Food has been removed');
                    window.location.href = 'Cart_AfterLogin.php';
                </script>";
            } 
        }
    }
?>
<!-- Remove Food function Ends here -->

<!-- Order Placed into database after 'Place to Order' button clicked Starts here -->
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['placeToOrder'])){
            $grandTotal = $_POST['grandTotal'];
            date_default_timezone_set("Asia/Kuala_Lumpur"); //Set timezone in Malaysia/Kuala Lumpur
            $orderDate = date("Y-m-d H:i:sa"); //Set time format as Year-Months-Date Hours-Minutes-Seconds
            $orderStatus = "Ordered"; //Ordered, On Delivery, Delivered, Cancelled
            //Insert client's order information into database
            $query1 = "INSERT INTO `client_order_manager`(`orderDate`, `clientUsername`, `clientEmail`, `clientPhone`, `deliveryAddress`, `payMode`, `orderStatus`, `grandTotal`) 
                    VALUES ('$orderDate','$_POST[clientUsername]','$_POST[clientEmail]','$_POST[clientPhone]','$_POST[deliveryAddress]','$_POST[payMode]', '$orderStatus', '$grandTotal')";
            //$query1 execute
            if(mysqli_query($db, $query1)){
                //Get the client's order ID
                $orderID = mysqli_insert_id($db); 
                //Insert the food which were ordered by the client into database
                $query2 = "INSERT INTO `client_order`(`orderID`, `food_name`, `food_price`, `quantity`) VALUES (?,?,?,?)";
                $stmt = mysqli_prepare($db, $query2);
                if($stmt){
                    /** Insert params to database like below show:
                     *  orderID
                     *  food_name
                     *  food_price
                     *  quantity
                     */
                    mysqli_stmt_bind_param($stmt, "isdi", $orderID, $food_name, $food_price, $quantity);
                    //Traverse the following data
                    foreach ($_SESSION['cart'] as $key => $values){
                        $food_name = $values['food_name'];
                        $food_price = $values['food_price'];
                        $quantity = $values['Quantity'];
                        mysqli_stmt_execute($stmt);
                    }
                    //Clear the cart after order is successful
                    unset($_SESSION['cart']);
                    echo "<script>
                            alert('Order Placed');
                            window.location.href = 'Menu.php';
                        </script>";
                }
                else{
                    echo "<script>
                            alert('SQL Query Prepare Error');
                            window.location.href = 'Cart_AfterLogin.php';
                        </script>";
                }
            }
            else{
                echo "<script>
                    alert('SQL Error');
                    window.location.href = 'Cart_AfterLogin.php';
                </script>";
            }
        }
    }
?>
<!-- Order Placed into database after 'Place to Order' button clicked Ends here -->

<?php
    include "./includes/MenuFooter.php";
?>