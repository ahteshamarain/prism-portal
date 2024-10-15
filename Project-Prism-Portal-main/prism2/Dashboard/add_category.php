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

if(isset($_POST['submit'])){
    $cat_name = $_POST['cat_name'];
    $cat_desc= $_POST['desc'];
    $img = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name']; 

    if(!empty($cat_name) AND !empty($cat_desc) 
    AND !empty($img)){

    $insert_cat = "INSERT INTO `project_category` (`c_id`, `c_name`, `c_img`, `c_desc`, `status`) 
VALUES (NULL, '$cat_name', '$img', '$cat_desc', 1)";

    $connect = mysqli_query($connection, $insert_cat);

    move_uploaded_file($tmp_img, './assets/images/category_img/' . $img);

    if($connect){
        echo '<script>
        alert("Category add successfully")
        window.location.href="category.php"
        </script>';
    }

}
}

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
                <form class="custom-validation" action="add_category.php" method="POST"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="name" name="cat_name" class="form-control" id="floatingInput" 
                                        placeholder="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <input class="form-control form-control-lg" name="image" type="file"
                                        id="formFile">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div>
                                        <textarea row="5" class="form-control" name="desc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                        <input class="btn btn-primary w-100" type="submit" name="submit" value="Submit">
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
include('includes/footer.php');
?>