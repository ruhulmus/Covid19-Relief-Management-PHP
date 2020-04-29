<?php

$PageTitle="CFN - Feedback List";

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
              <h6 class="m-0 font-weight-bold text-primary">Feedback List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="feedbacklist" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                       <th>Phone</th>
                      <th>Email</th>
                      <th>address</th>
                      <th>Feedback</th>
                      <th>Upazilla Name</th>

                      <th>Status</th>
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