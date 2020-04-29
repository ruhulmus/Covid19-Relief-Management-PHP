<?php

$PageTitle="CFN - Dashboard";

function customPageHeader(){?>
<?php }

include_once('includes/header.php');
 ?>
<!-- Main Content -->
      <div id="content">

        <?php include_once('includes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="map.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-map-marked-alt fa-sm text-white-50"></i> Map View</a>

           </div>

          <!-- Content Row -->
          <div class="row">
            <?php
              /* Start Dashboard API */
              $json = file_get_contents(get_base_url()."dashboard.php");
              $data=array();
              $data = json_decode($json, true);
              $data["dashboard"][0]["total_user"];
              $total_distributed= $data["dashboard"][0]["total_distributed_done"]+$data["dashboard"][0]["total_distributed_pending"]+$data["dashboard"][0]["total_distributed_cancel"];
              $done2 = $total_distributed - $data['dashboard'][0]['total_distributed_done'];
              $pending2 = $total_distributed - $data['dashboard'][0]['total_distributed_pending'];
              $cancel2 = $total_distributed - $data['dashboard'][0]['total_distributed_cancel'];

              $done = 100-($done2 *100) / $total_distributed;
              $pending = 100-($pending2 * 100)/ $total_distributed;
              $cancel = 100-($cancel2 * 100)/ $total_distributed;

              $total_distributed_done= $data['dashboard'][0]['total_distributed_done'];
              $total_distributed_pending= $data['dashboard'][0]['total_distributed_pending'];
              $total_distributed_cancel= $data['dashboard'][0]['total_distributed_cancel'];
              
              $total_family_food_needed = $data['dashboard'][0]['total_family_food_needed'];
              $total_family_food_have = $data['dashboard'][0]['total_family_food_have'];
              $total_poor_family = $data['dashboard'][0]['total_poor_family'];



                 
                $welfare_data = json_decode(file_get_contents(get_base_url()."get_welfare_data.php"));
                foreach($welfare_data->welfare_list as $getdata)
                {
                       '"'.$getdata->upazila.'",';

                } 
                foreach($welfare_data->welfare_list as $getdata)
                {
                     $getdata->no_of_poor_family.",";
                }       
                 
              ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Donors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_user"];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Requested Relief</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_relief_request"];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Distribution Done</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_done"];?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $done;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Distribution Pending</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_pending"];?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $pending;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-undo-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Relief Distribution Cancel</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_cancel"];?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $cancel;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Feedback</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_feedback"];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Poor Family</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_poor_family"];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-house-damage fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Food Needed(Family)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_family_food_needed"];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-cookie-bite fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Today's Food Status (Family wise)</h6>
                   
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart2"></canvas>
                  </div>
                  <div class="mt-4 text-left small">
                    <span class="mr-5">
                      <i class="fas fa-circle text-info"></i> No. of Family Have Food : <span class="txt-bold text-success"><?php echo $total_family_food_have;?></span>
                    </span>
                    <span class="mr-5">
                      <i class="fas fa-circle text-danger"></i> No of Family Food Needed : <span class="txt-bold text-danger"><?php echo $total_family_food_needed;?> </span>
                    </span>
                     <span class="mr-5">
                      <i class="fas fa-circle text-primary"></i> Total No. of Poor Family :  <span class="txt-bold text-primary"><?php echo $total_poor_family;?> </span>
                    </span>
                     
                  </div>
                  <!--
                  <p> <a><?php echo $total_family_food_needed;?></a> out of <?php echo $total_poor_family; ?> families don't have today's food</p>
                -->
                </div>

              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Reliefe Distribution Chart</h6>
                   
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Done : <span class="txt-bold text-success"><?php echo $total_distributed_done; ?></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Pending : <span class="txt-bold text-warning"><?php echo $total_distributed_pending; ?></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Cancel : <span class="txt-bold text-danger"><?php echo $total_distributed_cancel; ?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>


            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Area Wise Poor Peoples Overview</h6>
                  
                </div>
                 <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>


            <!-- Bar Chart -->
              <!--div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart1"></canvas>
                  </div>
                  <hr>
                  
                </div>
              </div-->


          <div class="row">

            <div class="col-xl-12 col-lg-6">
              <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Map View</h6>
                  
                </div>
                 <div class="card-body">
                  <div class="chart-area">
                    <canvas id="smyAreaChart"></canvas>
                  </div>
                </div>
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