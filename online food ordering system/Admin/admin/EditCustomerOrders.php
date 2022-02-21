<?php
    include "./BlankPage.php";
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Edit Food Categories -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Order Details</h6>
            </div>
            <div class="card-body">
                <?php
                    //Check whether orderID is set or not
                    if(isset($_GET['orderID'])){
                        //Get the order details
                        $orderID = $_GET['orderID'];
                        //Get all other details based on orderID
                        $sql = "SELECT * FROM `client_order_manager` WHERE orderID = $orderID";
                        $res = mysqli_query($db, $sql);
                        //Count rows
                        $count = mysqli_num_rows($res);

                        if($count == 1){
                            //Details available
                            $row = mysqli_fetch_assoc($res);

                            $clientUsername = $row['clientUsername'];
                            $clientEmail = $row['clientEmail'];
                            $clientPhone = $row['clientPhone'];
                            $deliveryAddress = $row['deliveryAddress'];
                            $orderStatus = $row['orderStatus'];
                            $grandTotal = $row['grandTotal'];
                        }
                        else{
                            //Details not available
                            //Redirect to CustomerOrders.php
                            echo "<script>
                                window.location.href = 'CustomerOrders.php'
                            </script>";
                            }
                    }
                    else{
                        //Redirect to CustomerOrders.php
                        echo "<script>
                            window.location.href = 'CustomerOrders.php'
                        </script>";
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="clientUsername" value="<?php echo $clientUsername; ?>" class="form-control" placeholder="Enter the username" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="clientEmail" value="<?php echo $clientEmail; ?>" class="form-control" placeholder="Enter the email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" name="clientPhone" value="<?php echo $clientPhone; ?>" class="form-control" placeholder="Enter the phone number" required>
                    </div>
                    <div class="form-group">
                        <label>Delivery Address</label>
                        <input type="text" name="deliveryAddress" value="<?php echo $deliveryAddress; ?>" class="form-control" placeholder="Enter the delivery address" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="orderStatus">
                            <option <?php if($orderStatus == "Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($orderStatus == "On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($orderStatus == "Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($orderStatus == "Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <a href="CustomerOrders.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="saveOrderDetails">
                        <i class="far fa-save"></i>
                        <input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
                        <input type="hidden" name="grandTotal" value="<?php echo $grandTotal; ?>">
                        Save
                    </button>
                </form>
                <?php
                    //Check whether Save btn clicked or not
                    if(isset($_POST['saveOrderDetails'])){
                        $orderID2 = $_POST['orderID'];
                        $clientUsername2 = $_POST['clientUsername'];
                        $clientEmail2 = $_POST['clientEmail'];
                        $clientPhone2 = $_POST['clientPhone'];
                        $deliveryAddress2 = $_POST['deliveryAddress'];
                        $orderStatus2 = $_POST['orderStatus'];

                        $sql2 = "UPDATE `client_order_manager` SET
                                clientUsername = '$clientUsername2',
                                clientEmail = '$clientEmail2',
                                clientPhone = '$clientPhone2',
                                deliveryAddress = '$deliveryAddress2',
                                orderStatus = '$orderStatus2'
                                WHERE orderID = '$orderID2'";
                        
                        $res2 = mysqli_query($db, $sql2);
                        //check save or not
                        if($res2 == true){
                            echo "<script>
                                alert('Order details Updated')
                                window.location.href = 'CustomerOrders.php'
                            </script>";
                        }
                        else{
                            echo "<script>
                                alert('Order details failure to Update')
                                window.location.href = 'CustomerOrders.php'
                            </script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>