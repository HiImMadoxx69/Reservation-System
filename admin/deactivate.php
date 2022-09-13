<?php
  
    // Connect to database 
   require_once "../connections/connections.php";     
    // Check if id is set or not if true toggle,
    // else simply go back to the page

  
        // Store the value from get to a 
        // local variable "course_id"
        $id=$_GET['ID'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
       $sql ="UPDATE `tblloginuser` SET `status` = '0' WHERE `tblloginuser`.`ID` = '$id';";
  
        // Execute the query
   $result = mysqli_query($con, $sql);
    
  
 
    header('location: viewuseraccount.php');
?>



