     <?php
    
if(!isset($_SESSION)){

    session_start();
}

require_once "connections/connections.php";     

if(isset($_POST['submit'])){
    $id=$_POST['id'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $clinic = $_POST['clinic'];
   $date=$_POST['date'];
    $time = $_POST['time'];
   $service=$_POST['services'];
   $status=$_POST['status'];
   $checkbox1=$_POST['services'];  

   $sql = "UPDATE `tblappointment` SET `clinic` = '$clinic', `date` = '$date', `time` = '$time', `status` = '$status' WHERE `tblappointment`.`ID` = $id;";
$result = mysqli_query($con, $sql);
if(isset($_POST['services'])){
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

     $sql = "UPDATE `tblappointment` SET `clinic` = '$clinic', `date` = '$date', `time` = '$time', `service` = '$chk' WHERE `tblappointment`.`ID` = $id;";
     $result = mysqli_query($con, $sql);
}
if ($result) {
  echo '<script>alert("Data Successfully Updated!");';
     echo 'window.location.replace("book.php");</script>';
}
else
{
    echo "ERROR: Unable to insert new record ". mysqli_error($conn);
}

function function_alert($message) 
{
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Form Submitted !");
 

}
?>

