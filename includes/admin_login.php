<?php

require_once "../connection/connection.php";

$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `acc_dental_tbl`";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)){
    if($user == $row["USERNAME"] && $pass == $row["PASSWORD"]){
        header("Location:../admin");
    }

}

?>