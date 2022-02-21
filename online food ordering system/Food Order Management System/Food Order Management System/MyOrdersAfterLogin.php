<?php
    include "./includes/MenuHeader.php";
?>

    <!-- Container FoodCart Starts here -->
    <div class="container">
        <h2 class="text-center">My Orders</h2>
        <?php
            $clientUsername = $_SESSION['login_client'];
            $query = "SELECT * FROM `client_order_manager` WHERE clientUsername = '$clientUsername'";
            $userResult = mysqli_query($db, $query);
        ?>
        <a href="Receipt.php?clientUsername=<?php echo $clientUsername; ?>" target="_blank" class="btn-lg btn-prim">
            Generate Receipt
        </a>
        <!-- Cart table Starts here -->
        <div>
            <table class="style-table2">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Delivery Address</th>
                        <th>Payment Method</th>
                        <th>Orders</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($userFetch = mysqli_fetch_assoc($userResult)){
                            ?>
                            <tr>
                                <td><?php echo $userFetch['orderID']; ?></td>
                                <td><?php echo $userFetch['orderDate']; ?></td>
                                <td><?php echo $userFetch['deliveryAddress']; ?></td>
                                <td><?php echo $userFetch['payMode']; ?></td>
                                <td>
                                    <table class="style-table2">
                                        <thead>
                                            <tr>
                                                <th>Food Name</th>
                                                <th>Price (RM)</th>
                                                <th>Quantity</th>
                                                <th>Total (RM)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Grand Total: RM <?php echo $userFetch['grandTotal'] ?></th>
                                            </tr>
                                        </tfoot>
                                        <?php
                                            $orderQuery = "SELECT * FROM `client_order` WHERE orderID = '$userFetch[orderID]' ";
                                            $orderResult = mysqli_query($db, $orderQuery);
                                            while($orderFetch = mysqli_fetch_assoc($orderResult)){
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $orderFetch['food_name']; ?></td>
                                                        <td><?php echo $orderFetch['food_price']; ?></td>
                                                        <td><?php echo $orderFetch['quantity']; ?></td>
                                                        <td><?php echo $orderFetch['food_price'] * $orderFetch['quantity']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </td>
                                <td>
                                    <?php 
                                        //Ordered, On Delivery, Delivered, Cancelled
                                        $orderStatus = $userFetch['orderStatus'];
                                        if($orderStatus == "Ordered"){
                                            echo "<label class = 'text-primary'>$orderStatus</label>";
                                        }
                                        elseif($orderStatus == "On Delivery"){
                                            echo "<label class = 'text-warning'>$orderStatus</label>";
                                        }
                                        elseif($orderStatus == "Delivered"){
                                            echo "<label class = 'text-success'>$orderStatus</label>";
                                        }
                                        elseif($orderStatus == "Cancelled"){
                                            echo "<label class = 'text-red'>$orderStatus</label>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>    
                </tbody>
            </table>
        </div>
        <!-- Cart table Ends here -->
    </div>

<?php
    include "./includes/MenuFooter.php";
?>