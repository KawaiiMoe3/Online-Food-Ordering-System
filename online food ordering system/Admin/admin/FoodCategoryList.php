<?php 
    include "BlankPage.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Add Food Categories Modal-->
            <div class="modal fade" id="addFoodCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Food Categories</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Available:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="categoryAvailable" value="Yes" class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="categoryAvailable" value="No" class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadioInline2">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Food Category Image</label>
                                        <input class="form-control" type="file" name="foodCategoryImage">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" name="saveFoodCategories">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Food Category List</h1>
            </div>

            <!-- DataTales Food Categories -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Food Categories List &nbsp;
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addFoodCategoriesModal">
                        <i class="fas fa-plus"></i>
                        Add Food Categories
                    </button>
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Select the table from database -->
                    <?php
                        $query = "SELECT * FROM foodcategorylist";
                        $query_run = mysqli_query($db, $query);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <!-- Head row -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories Image</th>
                                    <th>Categories</th>
                                    <th>Available</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <!-- Foot row -->
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories Image</th>
                                    <th>Categories</th>
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
                                                <td><?php echo '<img src="FoodCategoryImages/'.$row['foodCategoryImage'].'" title="'.$row['categoryName'].'" alt="'.$row['categoryName'].'" width="125px" height="125px">' ?></td>
                                                <td><?php echo $row['categoryName']; ?></td>
                                                <td><?php echo $row['categoryAvailable'] ?></td>
                                                <td>
                                                    <form action="EditFoodCategory.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="editCategory" class="btn btn-primary btn-sm">
                                                            <i class="far fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="deleteCategory" 
                                                        onclick="return confirm('Sure to delete <?php echo $row['categoryName']; ?>?')" 
                                                        class="btn btn-danger btn-sm"
                                                        >
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

<!-- Food categories Saved function -->
<?php
    if(isset($_POST['saveFoodCategories'])){
        $categoryName = $_POST['categoryName'];
        $categoryAvailable = $_POST['categoryAvailable'];
        $foodCategoryImage = $_FILES["foodCategoryImage"]['name'];

        if(file_exists("FoodCategoryImages/".$_FILES["foodCategoryImage"]["name"])){
            //Images already exists
            $store = $_FILES["foodCategoryImage"]["name"];
            echo "<script>
                    alert('Food category image already exists!')
                </script>"; 
        }
        else{
            $query = "INSERT INTO `foodcategorylist` VALUES ('', '$categoryName', '$categoryAvailable' ,'$foodCategoryImage')";
            $query_run = mysqli_query($db, $query);
    
            //pop up message if saved or not saved
            if($query_run){
                move_uploaded_file($_FILES["foodCategoryImage"]["tmp_name"], "FoodCategoryImages/".$_FILES["foodCategoryImage"]["name"]);
                echo "<script>
                        alert('Category Saved')
                        window.location.href = 'FoodCategoryList.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Somethings wrongs during saving...')
                        window.location.href = 'FoodCategoryList.php';
                    </script>";
            }
        }  
    }
?>

<!-- Food categories Delete function -->
<?php
    if(isset($_POST['deleteCategory'])){
        $id = $_POST['category_id'];

        //declare for food image
        $foodCategoryImg_query = "SELECT * FROM foodcategorylist WHERE id = '$id' "; 
        $foodCategoryImg_query_run = mysqli_query($db, $foodCategoryImg_query);
        foreach($foodCategoryImg_query_run as $foodCategoryImg_row){
            //delete food image which in folder
            if($foodCategoryImg_path = "FoodCategoryImages/".$foodCategoryImg_row['foodCategoryImage']){
                unlink($foodCategoryImg_path);
            }
        }

        $query = "DELETE FROM foodcategorylist WHERE id = '$id' ";
        $query_run = mysqli_query($db,$query);

        //pop up message if deleted or not
        if($query_run){
            echo "<script>
                alert('Category Deleted')
                window.location.href = 'FoodCategoryList.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Delete Failure!')
                window.location.href = 'FoodCategoryList.php';
            </script>";
            
        }
    }
?>

<!-- Footer & Script -->
<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>