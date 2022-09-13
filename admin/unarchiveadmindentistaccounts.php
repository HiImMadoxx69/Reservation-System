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
   $clinic=$_GET['clinic'];
  $username=$_GET['username'];
  $password=$_GET['password'];
   $access=$_GET['access'];
$sql = "INSERT INTO `tbllogin` (ID,`firstname`, `lastname`, `contact`, `clinic`, `username`, `password`, `Access`) VALUES ('$id','$firstname', '$lastname', '$contact', '$clinic', '$username', '$password', '$access');";
$result = mysqli_query($con, $sql);
  $sql = "DELETE FROM archiveadmindentistaccounts WHERE `archiveadmindentistaccounts`.`ID` = $id;";
  
$result = mysqli_query($con, $sql);
if ($result) {
     echo '<script>alert("Data Successfully Unarchive!");';
     echo 'window.location.replace("archiveadmindentistaccount.php");</script>';
 }
else
{
    echo "ERROR: Unable to Delete new record ". mysqli_error($conn);
}
?>