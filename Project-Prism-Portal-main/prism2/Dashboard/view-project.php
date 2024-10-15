<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/sidebar.php');
include("config.php");

$cid=$_GET['viewid'];

if(isset($_POST['submit']))
{
    $Status=$_POST['Sta'];
    
    $query = mysqli_query($connection, "UPDATE project SET Statuss='$Status' WHERE project_id='$cid'");
    
    if ($query) {
        echo '<script>alert("All remarks have been updated")</script>';
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}
?>

<!-- Begin page -->
<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">User Projects</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form name="submit" method="post" enctype="multipart/form-data">
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Faculty</th>
                                                <th>BatchCode</th>
                                                <th>Semester</th>
                                                <th>Technology</th>
                                                <th>Status</th>
                                                <th>Change Status:</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $fetch_project_join = "SELECT * FROM `project` as p INNER JOIN `project_category` as c ON p.category = c.c_id WHERE project_id='$cid'";
                                            $fetch_project_result = mysqli_query($connection, $fetch_project_join);
                                            if (mysqli_num_rows($fetch_project_result) > 0) {
                                                while ($row = mysqli_fetch_assoc($fetch_project_result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['project_name']; ?></td>
                                                <td><?php echo $row['project_faculty']; ?></td>
                                                <td><?php echo $row['project_batchcode']; ?></td>
                                                <td><?php echo $row['project_semester']; ?></td>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php  
                                                    if ($row['Statuss'] == 1) {
                                                        echo "Accepted";
                                                    } elseif ($row['Statuss'] == 2) {
                                                        echo "Rejected";
                                                    }
                                                ?></td>
                                                <td>
                                                    <select name="Sta" class="form-control wd-450" required="true">
                                                        <option value="1" <?php if ($row['Sta'] === 1) echo "selected"; ?>>Selected</option>
                                                        <option value="2" <?php if ($row['Sta'] === 2) echo "selected"; ?>>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('includes/footer.php');
?>
