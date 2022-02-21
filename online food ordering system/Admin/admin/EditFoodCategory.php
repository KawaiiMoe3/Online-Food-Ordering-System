<?php
    include "BlankPage.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Edit Food Categories -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Categories Details</h6>
        </div>
        <div class="card-body">
            <!-- Fetch the data from database and show it -->
            <?php
                if(isset($_POST['editCategory'])){
                    $id = $_POST['category_id'];
                    $query = "SELECT * FROM foodcategorylist WHERE id = '$id' ";
                    $query_run = mysqli_query($db, $query);

                    foreach($query_run as $row){
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="edit_categoryName" value="<?php echo $row['categoryName']; ?>" class="form-control" placeholder="Enter Category Name" required>
                            </div>
                            <div class="form-group">
                                <label>Available:</label>
                                <?php $categoryAvailable = $row['categoryAvailable']; ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="categoryAvailable" value="Yes" <?php echo ($categoryAvailable == 'Yes') ?  "checked" : "" ;  ?> class="custom-control-input" required>
                                    <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="categoryAvailable" value="No" <?php echo ($categoryAvailable == 'No') ?  "checked" : "" ;  ?> class="custom-control-input" required>
                                    <label class="custom-control-label" for="customRadioInline2">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Food Category Image</label>
                                <input class="form-control" type="file" name="foodCategoryImage" value="<?php echo $row['foodCategoryImage']; ?>">
                            </div>

                            <a href="FoodCategoryList.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="saveCategoryDetails">
                                <i class="far fa-save"></i>
                                Save
                            </button>
                        </form>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Edit food category function -->
<?php
    if(isset($_POST['saveCategoryDetails'])){
        $id = $_POST['category_id'];
        $categoryName = $_POST['edit_categoryName'];
        $categoryAvailable = $_POST['categoryAvailable'];
        $foodCategoryImage = $_FILES["foodCategoryImage"]['name'];

        $foodCategoryImg_query = "SELECT * FROM foodCategorylist WHERE id = '$id' "; 
        $foodCategoryImg_query_run = mysqli_query($db, $foodCategoryImg_query);
        foreach($foodCategoryImg_query_run as $foodCategoryImg_row){
            //echo $foodImg_row['foodImage'];
            if($foodCategoryImage == NULL){
                //update with exists food image
                $foodCategoryImg_data = $foodCategoryImg_row['foodCategoryImage'];
            }
            else{
                //update with new food image and delete old image
                if($foodCategoryImg_path = "FoodCategoryImages/".$foodCategoryImg_row['foodCategoryImage']){
                    unlink($foodCategoryImg_path);
                    $foodCategoryImg_data = $foodCategoryImage;
                }
            }
        }

        $query = "UPDATE foodcategorylist SET categoryName = '$categoryName', categoryAvailable = '$categoryAvailable' ,foodCategoryImage = '$foodCategoryImg_data' WHERE id = '$id' ";
        $query_run = mysqli_query($db, $query);

        if($query_run){
            if($foodCategoryImage == NULL){
                //update with exists food image
                echo "<script>
                    alert('Category details Updated with existing image')
                    window.location.href = 'FoodCategoryList.php'
                </script>";
            }
            else{
                //update with new food image and delete old image
                move_uploaded_file($_FILES["foodCategoryImage"]["tmp_name"], "FoodCategoryImages/".$_FILES["foodCategoryImage"]["name"]);
                echo "<script>
                    alert('Category details Updated')
                    window.location.href = 'FoodCategoryList.php'
                </script>";
            }
        }
        else{
            echo "<script>
                    alert('Category Updated Failure!')
                    window.location.href = 'FoodCategoryList.php'
                </script>";
            
        }
    }
?>

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>