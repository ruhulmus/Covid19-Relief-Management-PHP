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
                    <h6 class="m-0 font-weight-bold text-primary">Map View</h6>
                </div>
                <div class="card-body">
                     <div class="mt-4 text-center small marker-section detials-marker-section">
                      <span class="mr-2">
                        <img class="marker-img logo-icon" src="assets/img/marker-distribute.png" alt="">
                         <span class=" text-primary"> Distributed Area</span>
                        </span>
                      <span class="mr-2">
                        <img class="marker-img logo-icon" src="assets/img/marker-green.png" alt="">
                         <span class=" text-success"> Green Area : Food Have</span>
                        </span>
                        <span class="mr-2">
                          <img class="marker-img logo-icon" src="assets/img/marker-yallow.png" alt=""> 
                          <span class=" text-warning">Yallow Area : Food have for next few days</span>
                        </span>
                        <span class="mr-2">
                          <img class="marker-img logo-icon" src="assets/img/marker-red.png" alt=""> 
                          <span class=" text-danger">Red Area : Urgently Relief Needed </span>
                        </span>
                    </div>
                    <div class="chart-area" id="map">

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php
include_once('includes/footer.php');
include_once('includes/map_data.php');
?>