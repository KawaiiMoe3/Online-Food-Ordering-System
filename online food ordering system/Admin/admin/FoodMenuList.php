<?php 
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Add Food Menu Modal-->
        <div class="modal fade" id="addFoodMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Food Details</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" name="foodName" class="form-control" placeholder="Enter Food Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Description</label>
                                        <textarea name="foodDescription" class="form-control" rows="3" cols="10" placeholder="Enter Food Description..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Category</label>
                                        <?php
                                            $query = "SELECT * FROM foodcategorylist";
                                            $query_run = mysqli_query($db, $query);
                                        ?>
                                        <select class="form-control" name="foodCategory" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;" required>
                                            <option value="noChoose">--Choose Food Category--</option>
                                            <?php
                                                if(mysqli_num_rows($query_run) > 0){
                                                    while($row = mysqli_fetch_assoc($query_run)){
                                                ?>  
                                                <option value="<?php echo $row['categoryName']; ?>">
                                                    <?php echo $row['categoryName']; ?>
                                                </option>
                                                <?php
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Price</label>
                                        <input type="text" name="foodPrice" class="form-control" placeholder="Set Food Price" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Available:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="foodAvailable" value="Yes" class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="foodAvailable" value="No" class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadioInline2">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Image</label>
                                        <input class="form-control" type="file" name="foodImage">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit" name="saveFoodMenu">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Food Menu</h1>
            </div>

            <!-- DataTales Food Menu -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Food Menu List &nbsp;
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addFoodMenuModal">
                            <i class="fas fa-plus"></i>    
                            Add New Food
                        </button>
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Select the table from database -->
                    <?php
                        $query = "SELECT * FROM foodmenulist";
                        $query_run = mysqli_query($db, $query);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Food Image</th>
                                    <th>Food Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Food Image</th>
                                    <th>Food Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <!-- Roll the data and show into the table -->
                                <?php
                                    if(mysqli_num_rows($query_run) > 0){
                                        while($row = mysqli_fetch_assoc($query_run)){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td>
                                                    <?php echo '<img src="FoodImages/'.$row['foodImage'].'" title="'.$row['foodName'].'" alt="'.$row['foodName'].'" width="125px" height="125px">' ?>
                                                </td>
                                                <td><?php echo $row['foodName']; ?></td>
                                                <td><?php echo $row['foodDescription']; ?></td>
                                                <td><?php echo $row['foodCategory']; ?></td>
                                                <td>RM <?php echo $row['foodPrice']; ?></td>
                                                <td><?php echo $row['foodAvailable']; ?></td>
                                                <td>
                                                    <form action="EditFoodMenu.php" method="POST">
                                                        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="editFood" class="btn btn-primary btn-sm">
                                                            <i class="far fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="deleteFood"
                                                        onclick="return confirm('Sure to delete <?php echo $row['foodName']; ?>?')"
                                                         class="btn btn-danger btn-sm">
                                                            <i class="far fa-trash-alt"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else{
                                        echo "<script>
                                            alert('No Records Found')
                                        </script>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-arrow-up"></i>
    </a>

</div>
<!-- End of Page Wrapper -->

<!-- Add New Food function -->
<?php
    if(isset($_POST['saveFoodMenu'])){
        $foodName = $_POST['foodName'];
        $foodDescription = $_POST['foodDescription'];
        $foodCategory = $_POST['foodCategory'];
        $foodPrice = $_POST['foodPrice'];
        $foodAvailable = $_POST['foodAvailable'];
        $foodImage = $_FILES["foodImage"]['name'];

        if(file_exists("FoodImages/" .$_FILES["foodImage"]["name"])){
            //Images already exists
            $store = $_FILES["foodImage"]["name"];
            echo "<script>
                    alert('Food image already exists!')
                    window.location.href = 'FoodMenuList.php';
                </script>"; 
        }
        else{
            //Save food image into database and 'FoodImages' file
            $query = "INSERT INTO `foodmenulist` VALUES ('', '$foodName', '$foodDescription', '$foodCategory', '$foodPrice', '$foodAvailable' ,'$foodImage')";
            $query_run = mysqli_query($db, $query);

            //pop up message if saved or not saved
            if($query_run){
                move_uploaded_file($_FILES["foodImage"]["tmp_name"], "FoodImages/".$_FILES["foodImage"]["name"]);
                echo "<script>
                        alert('A new food have been saved')
                        window.location.href = 'FoodMenuList.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Somethings wrongs during saving...')
                        window.location.href = 'FoodMenuList.php';
                    </script>";
            }
        }
        
    }
?>

<!-- Delete food menu function -->
<?php
    if(isset($_POST['deleteFood'])){
        $id = $_POST['food_id'];

        //declare for food image
        $foodImg_query = "SELECT * FROM foodmenulist WHERE id = '$id' "; 
        $foodImg_query_run = mysqli_query($db, $foodImg_query);
        foreach($foodImg_query_run as $foodImg_row){
            //delete food image which in folder
            if($foodImg_path = "FoodImages/".$foodImg_row['foodImage']){
                unlink($foodImg_path);
            }
        }
        
        //declare the query for delete
        $query = "DELETE FROM foodmenulist WHERE id = '$id' ";
        $query_run = mysqli_query($db, $query);

        if($query_run){
            echo "<script>
                alert('Food Deleted')
                window.location.href = 'FoodMenuList.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Delete Failure!')
                window.location.href = 'FoodMenuList.php';
            </script>";
        }
    }
?>

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>