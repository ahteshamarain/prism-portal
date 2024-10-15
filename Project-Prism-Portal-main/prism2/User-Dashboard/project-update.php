<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/sidebar.php');
include('config.php');

if (isset($_GET ['p-id'])){
    $p_id = $_GET ['p-id'] ;

    $fetch_cat = "SELECT * from `project` where `project_id` = '$p_id'" ;
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
                            <h4 class="mb-sm-0">Edit Projects</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form class="custom-validation" action="project-updatedata.php" method="POST"  enctype="multipart/form-data" >
                    <div class="row">
                    <?php
                        
                        while($row = mysqli_fetch_assoc($result)){
               
                        ?>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Project Name</label>
                                        <input type="hidden" name="p_id" class="form-control"
                                 id="floatingInput" placeholder="" value="<?php echo $row["project_id"] ?>" required>
                                 <input type="text" name="p_name" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["project_name"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Faculty</label>
                                 <input type="text" name="p_faculty" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["project_faculty"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">BatchCode</label>
                                 <input type="text" name="p_batchcode" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["project_batchcode"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                 <input type="text" name="p_semester" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["project_semester"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                            <?php
                                            $query = "SELECT * FROM `project_category`";

                                            $res = mysqli_query($connection, $query);

                                            if (mysqli_num_rows($res) > 0) {
                                                ?>
                                                <label class="form-label">Technology</label>
                                                <div class="col-md-12">
                                                    <select name="category" class="form-select"
                                                        value="<?php echo $row["category"] ?>">
                                                        <!-- <option selected="">Select Category</option> -->
                                                        <?php
                                                        $fetch_cat = "SELECT * FROM project_category";
                                                        $cat_result = mysqli_query($connection, $fetch_cat);
                                                        if (mysqli_num_rows($cat_result) > 0) {
                                                            while ($data = mysqli_fetch_assoc($cat_result)) {
                                                                echo '<option value="' . $data['category'] . '">' . $data['c_name'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                            }
                                            ?>
                                            </div>
                                        </div>

                                    <div class="mb-3">
                                        <label class="form-label">URL</label>
                                 <input type="url" name="p_url" class="form-control" 
                                id="floatingInput" placeholder="" value="<?php echo $row["project_url"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control form-control-lg" name="p_image" type="file"
                                     id="formFile" value="<?php echo $row["project_img"] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div>
                                        <textarea class="form-control" name="p_desc" placeholder="Leave a comment here"
                                 id="floatingTextarea" style="height: 150px;" value="" required><?php echo $row["project_desc"] ?></textarea>
                                    </div>

                                    <div>
                                        <div>
                                        <input class="btn btn-primary w-100" type="submit" name="update" value="update">
                                        <?php
                                   }
                                 }
                              }
                           }
                        ?>
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