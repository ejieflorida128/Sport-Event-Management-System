<?php
session_start(); 
include("../conn.php");
$activePage = 'profile'; 



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title>Sport Event Management System</title>
  <link rel="stylesheet" href="template/src/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    body{
            overflow: hidden;
    }
    .brand-logo {
    background-color: #fff;
    padding: 10px;
    }

    .logo-img i,
    .logo-img span {
        color: #808080;
        font-size: 30px;
        margin-left: 20px;
    }
  </style>
</head>

<body>
  
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    <aside class="left-sidebar">
    
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="dashboard.php" class="text-nowrap logo-img">
                <span>
                    <iconify-icon icon="mdi:soccer" class="fs-10" style = "position: relative; top: 10px;"></iconify-icon>
                </span>

                <span style="font-size: 24px; font-weight: bold; margin-left: -5px;">Sport EMS</span> <!-- Text -->
            </a>


          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
     
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link <?php echo $activePage == 'dashboard' ? 'active' : ''; ?>" href="dashboard.php" aria-expanded="false">
                    <span>
                        <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'profile' ? 'active' : ''; ?>" href="profile.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'buttons' ? 'active' : ''; ?>" href="./ui-buttons.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'alerts' ? 'active' : ''; ?>" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'dashboard' ? 'cards' : ''; ?>" href="./ui-card.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'forms' ? 'active' : ''; ?>" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>

          </ul>
       
        </nav>
       
      </div>
    
    </aside>
  
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <h2 class="dashboard-title">DASHBOARD</h2>

                <style>
                .dashboard-title {
                    font-weight: bolder;
                    color: grey;
                    letter-spacing: 2px;
                    font-size: 30px;
                    position: relative;
                    top: 10px;
                }

                @media (max-width: 600px) { 
                    .dashboard-title {
                    display: none;
                    }
                }
                </style>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?php 
                        echo $_SESSION['profile_picture'];
                  ?>" alt="" width="35" height="35" class="rounded-circle" style = "border: 1px solid black; padding: 2px;">
                    <span style = "margin-left: 10px; font-weight: bolder;">Admin</span>
              
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
              
                    <a href="../index.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
 
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                    <!-- start -->

                    <!-- end -->
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div>
  <script src="template/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="template/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="template/src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="template/src/assets/js/sidebarmenu.js"></script>
  <script src="template/src/assets/js/app.min.js"></script>
  <script src="template/src/assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>