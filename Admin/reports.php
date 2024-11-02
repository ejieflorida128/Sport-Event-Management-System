<?php
session_start(); 
include("../conn.php");
$activePage = 'report'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  if (isset($_POST['action'])) {
      
    if ($_POST['action'] === 'report') {

        $match_id = $_POST['match_id']; 


        $game_type = $_POST['game_type'];
          $edit_team1_name = $_POST['edit_team1_name'];
          $edit_team2_name = $_POST['edit_team2_name'];
          $edit_schedule = $_POST['edit_schedule'];

          $sqlUpdateInfo = "UPDATE event SET team1_name = '$edit_team1_name', team2_name = '$edit_team2_name', schedule = '$edit_schedule', game_type = '$game_type',status = 'game' WHERE id  = $match_id";
          mysqli_query($conn,$sqlUpdateInfo);

          $sqlDeleteFromReport = "DELETE FROM report WHERE event_report_id = $match_id";
          mysqli_query($conn,$sqlDeleteFromReport);

          header("Location: reports.php");



        
      }
  }
}




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
            <li class="nav-small-cap" style = "color: grey; font-size: 15px; font-weight: bolder;">
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
                <a class="sidebar-link <?php echo $activePage == 'event' ? 'active' : ''; ?>" href="event.php" aria-expanded="false">
                    <span>
                        <iconify-icon icon="mdi:calendar" class="fs-6"></iconify-icon>
                    </span>
                    <span class="hide-menu">My Events</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo $activePage == 'score' ? 'active' : ''; ?>" href="score.php" aria-expanded="false">
                        <span>
                            <iconify-icon icon="mdi:trophy" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Score Events</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo $activePage == 'report' ? 'active' : ''; ?>" href="reports.php" aria-expanded="false">
                        <span>
                            <iconify-icon icon="mdi:clipboard-text" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Reports</span>
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
            <h2 class="dashboard-title">SCORE EVENTS</h2>

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
                 
              
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                       <a href="profile.php" class="d-flex align-items-center gap-2 dropdown-item">
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
          <div class="card-body text-center">
                        <!-- start -->
                        <div class="row">
                                      <?php
                                          $uniqueId = $_SESSION['id'];
                                          $sqlSelectAllEventBasedOnAdmin = "SELECT * FROM event WHERE admin_id = $uniqueId AND status = 'report'";
                                          $querySelectAllEventBasedOnAdmin = mysqli_query($conn, $sqlSelectAllEventBasedOnAdmin);

                                          if (mysqli_num_rows($querySelectAllEventBasedOnAdmin) > 0) {
                                              while ($getResult = mysqli_fetch_assoc($querySelectAllEventBasedOnAdmin)) {
                                      ?>
                                                  <div class="col-lg-4" style="box-shadow: 0 2px 5px rgba(1, 1, 1, 1); padding: 10px; border-radius: 10px; margin: 10px; width: 280px;">
                                                      <div class="card overflow-hidden hover-img">
                                                          <div class="position-relative">
                                                              <a href="javascript:void(0)">
                                                                  <img src="<?php echo $getResult['venue_img']; ?>" class="card-img-top" alt="matdash-img" style="height: 200px; width: 300px;">
                                                              </a>
                                                              <span class="badge text-bg-light text-dark fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">
                                                                  <i class="ti ti-point text-dark"></i>
                                                                  <?php 
                                                                  $date = new DateTime($getResult['schedule']); 
                                                                  echo $date->format('D, M d'); 
                                                                  ?>
                                                              </span>
                                                              <img src="<?php
                                                                  $admin_unique_id = $getResult['admin_id'];
                                                                  $sqlGetPicture = "SELECT * FROM accounts WHERE id = $admin_unique_id";
                                                                  $queryGetPicture = mysqli_query($conn, $sqlGetPicture);
                                                                  $resultGetPicture = mysqli_fetch_assoc($queryGetPicture);
                                                                  echo $resultGetPicture['profile_picture'];
                                                              ?>" alt="matdash-img" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" title="Georgeanna Ramero">
                                                          </div>
                                                          <div class="card-body p-1">
                                                              <p style="color: grey; font-weight: bolder; font-size: 15px; margin-top: 10px;"><?php echo $getResult['game_type']; ?></p>
                                                              <p style="color: grey; font-weight: bolder; font-size: 13px; margin-top: -15px;"><?php echo $getResult['team1_name']; ?> <span style="color: orange; font-size: 16px;">VS</span> <?php echo $getResult['team2_name']; ?></p>
                                                              
                                                              <div class="d-flex align-items-center gap-2">
                                                                  <button type="button" class="btn btn-outline-danger" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#scoreModal-<?php echo $getResult['id']; ?>">
                                                                      Show Report
                                                                  </button>
                                                                  <button type="button" class="btn btn-outline-success" style="width: 90px;" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $getResult['id']; ?>">
                                                                      Edit
                                                                  </button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                 
                                                  <div class="modal fade" id="scoreModal-<?php echo $getResult['id']; ?>" tabindex="-1" aria-labelledby="scoreModalLabel" aria-hidden="true" style = "margin-top:10%;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="scoreModalLabel">Report Log</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="scoreForm-<?php echo $getResult['id']; ?>" action="score.php" method="post">
                                                                        <input type="hidden" name="match_id" value="<?php echo $getResult['id']; ?>">
                                                                        <H4>Message:</H4><br>
                                                                        <p style = "color: grey; font-weight: bolder;">
                                                                            <?php 
                                                                                $report_id = $getResult['id'];

                                                                                $sqlGetReport = "SELECT message FROM report WHERE event_report_id = $report_id";
                                                                                $resultQuery = mysqli_query($conn, $sqlGetReport);

                                                                                $fetchValue = mysqli_fetch_assoc($resultQuery); // Corrected here

                                                                                echo $fetchValue['message'];
                                                                            ?>
                                                                        </p>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                              
                                                  <div class="modal fade" id="editModal-<?php echo $getResult['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="editModalLabel">Edit Match Details</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <form id="editForm-<?php echo $getResult['id']; ?>" action="reports.php" method="post">
                                                                      <input type="hidden" name="match_id" value="<?php echo $getResult['id']; ?>">
                                                                      <div class="mb-3">
                                                                          <label for="game_type<?php echo $getResult['id']; ?>" class="form-label">Game Type </label>
                                                                          <input type="text" class="form-control" id="game_type<?php echo $getResult['id']; ?>" value="<?php echo $getResult['game_type']; ?>" name="game_type" required>
                                                                      </div>
                                                                      <div class="mb-3">
                                                                          <label for="edit_team1_name_<?php echo $getResult['id']; ?>" class="form-label">Team 1 Name</label>
                                                                          <input type="text" class="form-control" id="edit_team1_name_<?php echo $getResult['id']; ?>" value="<?php echo $getResult['team1_name']; ?>" name="edit_team1_name" required>
                                                                      </div>
                                                                      <div class="mb-3">
                                                                          <label for="edit_team2_name_<?php echo $getResult['id']; ?>" class="form-label">Team 2 Name</label>
                                                                          <input type="text" class="form-control" id="edit_team2_name_<?php echo $getResult['id']; ?>" value="<?php echo $getResult['team2_name']; ?>" name="edit_team2_name" required>
                                                                      </div>
                                                                      <div class="mb-3">
                                                                          <label for="edit_schedule_<?php echo $getResult['id']; ?>" class="form-label">Game Schedule</label>
                                                                          <input type="datetime-local" class="form-control" id="edit_schedule_<?php echo $getResult['id']; ?>" value="<?php echo date('Y-m-d\TH:i', strtotime($getResult['schedule'])); ?>" name="edit_schedule" required>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                          <button type="submit" class="btn btn-success" name="action" value="report">Save Changes</button>
                                                                      </div>
                                                                  </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                      <?php
                                              }
                                          } else {
                                      ?>
                                              <div class="col-12" style="background-color: #FF4545; color: white; padding: 20px; border-radius: 10px; text-align: center;">
                                              <div class="col-12" style="background-color: red; color: white; padding: 20px; border-radius: 10px; text-align: center;">
                                                  <h4 style="color: white;">There are no games or events to be scored.</h4>
                                                  <p>Please check back later or add a new game in " My Event " selection in the sidebar.</p>
                                              </div>

                                              </div>
                                      <?php
                                          }
                                      ?>
                                  </div>

                                  <style>
                                      .modal-content {
                                          text-align: left; 
                                      }

                                      .modal-header, .modal-body, .modal-footer {
                                          text-align: left; 
                                      }
                                  </style>

                                
                        <!-- end -->
            </div>
         </div>

        </div>
    </div>
  </div>

  <div id="preloader">
					  <div class="loader" id="loader-1"></div>
					</div>
					
			
					<script>
				
					  setTimeout(function() {
					    document.getElementById("preloader").style.display = "none";
					  }, 2000);
					</script>

          
          <style>
                  #preloader {
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #fff;
                        z-index: 9999999; }
                      
                      .loader {
                        top: 50%;
                        width: 50px;
                        height: 50px;
                        border-radius: 100%;
                        position: relative;
                        margin: 0 auto; }
                      
                      #loader-1:before, #loader-1:after {
                        content: "";
                        position: absolute;
                        top: -10px;
                        left: -10px;
                        width: 100%;
                        height: 100%;
                        border-radius: 100%;
                        border: 7px solid transparent;
                        border-top-color: #3c9cfd; }
                      
                      #loader-1:before {
                        z-index: 100;
                        animation: spin 2s infinite; }
                      
                      #loader-1:after {
                        border: 7px solid #fafafa; }
                      
                      @keyframes spin {
                        0% {
                          -webkit-transform: rotate(0deg);
                          -ms-transform: rotate(0deg);
                          -o-transform: rotate(0deg);
                          transform: rotate(0deg); }
                        100% {
                          -webkit-transform: rotate(360deg);
                          -ms-transform: rotate(360deg);
                          -o-transform: rotate(360deg);
                          transform: rotate(360deg); } }

          </style>
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