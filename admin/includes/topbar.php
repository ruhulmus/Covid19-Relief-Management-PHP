<!-- Topbar -->
        <?php
            include('global_config.php');
 
            $json = file_get_contents(get_base_url()."dashboard.php");
            $data=array();
            $data = json_decode($json, true);
            $total_feedback = $data["dashboard"][0]["total_feedback"];
            
             $total_family_food_needed = $data['dashboard'][0]['total_family_food_needed'];
            $total_family_food_have = $data['dashboard'][0]['total_family_food_have'];
            $total_poor_family = $data['dashboard'][0]['total_poor_family'];

                  
              $feedback_data = get_post_data(get_base_url().'feedback_list.php',array('type' => '1')); 
               
          
          ?>

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <?php
              

            ?>
            <p class="stick_notification" style="font-size:18px;"><span><?php echo $total_family_food_needed;?></span> out of <span><?php echo $total_poor_family; ?></span> families don't have today's food !!</p>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

             
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $total_feedback; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Users Feedback
                </h6>

                 <?php
                     foreach($feedback_data->feedback_list as $getdata)
                      {
                        ?>
                           <a class="dropdown-item d-flex align-items-center" href="#">  
                         
                           <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="assets/img/user-avatar_new.jpg" alt="">
                            <div class="status-indicator bg-success"></div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-truncate"><?php echo $getdata->feedback_substring;?></div>
                            <div class="small text-gray-500"><?php echo $getdata->user_name;?> <?php echo $getdata->created_at;?></div>
                          </div>
                          </a>
                        <?php
                      }

                  ?>
                
               
                <a class="dropdown-item text-center small text-gray-500" href="<?php echo get_base_url()."admin/feedback_list.php" ?>">Read More Feedback</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php
                  echo $_SESSION['name'];
                ?>
                </span>
                <img class="img-profile rounded-circle" src="assets/img/admin-avatar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->