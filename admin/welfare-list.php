<?php

$PageTitle="CFN - Welfare List";

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
              <h6 class="m-0 font-weight-bold text-primary">Welfare List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="welfarelist" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Upazilla Name</th>
                      <th>Number of population</th>
                      <th>Number of family</th>
                      <th>Average family member</th>
                      <th>Average monthly earning</th>
                      <th>Number of poor family</th>
                      <th>Total survival family</th>
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