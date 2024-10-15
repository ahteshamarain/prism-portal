<?php 
// session_start();
// if (!isset($_SESSION['email'])) {
//     header('location: login.php');
// }
?>
<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/sidebar.php');
include('config.php');

if (isset($_GET ['c-id'])){
    $category_id = $_GET ['c-id'] ;

    $fetch_cat = "SELECT * from `project_category` where `c_id` = '$category_id'" ;
    $result = mysqli_query($connection, $fetch_cat) ;
    if($result){
       if(mysqli_num_rows($result)> 0){

?>

<!-- Begin page -->
<div id="layout-wrapper">




    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add Category</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form class="custom-validation" action="cat_update.php" method="POST"  enctype="multipart/form-data" >
                    <div class="row">
                    <?php
                        
                        while($row = mysqli_fetch_assoc($result)){
               
                        ?>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="hidden" name="cat_id" class="form-control"
                                 id="floatingInput" placeholder="" value="<?php echo $row["c_id"] ?>" required>
                                 <input type="name" name="cat_name" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["c_name"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <input class="form-control form-control-lg" name="image" type="file"
                                     id="formFile" value="<?php echo $row["c_img"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div>
                                        <textarea class="form-control" name="desc" placeholder="Leave a comment here"
                                 id="floatingTextarea" style="height: 150px;" value="" required><?php echo $row["c_desc"] ?></textarea>
                                    </div>
                                    <div>
                                        <div>
                                        <input class="btn btn-primary w-100" type="submit" name="update" value="Update"  >
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->

            </div> <!-- end row -->
            </form>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
<!-- end main content-->

<?php
                                   }
                                 }
                              }
                           }

                           if(isset($_POST['update'])){
                            $cat_id = $_POST['cat_id'];
                            $cat_name = $_POST['cat_name'];
                            $cat_desc= $_POST['desc'];
                            $img = $_FILES['image']['name'];
                            $tmp_img = $_FILES['image']['tmp_name']; 
                        
                            $insert_cat = "UPDATE `project_category` SET
                            `c_name`='$cat_name',`c_img`='$img',`c_desc`=' $cat_desc' WHERE  `c_id`='$cat_id'";
                        
                            $connect = mysqli_query($connection, $insert_cat);
                        
                            move_uploaded_file($tmp_img, 'assets/images/category_img/' . $img);
                        
                            if($connect){
                                echo '<script>
                                alert("Category Updated successfully")
                                window.location.href="category.php"
                                </script>';
                            }
                        
                        }
                        ?>

<?php 
include('includes/footer.php');
?>