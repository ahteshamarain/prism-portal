<?php
// Include necessary files
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
                            <h4 class="mb-sm-0">Comments</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Project URL</th>
                                            <th>Project Image</th>
                                            <th>Comment</th>
                                            <th>Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Updated query to join comment and project tables
                                    $fetch_user_join = "SELECT 
                                                            c.comment_id, 
                                                            p.project_name, 
                                                            p.project_url, 
                                                            p.project_img, 
                                                            c.comment_message, 
                                                            c.datetime 
                                                        FROM comment c
                                                        JOIN project p ON c.projid = p.project_id";
                                    $fetch_user_result = mysqli_query($connection, $fetch_user_join);

                                    // Check if the query executed successfully
                                    if (!$fetch_user_result) {
                                        echo "Error executing query: " . mysqli_error($connection);
                                    } elseif (mysqli_num_rows($fetch_user_result) > 0) {
                                        while ($row = mysqli_fetch_assoc($fetch_user_result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['project_url']); ?></td>
                                            <td><img src="<?php echo "../User-Dashboard/assets/images/project_img/" . htmlspecialchars($row['project_img']); ?>" height="50px" width="50px"></td>
                                            <td><?php echo htmlspecialchars($row['comment_message']); ?></td>
                                            <td><?php echo htmlspecialchars($row['datetime']); ?></td>
                                            <td>
                                                <a href="comment-delete.php?c-id=<?php echo htmlspecialchars($row['comment_id']); ?>"
                                                    class="btn btn-outline-danger btn-lg btn-rounded waves-effect waves-light">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No comments found</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php
include('includes/footer.php');
?>