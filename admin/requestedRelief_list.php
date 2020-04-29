<?php

$PageTitle="CFN - Requested Relief List";

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
              <h6 class="m-0 font-weight-bold text-primary">Requested Relief List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="requestedRelieflist" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>User Phone</th>
                      <th>User Email</th>
                      <th>User Address</th>
                      <th>Name</th>
                      <th>Upazilla Name</th>
                      <th>Address</th>
                      <th>Family member</th>
                      <th>Relief Item</th>
                      <th>Survival Day</th>
                      <th>Details</th>
                      <th>Status</th>
                      <th>NID</th>
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