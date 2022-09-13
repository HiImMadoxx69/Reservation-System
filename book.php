
<?php

if(!isset($_SESSION))
{
    session_start();
}
$msg = "";
$msg_class = "";

require_once "connections/connections.php";     


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
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
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
<!-- <div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div style="padding-top:50px;padding-bottom: 0px;margin-left: 80px;margin-right: 80px;"class="col-md-7">
            <span class="sub-text">SERVICES THAT YOU SATISFIED</span>
            <h1><strong>OUR</strong></h1>
              <h1><strong>SERVICES</strong></h1>
         
          </div>
           <main>

        <a href="https://www.facebook.com/comiadentalclinic" class="p-2 pl-0" style="position: fixed;bottom: 0;"><span class="icon-facebook">  </span>https://www.facebook.com/comiadentalclinic</a>
     </main>
</div>  
 -->



<?php 

if(isset($_POST['submit'])){

echo'<script type="text/javascript">
    $(document).ready(function(){
        $( "#cont" ).append("<div class="alert alert-success" role="alert">Data Successfully Updated!</div>");
    });
</script>';
}
?>


    <div class="site-section bg-light" style="width:100%">
      <div class="container"style="width:100%">
        <div class="row mb-5 justify-content-center"style="width:100%">
          <div class="col-md-6 text-center"style="width:100%">
            <h2 class="site-heading text-black mb-5"style="width:100%">See YOUR<strong> APPOINTMENTS</strong></h2>
          </div>
        </div>
    <div class="container-fluid" id="cont"></div>
     <div class="container-fluid" >

                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Shedule Appointment<br></h6>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     
                                    <thead>

                                        <tr>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Clinic</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Service</th>   
                                              <th>Status</th>  
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php 
                   $email=$_SESSION['email'];
                            $sql = "SELECT * FROM tblappointment WHERE email='$email'";
                            $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)):
                   ?>
                                        <tr>
                                            <td><?php echo $row['ID']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['contact']; ?> </td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['clinic']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['time']; ?></td>
                                             <td><?php echo $row['service']; ?></td>
                                              <td><?php echo $row['status']; ?></td>

                                              <td style="width:150px"><a style="box-sizing: border-box;"  class="btn btn-success btn-sm" href="#myModaledit" data-toggle="modal" name="<?php echo $row['ID'];?>" id="edit">EDIT</a>&nbsp;
                                                <a class="btn btn-success btn-sm" href="#myModal" data-toggle="modal" name="<?php echo $row['ID'];?>" id="delete" style="background-color:red; border-color:red">DELETE</a>
                                              </td>
                          
                                        </tr>
                  <?php endwhile; ?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
      </div>
    </div>

                        <!-- EDIT Modal -->
                          <div id="myModaledit" class="modal fade">
                              <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                  <div class="modal-header flex-column">
                                <h5 class="modal-title">EDIT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                     
  <div class="container-fluid">

                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      
                        <div class="card-body">

                            <div class="table-responsive">

                     
                           <form method="POST" action="edituserappointment.php">
                     <div class="col-sm-8"><input type="hidden" name="id" id="id" class="form-control input-sm"></div>
                    </div>
                    <div class="row cont-row">
                        
                        <div class="col-sm-3"><label>First Name </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="firstname"id="firstname" placeholder="First Name" name="name" class="form-control input-sm"value="<?php echo $row['firstname'];?>" disabled></div>
                    </div>
                      <div class="row cont-row">
                        
                       
                        <div class="col-sm-8"><input type="hidden" name="firstname"id="firstname" placeholder="First Name" name="name" class="form-control input-sm"value="<?php echo $row['firstname'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Last Name</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" name="lastname"id="lastname" placeholder="Last name" class="form-control input-sm"value="<?php echo $row['lastname'];?>" disabled></div>
                    </div>
                     <div class="row cont-row">
                     
                        <div class="col-sm-8"><input type="hidden" name="lastname"id="lastname" placeholder="Last name" class="form-control input-sm"value="<?php echo $row['lastname'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Contact Number</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['contact'];?>" disabled></div>
                    </div>
                     <div class="row cont-row">
                     
                        <div class="col-sm-8"><input type="hidden"name="contact"id="contact" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['contact'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Email</label><span>:</span></div>
                        <div class="col-sm-8"><input type="email" name="email" id="email" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['email'];?>" disabled></div>
                    </div>
                    <div class="row cont-row">
                      
                        <div class="col-sm-8"><input type="hidden" name="email" id="email" placeholder="Enter Mobile Number" class="form-control input-sm"value="<?php echo $row['email'];?>" ></div>
                    </div>
                    <div class="row cont-row">
                        <div class="col-sm-3"><label>Date</label><span>:</span></div>
                        <div class="col-sm-8"><input type="date" id="date" name="date" id="date"value="<?php echo $row['date'];?>"></div>

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



                    <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="clinic"><span>Clinic:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="clinic" id="clinic">
                                        <option value="bacoor">bacoor</option>
                                        <option value="paliparan">paliparan</option>
                                       
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>

                           <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="time"><span>Time:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="time" id="time">
                                        <option value="10:30 AM">10:30 AM</option>
                                        <option value="11:30 AM">11:30 AM</option>
                                       
                                        <option value="1:00 PM">1:00 PM</option>
                                        
                                     
                                         <option value="1:30 PM">1:30 PM</option>
                                        <option  value="2:00 PM">2:00 PM</option>
                                        <option  value="2:30 PM">2:30 PM</option>
                                         <option  value="3:00 PM">3:00 PM</option>
                                        <option value="3:30 PM">3:30 PM</option>
                                        <option  value="4:00 PM">4:00 PM</option>
                                        <option  value="4:30 PM">4:30 PM</option>
                                       
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>

                    <br>
                      <div class="col-sm-8"><label for="services"><span>Services:</span></label></div>
                          <br>       
                      <div class="row cont-row">

                                 
                                    <div class="form-check">

      <input type="checkbox" name="services[]" value="General Dentistry" ></input>
      <label>General Dentistry</div>
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
                                    
                           <br>       
                 
                       <div class="row cont-row">
                       
                                 
                                   <div class="col-sm-8"><label for="services"><span>Status:</span></label>     </div>
                                   <br>  <br>
                                      <select class="form-control input-sm" name="status" id="status">
                                        <option value="Pending">Pending</option>
                                      
                                        <option value="Canceled">Cancelled</option>
                                      
                                      </select>
                                      <br><br>
                                    
                                  
                    </div>
                      

                          
                  
                    <div style="margin-top:30px;" class="row">
                        
                    </div>
                </div>
                  <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                              </div>
               
                       
                    </form>
              
            
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
              
                              </div>
                            
                            </div>
                          </div>
                        </div>
                            <script typ
                            e="text/javascript">
                      
                            $('.btn-sm').on('click', function(){

                                $ID = $(this).attr('name');
                          
                                 $tr = $(this).closest('tr');
                                
                                var data = $tr.children("td").map(function() {
                                    return $(this).text();
                                }).get();

                                console.log(data);

                                $('#id').val(data[0]);
                                $('#firstname').val(data[1]);
                                $('#lastname').val(data[2]);
                                $('#contact').val(data[3]);
                                $('#email').val(data[4]);
                                $('#clinic').val(data[5]);
                                $('#date').val(data[6]);
                                $('#time').val(data[7]);
                                $('#service').val(data[8]);
                                $('#status').val(data[9]);
                            });


                            </script>



                             <!-- Delete Modal -->
                           <div id="myModal" class="modal fade">
                              <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                  <div class="modal-header flex-column">
                                    <div class="icon-box">
                                      <i class="material-icons">&#xE5CD;</i>
                                    </div>            
                                    <h4 class="modal-title w-100">Are you sure?</h4>  
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </div>
                              </div>
                            </div>     
                            <script typ
                            e="text/javascript">
                      
                            $('.btn-sm').on('click', function(){

                                $ID = $(this).attr('name');
                          
                               $('.btn-danger').click(function(){
                                window.location = 'deleteuserappointment.php?ID=' + $ID;
                              });

                            });


                            </script>
    
    <!-- <div class="promo py-5 bg-primary">
      <div class="container text-center">
        <span class="d-block h4 mb-3 font-weight-light text-white">Promo For Tooth Cleaning from <del>$140.00</del> now <strong class="font-weight-bold">$50.00</strong></span>
        <div id="date-countdown" class="mt-0 mb-2"></div>
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