<?php

$PageTitle = "CFN - Dashboard";

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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <?php

                $base_url = "http://localhost/cfn/";


                /* Start Dashboard API */
                $json = file_get_contents($base_url . "dashboard.php");
                $data = array();
                $data = json_decode($json, true);
                $data["dashboard"][0]["total_user"];
                $total_distributed = $data["dashboard"][0]["total_distributed_done"] + $data["dashboard"][0]["total_distributed_pending"] + $data["dashboard"][0]["total_distributed_cancel"];
                $done2 = $total_distributed - $data['dashboard'][0]['total_distributed_done'];
                $pending2 = $total_distributed - $data['dashboard'][0]['total_distributed_pending'];
                $cancel2 = $total_distributed - $data['dashboard'][0]['total_distributed_cancel'];

                $done = 100 - ($done2 * 100) / $total_distributed;
                $pending = 100 - ($pending2 * 100) / $total_distributed;
                $cancel = 100 - ($cancel2 * 100) / $total_distributed;

                $total_distributed_done = $data['dashboard'][0]['total_distributed_done'];
                $total_distributed_pending = $data['dashboard'][0]['total_distributed_pending'];
                $total_distributed_cancel = $data['dashboard'][0]['total_distributed_cancel'];

                $total_family_food_needed = $data['dashboard'][0]['total_family_food_needed'];
                $total_family_food_have = $data['dashboard'][0]['total_family_food_have'];
                $total_poor_family = $data['dashboard'][0]['total_poor_family'];


                $welfare_data = json_decode(file_get_contents($base_url . "get_welfare_data.php"));
                foreach ($welfare_data->welfare_list as $getdata) {
                    '"' . $getdata->upazila . '",';

                }
                foreach ($welfare_data->welfare_list as $getdata) {
                    $getdata->no_of_poor_family . ",";
                }

                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                        Donors
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_user"]; ?></div>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Requested
                                        Relief
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_relief_request"]; ?></div>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
                                        Distribution Done
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_done"]; ?></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: <?php echo $done; ?>%" aria-valuenow="50"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total
                                        Distribution Pending
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_pending"]; ?></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     style="width: <?php echo $pending; ?>%" aria-valuenow="50"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Relief
                                        Distribution Cancel
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_distributed_cancel"]; ?></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                     style="width: <?php echo $cancel; ?>%" aria-valuenow="50"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending
                                        Feedback
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_feedback"]; ?></div>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Poor
                                        Family
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_poor_family"]; ?></div>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Food
                                        Needed(Family)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data["dashboard"][0]["total_family_food_needed"]; ?></div>
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
                      <i class="fas fa-circle text-info"></i> No. of Family Have Food : <?php echo $total_family_food_have; ?>
                    </span>
                                <span class="mr-5">
                      <i class="fas fa-circle text-danger"></i> No of Family Food Needed : <?php echo $total_family_food_needed; ?>
                    </span>
                                <span class="mr-5">
                      <i class="fas fa-circle text-primary"></i> Total No. of Poor Family : <?php echo $total_poor_family; ?>
                    </span>

                            </div>
                            <!--
                  <p> <a><?php echo $total_family_food_needed; ?></a> out of <?php echo $total_poor_family; ?> families don't have today's food</p>
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
                      <i class="fas fa-circle text-success"></i> Done : <span
                                class"text_bold"><?php echo $total_distributed_done; ?></span>
                                </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Pending : <?php echo $total_distributed_pending; ?>
                    </span>
                                <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Cancel : <?php echo $total_distributed_cancel; ?>
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


            <div class="row">

                <div class="col-xl-12 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Map View</h6>

                        </div>
                        <div class="card-body">
                            <div class="chart-area" id="map">

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


<script type="text/javascript">
    $(document).ready(function(){

        var promise1 = $.get("<?php echo $base_url; ?>get_welfare_data.php");
        var promise2 = $.post("<?php echo $base_url; ?>distribution_list.php", {
            "status" : "",
        });

        $.when(promise1, promise2).then(function(data1, data2) {
            let welfare = data1[0]['welfare_list'];
            let distribution = data2[0]['distribution_list'];
            console.log(distribution);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(23.777176, 90.399452),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            for (i = 0; i < welfare.length; i++) {

                let circle_color = '';
                if(welfare[i].upazila_wise_map_status == 1){
                    circle_color = "#ff0000";
                }else if(welfare[i].upazila_wise_map_status == 2){
                    circle_color = "#e5ff00";
                }else{
                    circle_color = "#32CD32";
                }
                // Create marker . . .
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(welfare[i].upazila_latitude, welfare[i].upazila_longitude),
                    title: welfare[i].upazila,
                    map: map
                });

                // Add circle overlay and bind to marker
                var circle = new google.maps.Circle({
                    map: map,
                    radius: Math.sqrt(welfare[i].no_of_poor_family) * 100,
                    fillColor: circle_color
                });
                circle.bindTo('center', marker, 'position');

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = "<b>" + welfare[i].upazila + "</b> <br/>Population: " + welfare[i].no_of_population + "<br/>Total Family: " + welfare[i].no_of_families + "<br/>Avg. Family Member: " + welfare[i].avg_no_of_each_family_member + "<br/>Avg. Monthly Earning: " + welfare[i].avg_family_wise_monthly_earning + "<br/>Survival Family: " + welfare[i].total_survival_family_till_today + "<br/>Total Poor Family: " + welfare[i].no_of_poor_family;
                        infowindow.setContent(html);
                        infowindow.open(map, marker, html);
                    }
                })(marker, i));
            }

            for (i = 0; i < distribution.length; i++) {

                // Create marker . . .
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(distribution[i].distribution_latitude, distribution[i].distributtion_longitude),
                    title: distribution[i].upazila_name,
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = "<b>" + distribution[i].upazila_name + "</b> <br/>User Name: " + distribution[i].user_name + "<br/>Family Member: " + distribution[i].no_of_family + "<br/>Relief Items: " + distribution[i].releife_items + "<br/>Survival Day: " + distribution[i].survival_day + "<br/>Date of Distribution: " + distribution[i].date_of_distribution;
                        infowindow.setContent(html);
                        infowindow.open(map, marker, html);
                    }
                })(marker, i));
            }


        }).catch(function (error) {

        });
    });
</script>
