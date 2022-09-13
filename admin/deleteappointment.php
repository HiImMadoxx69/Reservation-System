

<?php

if(!isset($_SESSION))
{
    session_start();
}

require_once "../connections/connections.php";     


$sql = "SELECT * FROM tblloginuser";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();
$total = $user->num_rows;
if ($_SESSION['Access']!="admin" && $_SESSION['Access']!="dentist") {
     echo header ("Location:../home.php");
}
if(!isset($_SESSION['UserLogin'])){

    echo header ("Location: login.php");
}

   $sql = "SELECT * FROM tblappointment where ID='$_REQUEST[ID]'";
 $result = mysqli_query($con, $sql);
 $val = mysqli_fetch_assoc($result);
 $Id=$val['ID'];
$firstname=$val['firstname'];
$lastname=$val['lastname'];
$contact=$val['contact'];
$email=$val['email'];
$clinic=$val['clinic'];
$date=$val['date'];
$time=$val['time'];
$service=$val['service'];
$status=$val['status'];
// if (isset($_POST['delete'])) {
     $sql = "INSERT INTO `archive` (ID,`firstname`, `lastname`, `contact`, `email`, `clinic`, `date`, `time`, `service`, `status`) VALUES ('$Id','$firstname', '$lastname', '$contact', '$email', '$clinic', '$date', '$time', '$service', '$status');";
$result = mysqli_query($con, $sql);
   if ($result) {
       echo "true";
   }
   
   $sql = "DELETE FROM tblappointment WHERE `tblappointment`.`ID` = '$_REQUEST[ID]'";
    $result = mysqli_query($con, $sql);
    header('location:viewappointment.php');
// if ($result) {
//      echo '<script>alert("Data Successfully Archive!");';
//      echo 'window.location.replace("book.php");</script>';
//  }
// else
// {
//     echo "ERROR: Unable to Delete new record ". mysqli_error($conn);
// }

// }

// else{

//     echo header ("Location: viewappointment.php");

// }
?>

