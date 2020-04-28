<?php

$PageTitle="CFN - Distributed Relief List";

function customPageHeader(){?>
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
              <h6 class="m-0 font-weight-bold text-primary">Distributed Relief List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="distributionlist" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Upazilla Name</th>
                      <th>Total member</th>
                      <th>Relief Items</th>
                      <th>Survival Day</th>
                      <th>Status</th>
                      <th>Is Needed</th>
                      <th>Address</th>
                      <th>Distribution Date</th>
                      <th>Photo</th>
                    </tr>
                  </thead>
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