


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dente &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/fav.jpg">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.theme.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/scss/style.scss" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
               <style type="text/css">
              .anav:hover{
                      text-decoration: none;
                    
                    }
            </style>
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
 <style type="text/css">
   
   </style>     
      
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
<!-- <div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div style="padding-top:50px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;"class="col-md-7">
            <span class="sub-text">WE PRIORITY YOUR</span>
            <h1>Your <strong>NEW SMILE</strong></h1>
          </div>
           <main>

        <a href="https://www.facebook.com/comiadentalclinic" class="p-2 pl-0" style="position: fixed;bottom: 0;"><span class="icon-facebook">  </span>https://www.facebook.com/comiadentalclinic</a>
     </main>
</div>   -->
   
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

 <div class="site-section site-block-3">
      <div class="container">
        <div class="row">
      
           
              <h2 class="site-heading text-black">WEBSITE <strong>TERMS OF SERVICE</strong></h2>
              <br>
              <p class="text-black-opacity-5">LAST UPDATED: 10th day of November 2017</p>
              <p style="text-indent: 50px;">1.<strong>ACCEPTANCE OF TERMS</strong></p>
              <br>
              <p class="text-black-opacity-5">1.1 We are Winning Smile Dental Clinic (Winning Smile), and we own and operate this website (“Site”) at www.winningsmile.ph.</p>
              <br>
              <p class="text-black-opacity-5">1.2 Your use of this Site is subject to these Terms of Use. By using the Site, you are deemed to have accepted and agree to be bound by these Terms of Use. We may make changes to these Terms of Use from time to time. We may notify you of such changes by any reasonable means, including by posting the revised version of these Terms of Use on the Site. Your use of the Site following changes to these Terms of Use will constitute your acceptance of those changes.</p>
              <br>
              <p style="text-indent: 50px;">2.<strong>ABILITY TO ACCEPT TERMS OF USE</strong></p>
              <br>
              <p class="text-black-opacity-5">2.2 You affirm that you are either more than 18 years of age, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Use, and to abide by and comply with these Terms of Use.</p>
              <p style="text-indent: 50px;">3.<strong>SITE ACCESS</strong></p>
              <br>
              <p class="text-black-opacity-5">3.1 You are responsible for all access to the Site using your internet connection, even if the access is by another person.</p>
              <br>
              <p class="text-black-opacity-5">3.2 We will use reasonable efforts to ensure that the Site is available at all times. However, we cannot guarantee that the Site or any individual function or feature of the Site will always be available and/or error free. The Site may be unavailable during periods when we are implementing upgrades or carrying our essential maintenance on the Site.</p>
              <br>
              <p style="text-indent: 50px;">4.<strong>ACCESS TO SITE OUTSIDE OF THE PHILIPPINES</strong></p>
              <br>
              <p class="text-black-opacity-5">4.1 We make no promise that the materials on the Site are appropriate or available for use in locations outside Philippines. Accessing the Site from territories where its contents are illegal or unlawful is prohibited. If you choose to access the Site from elsewhere, you do so on your own initiative and are responsible for compliance with local laws.</p>
              <br>
              <p style="text-indent: 50px;">5.<strong>YOUR USE OF THE SITE</strong></p>
              <br>
              <p class="text-black-opacity-5">5.1 Your permission to use the Site is personal to you and non-transferable, and you may not use the Site for commercial purposes. Your use of the Site is conditional on your compliance with the rules of conduct set forth in these Terms of Use and you agree that you will not:</p>
              <br>
              <p class="text-black-opacity-5">5.1.1 Use the Site for any fraudulent or unlawful purpose;</p>
              <br>
              <p class="text-black-opacity-5">5.1.2 Use the Site to defame, abuse, harass, stalk, threaten or otherwise violate the rights of others, including without limitation others’ privacy rights or rights of publicity;</p>
              <br>
              <p class="text-black-opacity-5">5.1.3 Impersonate any person or entity, false state or otherwise misrepresent your affliation with any person or entity in connection with the Site or express or imply that we endorse any statement you make;</p>
              <br>
              <p class="text-black-opacity-5">5.1.4 Interfere with or disrupt the operation of the Site or the servers or networks used to make the Site available or violate any requirements, procedures, policies or regulations of such networks;</p>
              <br>
              <p class="text-black-opacity-5">5.1.5 Transmit or otherwise make available in connection with the Site any virus, worm or other computer code that is harmful or invasive or may or is intended to damage the operation of, or to monitor the use of, any hardware, software, or equipment;</p>
              <br>
              <p class="text-black-opacity-5">5.1.6 Reproduce, duplicate, copy, sell, resell or otherwise exploit for any commercial purposes, any portion of, use of, or access to the Site;</p>
              <br>
              <p class="text-black-opacity-5">5.1.7 Modify, adapt, translate, reverse engineer, decompile or disassemble any portion of the Site. If you wish to reverse engineer any part of the Site to create an interoperable program you must contact us and we may provide interface data subject to verification of your identity and other information;</p>
              <br>
              <p class="text-black-opacity-5">5.1.8 Remove any copyright, trade mark or other proprietary rights notice from the Site or materials originating from the Site;</p>
              <br>
              <p class="text-black-opacity-5">5.1.9 Frame or mirror any part of the Site without our express prior written consent;</p>
              <br>
              <p class="text-black-opacity-5">5.1.10 Create a database by systematically downloading and storing Site content;</p>
              <br>
              <p class="text-black-opacity-5">5.1.11 Use any manual or automatic device in any way to gather Site content or reproduce or circumvent the navigational structure or presentation of the Site without our express prior written consent. Notwithstanding the foregoing, we grant the operators of public online search engines limited permission to use search retrieval applications to reproduce materials from the Site for the sole purpose of and solely to the extent necessary for creating publicly available searchable indices of such materials solely in connection with each operator’s public online search service.</p>
              <br>
              <p class="text-black-opacity-5">5.2 We reserve the right to revoke these exceptions either generally or in specific instances.</p>
              <br>
              <p style="text-indent: 50px;">6.<strong>THIRD PARTY WEBSITES</strong></p>
              <p class="text-black-opacity-5">6.1 The Site may provide links to other websites and online resources. We are not responsible for and do not endorse such external sites or resources. Your use of third party websites and resources is at your own risk.</p>
              <br>
              <p class="text-black-opacity-5">6.2 You may create a link to this Site, provided that:</p>
              <br>
              <p class="text-black-opacity-5">6.2.1 The link is fair and legal and is not presented in a way that is:</p>
              <br>
              <p class="text-black-opacity-5" style="text-indent: 50px;">1.Misleading or could suggest any type of association, approval or endorsement by us that does not exist, or</p>
              <p class="text-black-opacity-5" style="text-indent: 50px;">2.Harmful to our reputation or the reputation of any of our affiliates;</p>
              <br>
              <p class="text-black-opacity-5">6.2.2 You retain the legal right and technical ability to immediately remove the link at any time, following a request by us to do so.</p>
              <br>
              <p class="text-black-opacity-5">6.3 We reserve the right to require you to immediately remove any link to the Site at any time and you shall immediately comply with any request by us to remove any such link.</p>
              <br>
              <p style="text-indent: 50px;">7.<strong>INTELLECTUAL PROPERTY</strong></p>
              <p class="text-black-opacity-5">7.1 The intellectual property rights in the Site and all of the text, pictures, videos, graphics, user interfaces, visual interfaces, trademarks, logos, applications, programs, computer code and other content made available on it are owned by us and our licensors. You may not print or otherwise make copies of any such content without our express prior permission.</p>
              <br>
              <p style="text-indent: 50px;">8.<strong>LIMITATION OF LIABILITY</strong></p>
              <p class="text-black-opacity-5">8.1 We provide the Site on an “as is” basis and make no representations as to the quality, completeness or accuracy of any content made available on the Site. To the maximum extent permitted by law, we expressly exclude:</p>
              <br>
              <p class="text-black-opacity-5">8.1.1 All conditions, warranties and other terms that might otherwise by implied by law into these Terms of Use; and</p>
              <br>
              <p class="text-black-opacity-5">8.1.2 Any and all liability to you, whether arising under these Terms of Use or otherwise in connection with your use of the Site.</p>
              <br>
              <p class="text-black-opacity-5">8.2 The foregoing is a comprehensive limitation of liability that applies to all damages of any kind, including (without limitation) compensatory, direct, indirect or consequential damages, loss of data, income or profit, loss of or damage to property and claims of third parties. Notwithstanding the foregoing, nothing in these Terms of Use is intended to exclude or limit any liability that may not by law be excluded or limited, and in particular none of the exclusions and limitations in this clause are intended to limit any rights you may have as a consumer under Singapore law or statutory rights which may not be excluded, nor in any way to exclude or limit (site owner) liability to you for death or personal injury resulting from our negligence or that of our employees or agents.</p>
              <br>
              <p style="text-indent: 50px;">9.<strong>COLLECTION OF PERSONAL INFORMATION</strong></p>
              <p class="text-black-opacity-5">9.1 We may collect and use information about you in accordance with our privacy policy. You can view a copy of this policy by clicking here www.winningsmile.ph.</p>
              <br>
              <p style="text-indent: 50px;">10.<strong>DURATION OF TERMS</strong></p>
              <p class="text-black-opacity-5">10.1 These Terms of Use are effective until terminated. We may, at any time and for any reason, terminate your access to or use of the Site. If we terminate your access to the Site you will not have the right to bring claims against us or our affiliates with respect to such termination. We and our affiliates shall not be liable for any termination of your access to the Site.</p>
              <br>
              <p style="text-indent: 50px;">11.<strong>GOVERNING LAW</strong></p>
              <p class="text-black-opacity-5">11.1 These Terms of Use are effective until terminated. We may, at any time and for any reason, terminate your access to or use of the Site. If we terminate your access to the Site you will not have the right to bring claims against us or our affiliates with respect to such termination. We and our affiliates shall not be liable for any termination of your access to the Site.</p>
              <br>
        </div>
      </div>
    </div>
    
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
    <script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/testimonial/js/owl.carousel.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
  </body>
</html>