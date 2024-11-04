<?php
  session_start(); 
  include("conn.php");

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $incorrectPassword = false;
    $accountNotFound = false;

    
    $type = $_POST['role'];

    if($type == "User"){

        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        $checkIfExist = "SELECT * FROM accounts WHERE type = 'User'";
                        $queryIfExist = mysqli_query($conn,$checkIfExist);

                        $accoutCheck = 0;
                
                        while($getData = mysqli_fetch_assoc($queryIfExist)){
                                if($gmail == $getData['gmail']){
                                        if($password == $getData['password']){
                                                $_SESSION['id'] = $getData['id'];
                                                $_SESSION['fullname'] = $getData['fullname'];
                                                $_SESSION['gmail'] = $getData['gmail'];
                                                $_SESSION['type'] = $getData['type'];
                                                $_SESSION['password'] = $getData['password'];
                                                $_SESSION['number'] = $getData['number'];
                                                $_SESSION['address'] = $getData['address'];
                                                $_SESSION['profile_picture'] = $getData['profile_picture'];
                                                header("Location: User/dashboard.php");
                                        }else{  
                                           
                                              $incorrectPassword = true;
                                            
                                        }
                                }else{
                                  $accoutCheck++;
                                }
                        }

                        if($accoutCheck > 0){
                            $accountNotFound = true;
                        
                        }
    
    }else if($type == "Admin"){
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        $checkIfExist = "SELECT * FROM accounts WHERE type = 'Admin'";
                        $queryIfExist = mysqli_query($conn,$checkIfExist);

                        $accoutCheck = 0;
                
                        while($getData = mysqli_fetch_assoc($queryIfExist)){
                                if($gmail == $getData['gmail']){
                                        if($password == $getData['password']){
                                                $_SESSION['id'] = $getData['id'];
                                                $_SESSION['fullname'] = $getData['fullname'];
                                                $_SESSION['gmail'] = $getData['gmail'];
                                                $_SESSION['type'] = $getData['type'];
                                                $_SESSION['password'] = $getData['password'];
                                                $_SESSION['number'] = $getData['number'];
                                                $_SESSION['address'] = $getData['address'];
                                                $_SESSION['profile_picture'] = $getData['profile_picture'];
                                                header("Location: Admin/dashboard.php");
                                        }else{  
                                           
                                              $incorrectPassword = true;
                                            
                                        }
                                }else{
                                  $accoutCheck++;
                                }
                        }

                        if($accoutCheck > 0){
                            $accountNotFound = true;
                        
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
 
  <link rel="stylesheet" href="templatev1/src/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <h1 class="sitename" style="margin-left: 20px;">
                    <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i>
                    Sport Event Login
                </h1>
                </a>

                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail Address:</label>
                        <input type="email" class="form-control" id="gmail" name="gmail" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Select Role:</label>
                        <div class="d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="userRole" value="User" checked required>
                                <label class="form-check-label" for="userRole">User</label>
                            </div>
                            <div class="form-check" style="margin-left: 20px;">
                                <input class="form-check-input" type="radio" name="role" id="adminRole" value="Admin" required>
                                <label class="form-check-label" for="adminRole">Admin</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4" style="position: absolute; right: 28px;">
                            <a class="text-primary fw-bold" href="forgot_password.php">Forgot Password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <p class="fs-4 mb-0 fw-bold">New to Sport Event Management?</p>
                        <a class="text-primary fw-bold ms-2" href="register.php">Create an account</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="errorModl" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true" style="margin-top: 5%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Notification</h5>
            </div>
            <div class="modal-body">
                <?php 
                if ($incorrectPassword) {
                    echo '<div class="alert alert-danger" role="alert"><p>Incorrect password. Please try again.</p></div>';
                } elseif ($accountNotFound) {
                    echo '<div class="alert alert-danger" role="alert"><p>No account found with that email address. Please register.</p></div>';
                } 
                ?>
            </div>
            <div class="modal-footer">
                <a href="login.php" class="btn btn-danger">Home</a>
            </div>
        </div>
    </div>
</div>

<script>
    <?php if ($incorrectPassword || $accountNotFound): ?>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModl'), {
                keyboard: false
            });
            myModal.show();
        });
    <?php endif; ?>
</script>

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


<script src="templatev1/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="templatev1/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>