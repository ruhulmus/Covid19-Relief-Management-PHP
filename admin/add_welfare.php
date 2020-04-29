<?php

$PageTitle="CFN - Add Welfare";

function customPageHeader(){?>
<?php }

include_once('includes/header.php');
?>

<style type="text/css">
    form.user .form-control-user {
        font-size: .8rem;
        border-radius: 10rem;
        padding: 15px 20px;
        min-height: 50px;
    }
    .success{
        color: green;
    }
    .errror{
        color: red;
    }
</style>

<!-- Main Content -->
      <div id="content">

        <?php include_once('includes/topbar.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Welfare</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="p-5">
              <div class="text-center">
                

                <?php 

                    include("../config.php");
                    date_default_timezone_set('Asia/Dhaka');
                    $date = date('Y-m-d H:i:s');
                    $message = "";
                    $error = "";

                    $sql_welfare = "SELECT * FROM upazilas ORDER BY id ASC";
                    $result = mysqli_query($conn,$sql_welfare);

                    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                        
                        if(isset($_POST['SubmitButton'])){ 
                            $a = $_POST['11']; 
                            $b = $_POST['12']; 
                            $c = $_POST['13']; 
                            $d = $_POST['14']; 
                            $e = $_POST['15']; 
                            $f = $_POST['16']; 
                            $g = $_POST['17']; 
                            $h = 0; 

                            $sql = "INSERT INTO welfare_data (welfare_org_id, upazila_id, no_of_population, no_of_families, avg_no_of_each_family_member, avg_family_wise_monthly_earning, no_of_poor_people, is_poor) VALUES ('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."')";

                            if (mysqli_query($conn, $sql)) {
                                $message = "Welfare data added successfully.";
                                ?>
                                    <p class="success"><?php echo $message; ?></p>
                                    <script>
                                        if ( window.history.replaceState ) {
                                            window.history.replaceState( null, null, window.location.href );
                                        }
                                    </script>
                                <?php
                            } else {
                                $error = "Error!";
                                ?>
                                    <p class="errror"><?php echo $error; ?></p>
                                <?php
                            }

                            $conn->close();
                        }  
                    }else{
                        $_SESSION['uniq'] = uniqid();
                    }

                ?>


                <h1 class="h4 text-gray-900 mb-4">Add Welfare</h1>
              </div>
              <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="11" placeholder="Welfare Organization" required>
                  </div>
                  <div class="col-sm-6">
                  <select class="form-control form-control-user" name="12" required>
                      <option value="" selected="true">--- Select Upazilla --- </option>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                
                                while($row_welfare = $result->fetch_assoc()) {
                                    echo '<option value='. $row_welfare['id'] .'>'. $row_welfare['name'] .'</option>';
                                }
                            }
                        ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="13" placeholder="Number of Polulation" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="14" placeholder="Number of Family" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="15" placeholder="Average family member" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="16" placeholder="Average monthly earning" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="17" placeholder="Number of poor people" required>
                  </div>
                  
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" name="SubmitButton" value="Register Welfare">
                   
              </form>
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