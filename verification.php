<?php
$msg = "";
  $msg_class = "";
error_reporting (E_ALL ^ E_NOTICE);

if(!isset($_SESSION)){

    session_start();
}

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



set_error_handler(function(int $errno, string $errstr) {
    if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
        echo header ("Location: login.php");
        return false;
    } else {
        return true;
    }
}, E_WARNING);
require_once "connections/connections.php"; 


 $d=date('H:i:s');
 $username=$_GET['username'];
$sql = "SELECT * FROM `tblloginuser` WHERE username='$username'";
   $result = mysqli_query($con, $sql);
   $val = mysqli_fetch_assoc($result);
   $username=$val['username'];


if(isset($_SESSION['Access']) && $val['verified']==1){

    echo header ("Location: home.php");

}



if ($val['verified']>=1) {
      echo header ("Location: login.php");
}
if (isset($_POST['verify'])) {
  if ($val['vkey']!=$_POST['ver']) {
  $msg = "Invalid Code";
  $msg_class = "alert-danger";
  }
 elseif ($d>=$val['is_expired']) {
 $msg = "Code is expired";  
 $msg_class = "alert-danger";
        
  }

  else{
    $key=$_POST['ver'];
    $sql ="UPDATE `tblloginuser` SET `verified` = 1 WHERE `tblloginuser`.`vkey` = '$key';";
    $result = mysqli_query($con, $sql);
 
  echo '<script>alert("Your Account Has Been Verified");';
                echo 'window.location.replace("login.php");</script>';

  }


}

if (isset($_POST['resend'])) {




$mail= new PHPMailer();
$mail->isSMTP();
$mail->Host="smtp.mail.yahoo.com";
$mail->SMTPAuth="true";
$mail->Port="587";
$mail->smtpClose();
$otp = mt_rand(100000,999999);
$mail->SMTPSecure = "tls";
$mail->Username ="harveygultiano29@yahoo.com";
$mail->Password ="vpbmrxghjjccbmyt";
$mail->Subject="Email Verification";
$mail->setFrom("harveygultiano29@yahoo.com");
$mail->Body="Your Email Verification Code is ".$otp;
$mail->addAddress("$username");
$mail->Send();

echo "Your Email Verification has been Sent";
setcookie("otp", $otp);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
echo $exdate= date('H:i:s', $date);
$date = date('H:i:s');
$date = strtotime($date);
$date = strtotime("+5 minute", $date);
echo $exdate= date('H:i:s', $date);

echo $d=date('H:i:s');



$sql = "UPDATE `tblloginuser` SET `vkey` = '$otp' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);

$sql = "UPDATE `tblloginuser` SET `is_expired` = '$exdate' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);   
$sql = "SELECT * FROM tblloginuser where username= '$username'";
$result = mysqli_query($con, $sql);


}

