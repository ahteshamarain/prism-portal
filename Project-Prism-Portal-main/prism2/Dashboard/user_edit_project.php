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
                            <h4 class="mb-sm-0">User Porjetcs</h4>
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
                                         
                                            <th>Project Name</th>
                                            <th>Faculty</th>
                                            <th>BatchCode</th>
                                            <th>Semester</th>
                                            <th>Technology</th>
                                            <th>URL</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                              $fetch_project_join = "SELECT * from `project` as p inner join `project_category` as c on p.category = c.c_id where p.status = 1";
                              $fetch_project_result = mysqli_query($connection, $fetch_project_join);
                              if (mysqli_num_rows($fetch_project_result) > 0) {
                                 while ($row = mysqli_fetch_assoc($fetch_project_result)) {
                            ?>
                                        <tr>
                                            <td><?php echo $row['project_name'] ?></td>
                                            <td><?php echo $row['project_faculty'] ?></td>
                                            <td><?php echo $row['project_batchcode'] ?></td>
                                            <td><?php echo $row['project_semester'] ?></td>
                                            <td><?php echo $row['c_name'] ?></td>
                                            <td><?php echo $row['project_url'] ?></td>
                                            <td><img src="<?php echo '../User-dashboard/assets/images/project_img/'.$row['project_img'] ?>" height="50px" width="50px"></td>
                                            <td><?php echo $row['project_desc'] ?></td>
                                            <td>
                                            <a href="project-update.php?p-id=<?php echo $row["project_id"] ?>"
                                                    class="btn btn-outline-success btn-lg btn-rounded waves-effect waves-light"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="view-project.php?viewid=<?php echo $row['project_id'];?>"
                                                    class="btn btn-outline-danger btn-lg btn-rounded waves-effect waves-light"><i
                                                        class="fa-solid fa-eye"></i></a>
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