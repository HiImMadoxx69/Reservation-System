<?php
if(!isset($_SESSION)){

    session_start();
}


require_once "../connections/connections.php";

if (isset($_POST['register'])) {
        $firstname  = $_POST['firstname'];     
        $lastname = $_POST['lastname']; 
        $contact  = $_POST['contact'];   
        $clinic  = $_POST['clinic']; 
        $username = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $access= $_POST['access'];
        $sql = "SELECT * FROM tblloginuser where username= '$username'";
        
        $result = mysqli_query($con, $sql);
        $checkRow = mysqli_affected_rows($con);
        if ($checkRow <= 0) {
            $username = $_POST['username'];
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $access= $_POST['access'];
            $sql = "INSERT INTO tbllogin(firstname,lastname,contact,clinic,username,password,access) VALUES('$firstname','$lastname','$contact','$clinic','$username','$pass','$access')";
            $result = mysqli_query($con, $sql);
          
          echo '<script>alert("Account Created");';
            echo 'window.location.replace("login.php");</script>';
         }
         else{
            echo '<script>alert("Account Already Exist");';
            echo 'window.location.replace("register.php");</script>';
         }
   

}


   


?>
<!DOCTYPE html>
<html lang="en">




<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="" style="background-color: #c2855a;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url('../assets/images/loginlogo.png');background-repeat: no-repeat;
  background-size: 100% 100%;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="" method="post" id="myForm">
                   
                               
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input style="width:321.541px;"class="form-control form-control-user" type="text" name="firstname" id="firstname" placeholder="firstname" required>

                                    </div>
                                   
                                </div>
                                     <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input style="width:321.541px;"class="form-control form-control-user" type="text" name="lastname" id="lastname" placeholder="lastname" required>

                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input style="width:321.541px;"class="form-control form-control-user" type="text" name="contact" id="contact" placeholder="contact" required>

                                    </div>
                                   
                                </div>
                                     
                                 
                                  <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <select style="width:321.541px;" class="form-control input-sm" name="clinic" id="clinic" required>
                                        <option value="" selected disabled>Please select clinic:</option>
                                        <option value="bacoor">Bacoor</option>
                                        <option value="paliparan">Paliparan</option>
                                       
                                      </select>

                                    
                                   </div>
                                   </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input style="width:321.541px;"class="form-control form-control-user" type="email" name="username" id="username" placeholder="Username" required>

                                    </div>
                                   
                                </div>
                                     <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input style="width:321.541px;" class="form-control form-control-user" type="password" name="password" id="password" placeholder="password" required>

                                    </div>
                                   
                                </div>


                                  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control form-control-user" name="access" id="access" required>
                                            <option value="" selected disabled>Please select access:</option>
                                            <option value="admin">admin</option>
                                            <option  value="dentist">dentist</option>
                                            </select>
                                    </div>
                                   
                                </div>

                              
                              
                               
                              
                                      <button style="width:321.541px;"class="btn btn-primary btn-user btn-block" type="submit" name="register">Create Account</button>
                                      <div id="msg"></div> 
                                 </div>
                              
                       
                            <hr>
                           
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                                  </form>
                            </div>
                            <div style="margin-top: 50px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>