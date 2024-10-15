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
include("config.php");
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

                            <h4 class="mb-sm-0">Company</h4>

                            <div class="d-flex justify-content-end">
                                <a href="add_company.php">
                                    <input type="button" class="btn btn-primary btn-rounded waves-effect waves-light"
                                        value="Add Company">
                                </a>
                            </div>

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
                                            <th>Comapny id</th>
                                            <th>Company Name</th>
                                            <th>Company Email</th>
                                            <th>Company Logo</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
									
                                    $fetch_cat_join = "SELECT * from `company`";
                                    $fetch_cat_result = mysqli_query($connection, $fetch_cat_join);
                                    if (mysqli_num_rows($fetch_cat_result) > 0) {
                                       while ($row = mysqli_fetch_assoc($fetch_cat_result)) {
									?>
                                        <tr>
                                            <td><?php echo $row['company_id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><img src="<?php echo 'assets/images/admin_img/'.  $row['com_img']?>" height="50px" width="50px"></td>
                                            <td>
                                                <a href="company_delete.php?c-id=<?php echo $row["company_id"] ?>"
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
include('includes/footer.php');

?>