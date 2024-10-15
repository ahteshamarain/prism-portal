<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config.php');
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
                <form class="custom-validation" action="add_category.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <!-- <label class="form-label">Category Name</label> -->
                                        <input type="email" class="form-control" id="floatingInput"
                                            placeholder="To">
                                    </div>

                                    <div class="mb-3">
                                        <!-- <label class="form-label">Upload Image</label> -->
                                        <input type="name" class="form-control" id="floatingInput"
                                            placeholder="Supject">
                                    </div>

                                    <div class="mb-3">
                                        <!-- <label class="form-label">Description</label> -->
                                        <div>
                                            <textarea row="5" class="form-control" name="desc"
                                                placeholder="Leave a comment here" id="floatingTextarea"
                                                style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <input class="btn btn-primary w-100" type="submit" name="submit"
                                                value="Submit">
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