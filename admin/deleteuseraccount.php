

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

  $sql = "SELECT * FROM tblloginuser where ID='$_REQUEST[ID]'";
 $result = mysqli_query($con, $sql);
 $val = mysqli_fetch_assoc($result);
 $Id=$val['ID'];
$firstname=$val['firstname'];
$lastname=$val['lastname'];
$contact=$val['contact'];
$username=$val['username'];
$password=$val['password'];
$verified=$val['verified'];
$vkey=$val['vkey'];
$is_expired=$val['is_expired'];
$profile_image=$val['profile_image'];
$access=$val['Access'];
$status=$val['status'];
// if (isset($_POST['delete'])) {
     $sql = "INSERT INTO `archiveuseraccounts` (`ID`, `firstname`, `lastname`, `contact`, `username`, `password`, `verified`, `vkey`, `is_expired`, `profile_image`, `Access`, `status`) VALUES ($Id, '$firstname', '$lastname', '$contact', '$username', '$password', '$verified', '$vkey', '$is_expired', '$profile_image', '$access', '$status');";
$result = mysqli_query($con, $sql);
   if ($result) {
       echo "true";
   }
   
   $sql = "DELETE FROM tblloginuser WHERE `tblloginuser`.`ID` = '$_REQUEST[ID]'";
    $result = mysqli_query($con, $sql);
    header('location:viewuseraccount.php');
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

