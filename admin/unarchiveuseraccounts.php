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
 $id=$_GET['ID'];
  $firstname=$_GET['firstname'];
  $lastname=$_GET['lastname'];
  $contact=$_GET['contact'];
  $username=$_GET['username'];
  $password=$_GET['password'];
  
$sql = "INSERT INTO `tblloginuser` (ID,`firstname`, `lastname`, `contact`, `username`, `password`) VALUES ('$id','$firstname', '$lastname', '$contact', '$username', '$password');";
$result = mysqli_query($con, $sql);
  $sql = "DELETE FROM archiveuseraccounts WHERE `archiveuseraccounts`.`ID` = $id;";
  
$result = mysqli_query($con, $sql);
if ($result) {
     echo '<script>alert("Data Successfully Unarchive!");';
     echo 'window.location.replace("archiveappointment.php");</script>';
 }
else
{
    echo "ERROR: Unable to Delete new record ". mysqli_error($conn);
}
?>