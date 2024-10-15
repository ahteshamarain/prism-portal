<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: form.php'); // Redirect non-admin users to the login page
    exit(); // Stop further execution after redirect
}

// Check if admin session is valid
if (empty($_SESSION['adminid'])) {
    header('location:logout.php'); // Redirect to logout if adminid is not set
    exit(); // Stop further execution after redirect
}
?>

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
                            <h4 class="mb-sm-0">Admin Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="../index.php">Aptech Project Prism</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
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
                                    $query = "SELECT COUNT(*) AS pro_count FROM `project`";
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
                                    $query = "SELECT COUNT(*) AS com_count FROM `comment`";
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
                                                <i class="ri-group-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    // Query to get the user count
                                    $query = "SELECT COUNT(*) AS user_count FROM `users`";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $user_count = $row['user_count'];
                                    } else {
                                        $user_count = 0; // Default to 0 if query fails
                                    }
                                    ?>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">All Users</p>
                                        <h5 class="mb-3"><?php echo number_format($user_count); ?></h5>
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">   
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title">View All Project Details</h5>
                                    </div>
                                    <!-- <div class="flex-shrink-0">
                                        <div>
                                            <button type="button" class="btn btn-subtle-secondary btn-sm">
                                                ALL
                                            </button>
                                        </div>
                                    </div> -->
                                </div>

                                <div>
                                    <div id="mixed-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <div class="pe-3" data-simplebar style="max-height: 287px;">

                            <!-- end card-body -->

                            <div class="container">
                                <div class="row">

                                    <?php
                                    // SQL query to fetch all projects
                                    $fetch_project_join = "SELECT * FROM `project`";
                                    $fetch_project_result = mysqli_query($connection, $fetch_project_join);

                                    // Check for query errors
                                    if (!$fetch_project_result) {
                                        die("Error executing query: " . mysqli_error($connection));
                                    }

                                    // Check if any projects are returned
                                    if (mysqli_num_rows($fetch_project_result) > 0) {
                                        while ($row = mysqli_fetch_assoc($fetch_project_result)) {
                                            $project_id = $row['project_id'];

                                            // Fetch like count for the current project
                                            $like_count_query = "SELECT COUNT(*) AS total_likes FROM `like` WHERE project_id = $project_id";
                                            $like_count_result = mysqli_query($connection, $like_count_query);

                                            // Check for query errors
                                            if (!$like_count_result) {
                                                die("Error executing like count query: " . mysqli_error($connection));
                                            }

                                            $like_count_row = mysqli_fetch_assoc($like_count_result);
                                            $total_likes = $like_count_row['total_likes'];

                                            // Fetch comment count for the current project
                                            $comment_count_query = "SELECT COUNT(*) AS total_comments FROM `comment` WHERE projid = $project_id";
                                            $comment_count_result = mysqli_query($connection, $comment_count_query);

                                            // Check for query errors
                                            if (!$comment_count_result) {
                                                die("Error executing comment count query: " . mysqli_error($connection));
                                            }

                                            $comment_count_row = mysqli_fetch_assoc($comment_count_result);
                                            $total_comments = $comment_count_row['total_comments'];
                                            ?>
                                            <!-- Card for the current project -->
                                            <div class="col-md-3 mb-4">
                                                <div class="card border-top card-hover">
                                                    <div class="card-body text-muted text-center">
                                                        <!-- Image section with title and description -->
                                                        <div class="mb-3">
                                                            <img src="<?php echo '../User-Dashboard/assets/images/project_img/' . $row['project_img'] ?>"
                                                                alt="Card Image" class="img-fluid rounded img-thumbnail">
                                                        </div>
                                                        <h6 class="card-title">
                                                            <?php echo htmlspecialchars($row['project_name']); ?>
                                                        </h6>
                                                        <!-- Like and Comment sections with counts -->
                                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                                            <div class="d-flex align-items-center">
                                                                <i class="mdi mdi-heart-outline me-2"></i>
                                                                <span class="me-2"
                                                                    id="like-count-<?php echo $project_id; ?>"><?php echo htmlspecialchars($total_likes); ?></span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <i class="mdi mdi-comment-outline me-2"></i>
                                                                <span class="me-2"
                                                                    id="comment-count-<?php echo $project_id; ?>"><?php echo htmlspecialchars($total_comments); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $(document).ready(function () {
                                                    // Function to update like counts
                                                    function updateLikeCounts(projectId) {
                                                        $.ajax({
                                                            url: 'get_like_count.php',
                                                            type: 'GET',
                                                            data: { project_id: projectId },
                                                            dataType: 'json',
                                                            success: function (response) {
                                                                $('#like-count-' + projectId).text(response.like_count);
                                                            },
                                                            error: function () {
                                                                $('#like-count-' + projectId).text('Error');
                                                            }
                                                        });
                                                    }

                                                    // Function to update comment counts
                                                    function updateCommentCounts(projectId) {
                                                        $.ajax({
                                                            url: 'get_comment_count.php',
                                                            type: 'GET',
                                                            data: { project_id: projectId },
                                                            dataType: 'json',
                                                            success: function (response) {
                                                                $('#comment-count-' + projectId).text(response.comment_count);
                                                            },
                                                            error: function () {
                                                                $('#comment-count-' + projectId).text('Error');
                                                            }
                                                        });
                                                    }

                                                    // Call the functions for each project
                                                    $('.card').each(function () {
                                                        var projectId = $(this).find('.card-title').attr('id').split('-').pop(); // Get project_id from element ID
                                                        updateLikeCounts(projectId);
                                                        updateCommentCounts(projectId);
                                                    });
                                                });
                                            </script>

                                            <?php
                                        }
                                    }
                                    ?>
                                    
                                </div>


                            </div>



                            <style>
                                /* Adjust image styling */
                                .img-thumbnail {
                                    max-width: 100%;
                                    height: auto;
                                    border: 1px solid #ddd;
                                    border-radius: .25rem;
                                }

                                /* Card title styling */
                                .card-title {
                                    font-size: 15px;
                                    font-weight: 500;
                                    margin-top: 1rem;
                                }

                                /* Card text styling */
                                .card-text {
                                    font-size: 1rem;
                                    margin-top: .5rem;
                                    margin-bottom: 1rem;
                                }

                                /* Adjust spacing for like/comment icons and text */
                                .d-flex i {
                                    font-size: 1.2rem;
                                }

                                .d-flex span {
                                    font-size: 0.9rem;
                                }

                                .d-flex .me-2 {
                                    margin-right: 0.5rem;
                                }

                                /* Card hover effect */
                                .card-hover {
                                    transition: transform 0.3s, box-shadow 0.3s;
                                }

                                .card-hover:hover {
                                    transform: scale(1.05);
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                                }

                                /* Optional: Add smooth hover effect on image */
                                .card-hover img {
                                    transition: transform 0.3s;
                                }

                                .card-hover:hover img {
                                    transform: scale(1.1);
                                }

                                /* Optional: Card title and text effects */
                                .card-title {
                                    font-weight: 600;
                                    transition: color 0.3s;
                                }

                                .card-hover:hover .card-title {
                                    color: #007bff;
                                    /* Change to your desired hover color */
                                }
                            </style>

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

                <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Comments</h4>
                                <div class="pe-3" data-simplebar style="max-height: 287px;">
                                    <a href="comments.php" class="text-body d-block">
                                        <?php

                                        // Query to get comments and user details
                                        $query = "SELECT c.comment_id, c.comment_message, c.datetime, u.u_id, u.u_name, u.u_img 
                                        FROM comment c 
                                        INNER JOIN users u ON c.user_id = u.u_id 
                                        WHERE c.status = 1 
                                        ORDER BY c.datetime DESC";
                              

                                        $result = mysqli_query($connection, $query);

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="d-flex py-3">
                                                    <div class="flex-shrink-0 me-3 align-self-center">
                                                        <?php if ($row['u_img']): ?>
                                                            <img class="rounded-circle avatar-xs"
                                                                alt="<?php echo($row['u_name']); ?>"
                                                                src="../User-dashboard/assets/images/user_img/<?php echo ($row['u_img']); ?>">
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
                                                            <?php echo($row['u_name']); ?>
                                                        </h5>
                                                        <p class="text-truncate mb-0">
                                                            <?php echo($row['comment_message']); ?>
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

               
                <!-- end col -->
            </div>
            <!-- end row -->

             <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Users Approval Requests</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheckall">
                                                        <label class="form-check-label" for="customCheckall"></label>
                                                    </div>
                                                </th>
                                                <th scope="col" style="width: 60px;"></th>
                                                <th scope="col">ID & Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/avatar-2.jpg" alt="user"
                                                        class="avatar-xs rounded-circle" />
                                                </td>
                                                <td>
                                                    <p class="mb-1 font-size-12">#AP1234</p>
                                                    <h5 class="font-size-15 mb-0">David Wiley</h5>
                                                </td>
                                                <td>02 Nov, 2019</td>
                                                <td>$ 1,234</td>
                                                <td>1</td>

                                                <td>
                                                    $ 1,234
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i>
                                                    Confirm
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle  text-success">
                                                            W
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-1 font-size-12">#AP1235</p>
                                                    <h5 class="font-size-15 mb-0">Walter Jones</h5>
                                                </td>
                                                <td>04 Nov, 2019</td>
                                                <td>$ 822</td>
                                                <td>2</td>

                                                <td>
                                                    $ 1,644
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i>
                                                    Confirm
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck3">
                                                        <label class="form-check-label" for="customCheck3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/avatar-3.jpg" alt="user"
                                                        class="avatar-xs rounded-circle" />
                                                </td>
                                                <td>
                                                    <p class="mb-1 font-size-12">#AP1236</p>
                                                    <h5 class="font-size-15 mb-0">Eric Ryder</h5>
                                                </td>
                                                <td>05 Nov, 2019</td>
                                                <td>$ 1,153</td>
                                                <td>1</td>

                                                <td>
                                                    $ 1,153
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i>
                                                    Cancel
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck4">
                                                        <label class="form-check-label" for="customCheck4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/avatar-6.jpg" alt="user"
                                                        class="avatar-xs rounded-circle" />
                                                </td>
                                                <td>
                                                    <p class="mb-1 font-size-12">#AP1237</p>
                                                    <h5 class="font-size-15 mb-0">Kenneth Jackson</h5>
                                                </td>
                                                <td>06 Nov, 2019</td>
                                                <td>$ 1,365</td>
                                                <td>1</td>

                                                <td>
                                                    $ 1,365
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle text-success me-1"></i>
                                                    Confirm
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck5">
                                                        <label class="form-check-label" for="customCheck5"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle  text-success">
                                                            R
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-1 font-size-12">#AP1238</p>
                                                    <h5 class="font-size-15 mb-0">Ronnie Spiller</h5>
                                                </td>
                                                <td>08 Nov, 2019</td>
                                                <td>$ 740</td>
                                                <td>2</td>

                                                <td>
                                                    $ 1,480
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i>
                                                    Pending
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-success btn-sm">Edit</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm">Cancel</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div> -->


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