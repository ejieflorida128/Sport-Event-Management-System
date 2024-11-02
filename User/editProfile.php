<?php
session_start(); 
include("../conn.php");
$activePage = 'profile'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $fullname = $_POST['fullname'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $address = $_POST['address'];

   
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $targetDir = "../profile_pictures/";
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath);
        
      
        $_SESSION['profile_picture'] = $targetFilePath;
    }


    $_SESSION['fullname'] = $fullname;
    $_SESSION['gmail'] = $gmail;
    $_SESSION['password'] = $password;
    $_SESSION['number'] = $number;
    $_SESSION['address'] = $address;
  

    $sql = "UPDATE accounts SET fullname=?, gmail=?, password=?, number=?, address=?, profile_picture=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $fullname, $gmail, $password, $number, $address, $_SESSION['profile_picture'], $_SESSION['id']);
    $stmt->execute();
    
    header("Location: profile.php");
    exit();
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

  
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
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
                      <iconify-icon icon="mdi:calendar-plus" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Scored Events</span>
              </a>
          </li>
          <li class="sidebar-item">
              <a class="sidebar-link <?php echo $activePage == 'score' ? 'active' : ''; ?>" href="score.php" aria-expanded="false">
              <span>
                        <iconify-icon icon="mdi:calendar" class="fs-6"></iconify-icon>
                    </span>
                    <span class="hide-menu">Scheduled Events</span>
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
            <h2 class="dashboard-title">PROFILE</h2>

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
            <div class="card-body">
                    <!-- start -->
                    <div class="container">
                    <H3 style = "color: grey; font-weight: bolder;"> Edit Profile</H3>
                    <form action="editProfile.php" method = "post" enctype="multipart/form-data">
                    <div class="main-body">                       
                            <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                     
                                        <img id="profileImagePreview" src="<?php echo $_SESSION['profile_picture']; ?>" alt="Admin"  style = "height: 150px; width: 150px; border-radius: 50%;">
                                        <div class="mt-3">
                                            <h4><?php echo $_SESSION['fullname']; ?></h4>
                                            <p class="text-secondary mb-1"><?php echo $_SESSION['gmail']; ?></p>
                                            
                                           
                                            <div style="margin-top: 20px;">
                                            <label class="btn btn-primary" for="profile_picture">
                                                <i class="fa fa-pencil-alt"></i>
                                            </label>
                                            <input type="file" name="profile_picture" id="profile_picture" hidden onchange="previewProfileImage(event)">
                                            <input type="submit" value="Submit Changes" class="btn btn-success">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <script>
                                    function previewProfileImage(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById('profileImagePreview').src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                        }
                                    }
                                    </script>

                            
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name = "fullname" value = "<?php echo $_SESSION['fullname'];  ?>" class = "form-control">
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gmail</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" name = "gmail" value = "<?php echo $_SESSION['gmail'];?>" class = "form-control">
                                   
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <input type="text" name = "password" value = "<?php echo $_SESSION['password'];?>" class = "form-control">
                                 
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php  
                                            if(empty($_SESSION['number'])) {
                                                echo '<input type="text" name="number" value="no information provided!" class="form-control">';
                                            } else {
                                              
                                                echo '<input type="text" name="number" value="' . $_SESSION['number'] . '" class="form-control">';
                                            }
                                            ?>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php  
                                        if(empty($_SESSION['address'])) {
                                            echo '<textarea name="address" class="form-control">no information provided!</textarea>';
                                        } else {
                                            
                                            echo '<textarea name="address" class="form-control">' . htmlspecialchars($_SESSION['address']) . '</textarea>';
                                        }
                                        ?>

                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    
                                    </div>
                                </div>
                                </div>

                            



                            </div>
                            </div>

                        </div>
                        </div>
                    </form>
            </div>
                    <!-- end -->
            </div>
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