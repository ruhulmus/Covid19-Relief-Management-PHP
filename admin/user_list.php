<?php

$PageTitle = "CFN - User List";

function customPageHeader()
{
    ?>
<?php }

include_once('includes/header.php');
?>


    <!-- Main Content -->
    <div id="content">

        <?php include_once('includes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="userlist" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <?php
                                include("../config.php");
                                $sql = "SELECT * FROM users ORDER BY id DESC";
                                $result = mysqli_query($conn, $sql);

                                while($row = $result->fetch_assoc()){

                                    if ($row['type'] ==1 ){
                                            $user_type="individual";
                                        }
                                        else if ($row['type'] ==2 ) {
                                            $user_type="Private Welfare Organization";
                                        }
                                        else if ($row['type'] ==3 ) {
                                            $user_type="Govt Organization";
                                        }

                                    ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $user_type; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td>
                                            <?php
                                                if ($row['is_active'] == 1){
                                                    echo 'Active';
                                                }else{
                                                    echo 'Inactive';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php
include_once('includes/footer.php');
?>