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

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="col-12">
                                    <div
                                        class="page-title-box d-sm-flex align-items-center justify-content-center text-center my-2">
                                        <h4 class="mb-sm-0">User Profile</h4>
                                    </div>
                                </div>
                                <form class="custom-validation" action="insert-user.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card mb-4 shadow-lg">
                                                    <div class="card-body text-center position-relative">
                                                        <div class="position-relative d-inline-block">
                                                            <label for="upload-image">
                                                            <?php
                                                            if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                                                            $userImage = './assets/images/user_img/' . $_SESSION['user_image'];
                                                            } else {
                                                            // Set a default avatar if user image is not available
                                                            $userImage = './assets/images/user_img/default-avatar.png';
                                                            }
                                                            ?>
                                                                <img id="profile-image"
                                                                    src="<?php echo $userImage ?>"
                                                                    alt="avatar"
                                                                    class="rounded-circle img-fluid shadow-sm"
                                                                    style="width: 150px; cursor: pointer;">
                                                            </label>
                                                            <input type="file" id="upload-image" name="u_img"
                                                                class="d-none" accept="image/*">
                                                        </div>
                                                        <p class="text-muted mb-1 my-2">User</p>
                                                        <h5 class="my-1"><?php echo $_SESSION["user_name"] ?></h5><br>
                                                        <h6 class="my-1">Email : <b><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Email not available'; ?></b></h6>
                                                        <h6 class="my-1">Student ID : <b><?php echo isset($_SESSION['user_studentid']) ? $_SESSION['user_studentid'] : 'Student ID not available'; ?> </b></h6>
                                                        <h6 class="my-1">Phone Number : <b><?php echo isset($_SESSION['user_number']) ? $_SESSION['user_number'] : 'Number not available'; ?></b></h6>
                                                        <h6 class="my-1">Address : <b>  <?php echo isset($_SESSION['user_address']) ? $_SESSION['user_address'] : 'Number not available'; ?></b></h6>
                                                        <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->

                                                    </div>
                                                </div>

                                                <script>
                                                    document.getElementById('upload-image').addEventListener('change', function (event) {
                                                        const reader = new FileReader();
                                                        reader.onload = function () {
                                                            const output = document.getElementById('profile-image');
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(event.target.files[0]);
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card mb-4 shadow-lg">
                                                    <div class="card-body my-2">

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Full Name</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="hidden" class="form-control" name="u_id"
                                                                    value="<?php echo $_SESSION['userid'] ?>">
                                                                <input type="text" class="form-control" name="u_name"
                                                                    value="<?php echo $_SESSION['user_name'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Student ID</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    name="u_studentid"
                                                                    value="<?php echo $_SESSION['user_studentid'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Phone Number</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="phone" class="form-control"
                                                                    name="u_number"
                                                                    value="<?php echo $_SESSION['user_number'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Address</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="u_address"
                                                                    value="<?php echo $_SESSION['user_address'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Upload CV</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                            <?php
// Check if the user has an existing CV uploaded
if (!empty($_SESSION['u_cv'])) {
    $cv_path = './User-Dashboard/assets/images/user_img/' . $_SESSION['u_cv'];
    echo '<p>Current CV: <a href="' . $cv_path . '" target="_blank">Download CV</a></p>';
}
?>
<input type="file" accept=".pdf" class="form-control" id="u_cv" name="u_cv" required>

                                                            <!-- <input type="file" accept=".pdf" class="form-control" id="u_cv" name="u_cv" value="<?php echo $_SESSION['u_cv'] ?>" required> -->
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end mb-2 my-4">
                                                            <input type="submit" class="btn btn-outline-primary ms-1"
                                                                name="update" value="Update">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
<!-- end main content-->


<?php
include('includes/footer.php');
?>