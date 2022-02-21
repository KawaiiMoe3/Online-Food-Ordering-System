<?php
    include "./connectionDB.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" type="text/css" href="./css/MenuStyle.css">
    <link rel="stylesheet" type="text/css" href="./css/Print.css" media="print">
    <link rel="stylesheet" href="./library/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
    <div class="container">
        <button onclick="window.print();" id="btn-print" class="btn-prim btn-lg">
            <i class="fas fa-print"></i>
            Print
        </button>
        <?php
            $clientUsername = $_SESSION['login_client'];
            $query = "SELECT * FROM `client_order_manager` WHERE clientUsername = '$clientUsername'";
            $userResult = mysqli_query($db, $query);
        ?>
        <h1 class="text-center">RECEIPT</h1>
        <p>
            <h3 class="text-crimson">FOODIE</h3>
            <h4>100 Jalan Foodie Taman Foodie 81000 Kulai Johor</h4>
            <h4>Biller: <?php echo $clientUsername; ?></h4>
            <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = date("Y-m-d H:i:s");
            ?>
            <h4>Date: <?php echo $date; ?></h4>
        </p>
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
</body>
</html>