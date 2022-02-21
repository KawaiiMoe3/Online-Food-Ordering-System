<?php 
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Customer Orders</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Delivery Address</th>
                                    <th>Payment Method</th>
                                    <th>Orders</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Delivery Address</th>
                                    <th>Payment Method</th>
                                    <th>Orders</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `client_order_manager`";
                                    $userResult = mysqli_query($db, $query);
                                    while($userFetch = mysqli_fetch_assoc($userResult)){
                                        ?>
                                        <tr>
                                            <td><?php echo $userFetch['orderID']; ?></td>
                                            <td><?php echo $userFetch['orderDate']; ?></td>
                                            <td><?php echo $userFetch['clientUsername']; ?></td>
                                            <td><?php echo $userFetch['clientEmail']; ?></td>
                                            <td><?php echo $userFetch['clientPhone']; ?></td>
                                            <td><?php echo $userFetch['deliveryAddress']; ?></td>
                                            <td><?php echo $userFetch['payMode']; ?></td>
                                            <td>
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                        echo "<label class = 'text-danger'>$orderStatus</label>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="EditCustomerOrders.php?orderID=<?php echo $userFetch['orderID']; ?>" class="btn btn-primary btn-sm">
                                                    <i class="far fa-edit"></i>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-arrow-up"></i>
        </a>

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Page Wrapper -->

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>