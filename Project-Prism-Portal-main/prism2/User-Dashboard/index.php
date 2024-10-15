
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
                            <h4 class="mb-sm-0">User Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="../index.php">Aptech Project Prism</a></li>
                                    <li class="breadcrumb-item active">User Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div id="radialchart-1" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <?php
                                    $user_id = $_SESSION['userid'];
                                    // Query to get the user count
                                    $query = "SELECT COUNT(*) AS cat_count FROM project_category";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $cat_count = $row['cat_count'];
                                    } else {
                                        $cat_count = 0; // Default to 0 if query fails
                                    }
                                    ?>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">All Categories</p>
                                        <h5 class="mb-3"><?php echo number_format($cat_count); ?></h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2"> 0.02% <i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div id="radialchart-2" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <?php
                                    // Query to get the user count
                                    $query = "SELECT COUNT(*) AS pro_count FROM `project` WHERE user_id = '$user_id'";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $pro_count = $row['pro_count'];
                                    } else {
                                        $pro_count = 0; // Default to 0 if query fails
                                    }
                                    ?>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">All Projects</p>
                                        <h5 class="mb-3"><?php echo number_format($pro_count); ?></h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2"> 1.7% <i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div id="radialchart-3" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <?php
                                    // Query to get the user count
                                    $query = "SELECT COUNT(*) AS com_count FROM `comment` WHERE user_id = '$user_id'";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $com_count = $row['com_count'];
                                    } else {
                                        $com_count = 0; // Default to 0 if query fails
                                    }
                                    ?>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">All Comments</p>
                                        <h5 class="mb-3"><?php echo number_format($com_count); ?></h5>
                                        <p class="text-truncate mb-0"><span class="text-danger me-2"> 0.01% <i
                                                    class="ri-arrow-right-down-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0  me-3 align-self-center">
                                        <div class="avatar-sm">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
    <i class="ri-heart-fill"></i>
</div>

                                        </div>
                                    </div>
                                    <?php
                                    // Query to get the user count
                                    $query = "SELECT COUNT(*) AS like_count FROM `like` where user_id = '$user_id'";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $like_count = $row['like_count'];
                                    } else {
                                        $like_count = 0; // Default to 0 if query fails
                                    }
                                    ?>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">All Likes</p>
                                        <h5 class="mb-3"><?php echo number_format($like_count); ?></h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2"> 0.01% <i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Order Stats</h5>
                                <div>
                                    <ul class="list-unstyled">
                                        <li class="py-3">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                        <i class="ri-checkbox-circle-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-2">Completed</p>
                                                    <div class="progress progress-sm animated-progess">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-2">Pending</p>
                                                    <div class="progress progress-sm animated-progess">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-3">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                        <i class="ri-close-circle-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-2">Cancel</p>
                                                    <div class="progress progress-sm animated-progess">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 19%" aria-valuenow="19" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <hr>

                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <p class="text-muted mb-2">Completed</p>
                                                <h5 class="font-size-16 mb-0">70</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <p class="text-muted mb-2">Pending</p>
                                                <h5 class="font-size-16 mb-0">45</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <p class="text-muted mb-2">Cancel</p>
                                                <h5 class="font-size-16 mb-0">19</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Comments</h4>
                                <div class="pe-3" data-simplebar style="max-height: 287px;">
                                    <a href="comments.php" class="text-body d-block">
                                        <?php
                                        include("config.php");

                                        $logged_in_user_id = $_SESSION['userid'];

                                        $query = "SELECT c.comment_id, c.comment_message, c.datetime, u.u_id, u.u_name, u.u_img 
                                        FROM comment c 
                                        INNER JOIN users u ON c.user_id = u.u_id 
                                        INNER JOIN project p ON c.projid = p.project_id 
                                        WHERE c.status = 1 
                                        AND p.user_id = $logged_in_user_id 
                                        ORDER BY c.datetime DESC";

                                        $result = mysqli_query($connection, $query);

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <?php if ($row['u_img']): ?>
                                                            <img class="rounded-circle avatar-xs"
                                                                alt="<?php echo htmlspecialchars($row['u_name']); ?>"
                                                                src="../User-dashboard/assets/images/user_img/<?php echo htmlspecialchars($row['u_img']); ?>">
                                                        <?php else: ?>
                                                            <div class="avatar-xs">
                                                                <span
                                                                    class="avatar-title bg-primary-subtle rounded-circle text-primary">
                                                                    <i class="mdi mdi-account-supervisor"></i>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-14 mb-1">
                                                            <?php echo htmlspecialchars($row['u_name']); ?>
                                                        </h5>
                                                        <p class="text-truncate mb-0">
                                                            <?php echo htmlspecialchars($row['comment_message']); ?>
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 font-size-13">
                                                        <?php echo date('H:i', strtotime($row['datetime'])); ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo '<p>No comments found.</p>';
                                        }
                                        ?>

                                    </a>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Revenue by Location</h5>

                                <div>
                                    <div id="usa" style="height: 226px"></div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary btn-sm">View More</a>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php
include('includes/footer.php');

?>