<?php
    include "BlankPage.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Edit Food Categories -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Food Details</h6>
        </div>
        <div class="card-body">
            <?php
                if(isset($_POST['editFood'])){
                    $id = $_POST['food_id']; 
                    $query = "SELECT * FROM foodmenulist WHERE id = '$id' ";
                    $query_run = mysqli_query($db, $query);

                    foreach($query_run as $row){
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label>Food Name</label>
                                    <input type="text" name="foodName" value="<?php echo $row['foodName']; ?>" class="form-control" placeholder="Enter Food Name" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Food Description</label>
                                    <textarea name="foodDescription" class="form-control" rows="3" cols="10" placeholder="Enter Food Description..."><?php echo $row['foodDescription']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Food Price</label>
                                    <input type="text" name="foodPrice" value="<?php echo $row['foodPrice']; ?>" class="form-control" placeholder="Enter Food Price" required>
                                </div>
                                <div class="form-group">
                                    <label>Available:</label>
                                    <?php $foodAvailable = $row['foodAvailable']; ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="foodAvailable" value="Yes" <?php echo ($foodAvailable == 'Yes') ?  "checked" : "" ;  ?> class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="foodAvailable" value="No" <?php echo ($foodAvailable == 'No') ?  "checked" : "" ;  ?> class="custom-control-input" required>
                                        <label class="custom-control-label" for="customRadioInline2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Food Category</label>
                                    <?php
                                        $query = "SELECT * FROM foodcategorylist";
                                        $query_run = mysqli_query($db, $query);
                                    ?>
                                    <select class="form-control" name="foodCategory" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;" required>
                                        <option value="<?php echo $row['foodCategory']; ?>"><?php echo $row['foodCategory']; ?></option>
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
                                    <label>Food Image</label>
                                    <input class="form-control" type="file" name="foodImage" value="<?php echo $row['foodImage']; ?>">
                                </div>
                                
                                <a href="FoodMenuList.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary" name="saveFoodDetails">
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

<!-- Edit Food Menu List function -->
<?php
    if(isset($_POST['saveFoodDetails'])){
        $id = $_POST['food_id'];
        $foodName = $_POST['foodName'];
        $foodDescription = $_POST['foodDescription'];
        $foodCategory = $_POST['foodCategory'];
        $foodPrice = $_POST['foodPrice'];
        $foodAvailable = $_POST['foodAvailable'];
        $foodImage = $_FILES["foodImage"]['name'];

        $foodImg_query = "SELECT * FROM foodmenulist WHERE id = '$id' "; 
        $foodImg_query_run = mysqli_query($db, $foodImg_query);
        foreach($foodImg_query_run as $foodImg_row){
            //echo $foodImg_row['foodImage'];
            if($foodImage == NULL){
                //update with exists food image
                $foodImg_data = $foodImg_row['foodImage'];
            }
            else{
                //update with new food image and delete old image
                if($foodImg_path = "FoodImages/".$foodImg_row['foodImage']){
                    unlink($foodImg_path);
                    $foodImg_data = $foodImage;
                }
            }
        }

        $query = "UPDATE foodmenulist SET foodName = '$foodName', foodDescription = '$foodDescription', 
                foodCategory = '$foodCategory', foodPrice = '$foodPrice', foodAvailable = '$foodAvailable' ,foodImage = '$foodImg_data' WHERE id = '$id' ";
        $query_run = mysqli_query($db, $query);

        //pop up message if saved or not saved
        if($query_run){
            if($foodImage == NULL){
                //update with exists food image
                echo "<script>
                    alert('Food details Updated with existing image')
                    window.location.href = 'FoodMenuList.php'
                </script>";
            }
            else{
                //update with new food image and delete old image
                move_uploaded_file($_FILES["foodImage"]["tmp_name"], "FoodImages/".$_FILES["foodImage"]["name"]);
                echo "<script>
                    alert('Food details Updated')
                    window.location.href = 'FoodMenuList.php'
                </script>";
            }
        }
        else{
            echo "<script>
                    alert('Somethings wrongs during saving...')
                    window.location.href = 'FoodMenuList.php'
                </script>";
        }
    }
?>

<?php
    include "./includes/Scripts.php";
    /* include "./includes/Footer.php"; */
?>