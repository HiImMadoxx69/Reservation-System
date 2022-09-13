
<?php

if(!isset($_SESSION))
{
    session_start();
}


require_once "connections/connections.php";     

          

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dente &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <body>
  
      <div class="site-block-3" style="position: sticky;
   top: 0; background-color: #333333;;
   z-index: 100;margin: 0px 0px;padding-top: 0px;padding-bottom: 0px; margin-top: 0px; margin-bottom: 0px;">
       <nav class="navbar" style="position: sticky;
   top: 0;
   z-index: 100; padding-top: 0px;padding-bottom: 0px;margin-top: 0px; margin-bottom: 0px;">
            <a href="#" class="d-flex align-items-center"> <span class="icon-envelope mr-2"></span>
                  <span class="d-none d-md-inline-block">comiadentalclinic@gmail.com</span>
            </a> 
            <a href="#" class="d-flex align-items-center ml-auto mr-4">
                  <span class="icon-phone mr-2"></span>
                  <span class="d-none d-md-inline-block">0919 935 4455 / 0995 466 8622 / 0915-4561079</span>
            </a>
     </nav>
    

  <div class="site-block-3" style=" background-color: #333333;position: sticky;
   top: 0;
   z-index: 100; padding-top:0px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;">
       <nav class="navbar" style="position: sticky;
   top: 0;
   z-index: 100; padding-top:0px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;">
          <h2 class="mb-0 site-logo" style="padding-right: 0px;"><a href="home.php"><img class="logo" src="images/comialogo.png">Comia</a></h2>
      <ul class="menu">
     
         <li class="item"><a class="anav"href="home.php">Home</a></li>
         <li class="item"><a class="anav"href="about.php">About</a></li>
         <li class="item"><a class="anav"href="services.php">Services</a></li>
         <li class="item"><a class="anav"href="contact.php">Contact</a></li>
      
      
             <?php

if(isset($_SESSION['UserLogin'])){

 $username  = $_SESSION['UserLogin'];
$sql = "SELECT * FROM tblloginuser WHERE username='$username'";
$result = mysqli_query($con, $sql);
$val=mysqli_fetch_assoc($result);
 

 $img  = $val['profile_image']; 
  echo'  <li class="item">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               

                                    <img class="img-profile rounded-circle"
                                    src="'.$img.'" style ="max-width:50px;max-height:50px;">
                                     <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$username.'</span>                       </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="edituseraccount.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Account
                                </a>
                                <a class="dropdown-item" href="book.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Reservation
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>';
}
else{
       echo '<li class="item button"><a class="anav"href="login.php">Login</a></li>
         <li class="item secondary button"><a href="register.php">Sign-up</a></li>';
}
?>
             
       <li class="toggle"><a class="anav"href="#"><span class="bars"></span></a></li>
      </ul>
     </nav>
   
        
     </div>  
  </div>
<div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    
   <div style="padding-top:50px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;"class="col-md-7">
            <span class="sub-text">KNOW US</span>
            <h1><strong>About</strong> US</h1>
            <p class="lead text-white">We at COMIA DENTAL CLINIC is more than willing to help you regarding all your dental health concerns, We believe that dental wellness is for everyone and we are committed to making our dental services accessible and convenient for your family and your child. We support early dental care as it can promote a lifetime of healthy smiles for your child.</p>
          </div>
           <main>

        <a href="https://www.facebook.com/comiadentalclinic" class="p-2 pl-0" style="position: fixed;bottom: 0;"><span class="icon-facebook">  </span>https://www.facebook.com/comiadentalclinic</a>
     </main>
</div>  
    
      

 




    <div class="site-section section-about">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="site-heading text-black mb-5">A Team of <strong>Dedicated Dentists</strong></h2>
          </div>
        </div>
        <div class="row" style="margin: auto;">
          <div class="col-md-6 pr-md-5 text-left mb-5">
            <div>
              <img src="images/dr1.jpg" alt="Image" class="w-50 mb-5 rounded-circle">
              <h3>Dr. Charriz Comia</h3>
              <p class="lead">General Dentist at Comia Dental Clinic</p>

              <p class="mt-5">
                <a href="#" class="py-4 pl-0 pr-2"><span class="icon-facebook"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-twitter"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-instagram"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-linkedin"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-heart"></span></a>
              </p>
            </div>
          </div>
          <div class="col-md-6 pl-md-5 text-left">
            <div>
              <img src="images/dr3.jpg" alt="Image" class="w-50 mb-5 rounded-circle">
              <h3>Dr. Christina V. Comia</h3>
              <p class="lead">General Dentist at Comia Dental Clinic</p>

              <p class="mt-5">
                <a href="#" class="py-4 pl-0 pr-2"><span class="icon-facebook"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-twitter"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-instagram"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-linkedin"></span></a>
                <a href="#" class="py-4 pl-2 pr-2"><span class="icon-heart"></span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="site-section bg-light" style="width:100%">
      <div class="container"style="width:100%">
        <div class="row mb-5 justify-content-center"style="width:100%">
          <div class="col-md-6 text-center"style="width:100%">
            <h2 class="site-heading text-black mb-5"style="width:100%">See Our <strong>Services</strong></h2>
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
    

    <!-- <div class="promo py-5 bg-primary">
      <div class="container text-center">
        <span class="d-block h4 mb-3 font-weight-light text-white">Promo For Tooth Cleaning from <del>$140.00</del> now <strong class="font-weight-bold">$50.00</strong></span>
        <div id="date-countdown" class="mt-0"></div>
      </div>
    </div> -->
    
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