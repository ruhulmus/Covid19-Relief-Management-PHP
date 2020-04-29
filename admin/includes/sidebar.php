<!-- Sidebar -->
<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$last_part = end($components);
?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
          <img class="rounded-circle logo-icon" src="assets/img/logo-icon.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Relief Manager</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($last_part=="dashboard.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link" href="dashboard.php" >
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($last_part=="map.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link" href="map.php" >
          <i class="fas famap-marked-alt fa-tachometer-alt"></i>
          <span>Map View</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($last_part=="add_welfare.php" || $last_part=="welfare-list.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Analytical Welfare Data</span>
        </a>
        <div id="collapseOne" class="collapse <?php if ($last_part=="add_welfare.php" || $last_part=="welfare-list.php") {echo "show"; } else  {echo "";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             
            <!--a class="collapse-item <?php if ($last_part=="add_welfare.php") {echo "active"; } else  {echo "";}?>" href="add_welfare.php">Add</a-->
            <a class="collapse-item <?php if ($last_part=="welfare-list.php") {echo "active"; } else  {echo "";}?>" href="welfare-list.php">List</a>
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($last_part=="distributedRelief_list.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Distributed Relief</span>
        </a>
        <div id="collapseTwo" class="collapse <?php if ($last_part=="distributedRelief_list.php") {echo "show"; } else  {echo "";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if ($last_part=="distributedRelief_list.php") {echo "active"; } else  {echo "";}?>" href="distributedRelief_list.php">List</a>
          </div>
        </div>
      </li>
      
        <!-- Divider -->
      <hr class="sidebar-divider my-0">
        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($last_part=="requestedRelief_list.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Requested Relief</span>
        </a>
        <div id="collapseThree" class="collapse <?php if ($last_part=="requestedRelief_list.php") {echo "show"; } else  {echo "";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if ($last_part=="requestedRelief_list.php") {echo "active"; } else  {echo "";}?>" href="requestedRelief_list.php">List</a>
          </div>
        </div>
      </li>
       
        <!-- Divider -->
      <hr class="sidebar-divider my-0">
         <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($last_part=="feedback_list.php") {echo "active"; } else  {echo "";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cog"></i>
          <span>Feedback/Complain</span>
        </a>
        <div id="collapseFour" class="collapse <?php if ($last_part=="feedback_list.php") {echo "show"; } else  {echo "";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if ($last_part=="feedback_list.php") {echo "active"; } else  {echo "";}?>" href="feedback_list.php">List</a>
          </div>
        </div>
      </li>

        
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

        <li class="nav-item <?php if ($last_part=="user_list.php") {echo "active"; } else  {echo "";}?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
            <div id="collapseFive" class="collapse <?php if ($last_part=="user_list.php") {echo "show"; } else  {echo "";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?php if ($last_part=="user_list.php") {echo "active"; } else  {echo "";}?>" href="user_list.php">List</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->