if (isset($_POST['eupdate'])) {
$newusername=$_POST['newusername'];
$sql = "UPDATE `tblloginuser` SET `username` = '$newusername' WHERE `tblloginuser`.`username` = '$username'";
$result = mysqli_query($con, $sql);
     echo '<script>alert("Update Success");';
echo 'window.location.replace("verification.php?username='.$newusername.'");</script>';
}
if (isset($_POST['back'])) {
'window.location("verification.php?username='.$username.'");</script>';
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Dente &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
   
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(function() {
       $(".toggle").on("click", function(){

          if($(".item").hasClass("active")){
             $(".item").removeClass("active");

          }
          else{
             $(".item").addClass("active");
          }
       });
      });




    

    </script>
  </head>
   <body >
    <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>" role="alert">
                              <?php echo $msg; ?>
                            </div>
                          <?php endif; ?>
   
 <!--    <div class="site-block-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="site-block-feature d-flex p-4 rounded mb-4">
              <div class="mr-3">
                <span class="icon flaticon-tooth font-weight-light text-white h2"></span>
              </div>
              <div class="text">
                <h3>Periontodology</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>   
          </div>
          <div class="col-lg-4">
            <div class="site-block-feature d-flex p-4 rounded mb-4">
              <div class="mr-3">
                <span class="icon flaticon-tooth-whitening font-weight-light text-white h2"></span>
              </div>
              <div class="text">
                <h3>Tooth Whitening</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="site-block-feature d-flex p-4 rounded mb-4">
              <div class="mr-3">
                <span class="icon flaticon-tooth-pliers font-weight-light text-white h2"></span>
              </div>
              <div class="text">
                <h3>Preventative Care</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
 <?php

if (isset($_POST['update'])) {

echo'


<section class="vh-100" style="background-color: white;">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="width:100%;margin-top: 0px;">
       <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">PLEASE UPDATE YOUR EMAIL INFORMATION!</h5>
      
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 1rem; margin-top: 0px;" >
          <div class="row g-0">
            
             
               
            </div>
            
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black" style="padding:0px;">

<form method="POST" action="">
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter Valid Email Account!</h5>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input  type="text" id="newusername" name="newusername" placeholder="Enter Valid Email Account"class="form-control"/>
    <br>
 
  </div>

  
  <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="eupdate" id="eupdate" style="background-color:#333399; border-color: #333399;  ">Update Contact</button>
    <button type="submit" class="btn btn-primary btn-block mb-4" name="back" id="back">BACK</button>


  <!-- Register buttons -->
    </form>

             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
';


}

else{

  echo'


<section class="vh-100" style="background-color: white;">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="width:100%;margin-top: 0px;">
       <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">PLEASE VERIFY YOUR ACCOUNT TO CONTINUE!</h5>
        
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 1rem; margin-top: 0px;" >
          <div class="row g-0">
            
             
               
            </div>
            
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black" style="padding:0px;">

<form method="POST" action="">
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter Verification Code From your Email!</h5>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input  type="text" id="ver" name="ver" placeholder="Enter Code"class="form-control"/>
    <br>
 <button class="btn btn-primary"type="submit" name="resend" id="resend" style="background-color:#333399; border-color: #333399;">Resend</button>
  </div>

  
  <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="update" id="update" style="background-color:#333399; border-color: #333399;  ">Update Contact</button>
<button type="submit" class="btn btn-primary btn-block mb-4" name="verify" id="verify">Verify</button>

  <!-- Register buttons -->
    </form>

             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
';
}
?>
<?php    
if(isset($_SESSION['UserLogin']) && $key==1){

  

  echo '<div class="site-section site-block-appointment">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 pl-lg-5 order-1 order-lg-2">
            <div class="pl-lg-5 ml-lg-5">
              <h2 class="site-heading text-black">Online <strong>Appointment</strong> Request Form</h2>
              <p class="lead text-black">Due to COVID-19 pandemic we are strictly by appointment only until further notice. We can accommodate 4 to 5 patients only per branch per day. Please answer the questionnaire. Print, sign and bring it on the date of your appointment. This will serve also as proof of appointment. We will confirm your appointment via email or call 2 to 3 days before your appointment date. Please take note of the following:</p>
              <p class="text-black-opacity-5">- Wearing face mask is a requirement<br>
              - Companion is not allowed inside the clinic and treatment room except for minor<br>
              - We encourage you to make the clinic as your first destination for the day<br>
              - Wearing shoes with lace is not recommended when you come to the clinic<br>
              - We encourage cashless transaction through Credit Card and Gcash<br>
              - Patient is encourage to bring one bag only and wear minimal jewelry</p>
            </div>
          </div>
          <div class="col-lg-6 order-2 order-lg-1">


            <form action="" method="POST" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="firstname">First Name</label>
                  <input type="text" id="firstname"name="firstname" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="lastname">Last Name</label>
                  <input type="text"id="lastname"name="lastname" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="contact">Contact</label>
                  <input type="text"id="contact"name="contact" class="form-control" placeholder="Contact">
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
              </div>
            <div class="row form-group">
                 <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fname">Date</label>
                  <input type="date" id="date" name="date" id="date" class="form-control">
                </div>



                <div class="col-md-6">
                  <label class="font-weight-bold" for="">Clinic</label>
                   <select class="form-control" name="clinic" id="clinic">
                    <option value="bacoor">bacoor</option>
                    <option value="paliparan">paliparan</option>
                                       
                   </select>
                </div>
              </div>

             <div class="row form-group">
                <div class="col-md-6">
                  <label class="font-weight-bold" for="contact">Time</label>
                   <select class="form-control" name="time" id="time">
                    <option id="time" name="time" value="10:30 AM">10:30 AM</option>
                    <option id="time" name="time" value="11:30 AM">11:30 AM</option>
                    <option id="time" name="time" value="1:00 PM">1:00 PM</option>
                    <option id="time" name="time" value="1:30 PM">1:30 PM</option>
                    <option id="time" name="time" value="2:30 PM">2:00 PM</option>
                    <option id="time" name="time" value="2:30 PM">2:30 PM</option>
                    <option id="time" name="time" value="3:00 PM">3:00 PM</option>
                    <option id="time" name="time" value="3:30 PM">3:30 PM</option>
                    <option id="time" name="time" value="4:00 PM">4:00 PM</option>
                    <option id="time" name="time" value="4:30 PM">4:30 PM</option>
                  </select>

                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold" for="email">Services</label> 
                <div class="form-check">
      <input type="checkbox" name="services[]" value="General Dentistry" ></input>
      <label>General Dentistry
       
         </div>
      </label>  
      <div class="form-check">
      <input type="checkbox" name="services[]" value="Oral Surgery">
      <label>Oral Surgery
        
      </label>  
      </div>
        <div class="form-check">
      <input type="checkbox" name="services[]" value="Orthodontics"> 
      <label>Orthodontics
        
      </label> 
     </div>
     <div class="form-check">
      <input type="checkbox" name="services[]" value="Endodontics">
      <label>Endodontics
       
      </label> 
      </div>
      <div class="form-check">
      <input type="checkbox" name="services[]" value="Periodontics"> 
      <label>Periodontics
        
      </label>
     </div>
       <div class="form-check">
      <input type="checkbox" name="services[]" value="Cosmetic Dentistry">
      <label>Cosmetic Dentistry 
       
      </label> 
  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                   <button class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
              </div>

  
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Promo --> 
   <!--  <div class="promo py-5 bg-primary">
      <div class="container text-center">
        <span class="d-block h4 mb-3 font-weight-light text-white">Promo For Tooth Cleaning from <del>$140.00</del> now <strong class="font-weight-bold">$50.00</strong></span>
        <div id="date-countdown" class="mt-0"></div>
      </div>
    </div> -->

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="site-heading text-black mb-5">Our <strong>Services</strong></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/005.png" alt=""></span>
              </div>
              <div class="text">
                <h3>General Dentistry</h3>
                <p>General dentistry covers a range of treatment options and procedures fundamental to protecting and maintaining a good standard of oral health. Treatments are in place to keep your mouth, gums, and teeth healthy and free of pain.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/003.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Oral Surgery</h3>
                <p>Oral surgery refers to any surgical procedure performed on your teeth, gums, jaws or other oral structures. This includes extractions, implants, gum grafts and jaw surgeries. Oral surgery is usually performed by an oral and maxillofacial surgeon or a periodontist.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/004.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Orthodontics</h3>
                <p>the treatment of irregularities in the teeth (especially of alignment and occlusion) and jaws, including the use of braces.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/006.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Endodontics</h3>
                <p>Endodontics is the branch of dentistry concerning dental pulp and tissues surrounding the roots of a tooth. “Endo” is the Greek word for “inside” and “odont” is Greek for “tooth.” Endodontic treatment, or root canal treatment, treats the soft pulp tissue inside the tooth.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/001.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Periodontics</h3>
                <p>Periodontics is the dental specialty focusing exclusively in the inflammatory disease that destroys the gums and other supporting structures around the teeth. A periodontist is a dentist who specializes in the prevention, diagnosis, and treatment of periodontal, or disease, and in the placement of dental implants.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/002.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Cosmetic Dentistry</h3>
                <p>Cosmetic dentistry is dentistry aimed at creating a positive change to your teeth and to your smile. The American Academy of Cosmetic Dentistry (AACD) is the primary dental resource for patients as they strive to maintain their health, function, and appearance for their lifetime.</p>
              </div>
            </div>
          </div>

          

        </div>
      </div>
    </div>

    <div class="site-block-half d-block d-lg-flex site-block-video">
      <div class="image bg-image order-2" style="background-image: url(images/hero_bg_1.jpg); ">
        <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="icon-play"></span></a>
      </div>
      <div class="text order-1">
        <h2 class="site-heading text-black mb-3">Success <strong>Stories</strong></h2>
        <p class="lead">We at COMIA DENTAL CLINIC is more than willing to help you regarding all your dental health concerns.</p>
        <p>Have your Healthy Smile and Maintained Good Oral Hygiene.</p>
      </div>
      
    </div>';
  }

  else{

    
  echo '
    <!-- Promo --> 
   <!--  <div class="promo py-5 bg-primary">
      <div class="container text-center">
        <span class="d-block h4 mb-3 font-weight-light text-white">Promo For Tooth Cleaning from <del>$140.00</del> now <strong class="font-weight-bold">$50.00</strong></span>
        <div id="date-countdown" class="mt-0"></div>
      </div>
    </div> -->

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="site-heading text-black mb-5">Our <strong>Services</strong></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/005.png" alt=""></span>
              </div>
              <div class="text">
                <h3>General Dentistry</h3>
                <p>General dentistry covers a range of treatment options and procedures fundamental to protecting and maintaining a good standard of oral health. Treatments are in place to keep your mouth, gums, and teeth healthy and free of pain.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/003.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Oral Surgery</h3>
                <p>Oral surgery refers to any surgical procedure performed on your teeth, gums, jaws or other oral structures. This includes extractions, implants, gum grafts and jaw surgeries. Oral surgery is usually performed by an oral and maxillofacial surgeon or a periodontist.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/004.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Orthodontics</h3>
                <p>the treatment of irregularities in the teeth (especially of alignment and occlusion) and jaws, including the use of braces.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/006.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Endodontics</h3>
                <p>Endodontics is the branch of dentistry concerning dental pulp and tissues surrounding the roots of a tooth. “Endo” is the Greek word for “inside” and “odont” is Greek for “tooth.” Endodontic treatment, or root canal treatment, treats the soft pulp tissue inside the tooth.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/001.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Periodontics</h3>
                <p>Periodontics is the dental specialty focusing exclusively in the inflammatory disease that destroys the gums and other supporting structures around the teeth. A periodontist is a dentist who specializes in the prevention, diagnosis, and treatment of periodontal, or disease, and in the placement of dental implants.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="site-block-feature-2 d-flex rounded mb-5">
              <div class="mr-3">
                <span><img src="images/icon/002.png" alt=""></span>
              </div>
              <div class="text">
                <h3>Cosmetic Dentistry</h3>
                <p>Cosmetic dentistry is dentistry aimed at creating a positive change to your teeth and to your smile. The American Academy of Cosmetic Dentistry (AACD) is the primary dental resource for patients as they strive to maintain their health, function, and appearance for their lifetime.</p>
              </div>
            </div>
          </div>

          

        </div>
      </div>
    </div>

    <div class="site-block-half d-block d-lg-flex site-block-video">
      <div class="image bg-image order-2" style="background-image: url(images/hero_bg_1.jpg); ">
        <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="icon-play"></span></a>
      </div>
      <div class="text order-1">
        <h2 class="site-heading text-black mb-3">Success <strong>Stories</strong></h2>
        <p class="lead">We at COMIA DENTAL CLINIC is more than willing to help you regarding all your dental health concerns.</p>
        <p>Have your Healthy Smile and Maintained Good Oral Hygiene.</p>
      </div>
      
    </div>';
  }

     ?>

    <!-- THIS IS A FEEDBACK SECTION -->
    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="site-heading text-black">People <strong>Says</strong></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="site-block-testimony p-4 text-center">
              <div class="mb-3">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid">
              </div>
              <div>
                 <p>Dolores perferendis ipsam animi fuga, dolor pariatur aliquam esse. Modi maiores minus velit iste enim sunt iusto dolore</p>
                 <p><strong class="font-weight-bold">Nathalie Oscar</strong></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="site-block-testimony p-4 text-center active">
              <div class="mb-3">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid">
              </div>
              <div>
                 <p>Dolores perferendis ipsam animi fuga dolor pariatur aliquam esse. Modi maiores minus velit iste enim sunt iusto dolore</p>
                 <p><strong class="font-weight-bold">Linda Uler</strong></p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="site-block-testimony p-4 text-center">
              <div class="mb-3">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid">
              </div>
              <div>
                 <p>Dolores perferendis ipsam animi fuga dolor pariatur aliquam esse. Modi maiores minus velit iste enim sunt iusto dolore</p>
                 <p><strong class="font-weight-bold">Chris Coodard</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     -->
   


    
    
    
    <footer class="site-footer border-top">
      <div class="container">
<!--         <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigation</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Team</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>
              </div>
            </div>

            
          </div>
          <div class="col-lg-4">
           

            <div class="mb-5">
              <h3 class="footer-heading mb-4">Recent News</h3>
              <div class="block-25">
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a href="#" class="d-flex">
                      <figure class="image mr-4">
                        <img src="images/hero_bg_1.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="small text-uppercase date">Sep 16, 2018</span>
                        <h3 class="heading font-weight-light">Lorem ipsum dolor sit amet consectetur elit</h3>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit minima minus odio.</p>

              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>

            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
              </div>
            </div>


          </div>
          
        </div> -->
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made by Gultiano, Harvey D., Tubo Camille D., Valderama, Jeric Ramos<i class="icon-heart-o" aria-hidden="true"></i><!--  by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div> 
    </footer>
  </div>

                          <script>
                            var date= new Date();
                            var tdate= date.getDate();
                            var month = date.getMonth() + 1;
                            if(tdate<10){
                                tdate='0' + month;
                            }

                            if(month<10){
                                month='0' + month;
                            }
                            var year=date.getUTCFullYear();
                            var minDate = year + "-" + month + "-" + tdate;
                            document.getElementById("date").setAttribute('min', minDate)
                            console.log(minDate);
                        </script>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>