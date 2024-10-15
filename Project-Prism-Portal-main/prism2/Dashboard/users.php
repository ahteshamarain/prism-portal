<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/sidebar.php');
include ('config.php');
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
                            <h4 class="mb-sm-0">Users</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!--         
                                        <h4 class="card-title">Buttons example</h4>
                                        <p class="card-title-desc">The Buttons extension for DataTables
                                            provides a common set of options, API methods and styling to display
                                            buttons on a page that will interact with a DataTable. The core library
                                            provides the based framework upon which plug-ins can built.
                                        </p> -->

                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Student ID</th>
                                            <th>User Number</th>
                                            <th>Student Address</th>
                                            <th>User Email</th>
                                            <th>User Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
									
                                    $fetch_user_join = "SELECT * from `users`";
                                    $fetch_user_result = mysqli_query($connection, $fetch_user_join);
                                    if (mysqli_num_rows($fetch_user_result) > 0) {
                                       while ($row = mysqli_fetch_assoc($fetch_user_result)) {
									?>
                                        <tr>
                                            <td><?php echo $row['u_name'] ?></td>
                                            <td><?php echo $row['u_studentid'] ?></td>
                                            <td><?php echo $row['u_number'] ?></td>
                                            <td><?php echo $row['u_address'] ?></td>
                                            <td><?php echo $row['u_email'] ?></td>
                                            <td><img src="<?php echo "../User-Dashboard/assets/images/user_img/" . $row['u_img'] ?>" height="50px" width="50px alt=""></td>
                                            <td>
                                            <a href="user-delete.php?u-id=<?php echo $row["u_id"] ?>"
                                                    class="btn btn-outline-danger btn-lg btn-rounded waves-effect waves-light"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
include ('includes/footer.php');

?>