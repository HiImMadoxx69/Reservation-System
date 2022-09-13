<?php
require_once "connections/connections.php";


if($_SERVER['REQUEST_METHOD']=="POST"){

	$post_data = $_POST['email'];
	$result = $con->query("SELECT * FROM tblloginuser WHERE username='$post_data'");

	if ($result->num_rows>0) {
		echo("true");
	}
	else{
		echo("false");
	}
}




// require_once "connections/connections.php";
// require 'includes/PHPMailer.php';
// require 'includes/SMTP.php';
// require 'includes/Exception.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


// if($_SERVER['REQUEST_METHOD']=="POST"){

// 	$username = $_POST['email'];


// $mail= new PHPMailer();
// $mail->isSMTP();
// $mail->Host="smtp.mail.yahoo.com";
// $mail->SMTPAuth="true";
// $mail->Port="587";
// $mail->smtpClose();
// $otp = mt_rand(100000,999999);
// $mail->SMTPSecure = "tls";
// $mail->Username ="harveygultiano29@yahoo.com";
// $mail->Password ="vpbmrxghjjccbmyt";
// $mail->Subject="Email Verification";
// $mail->setFrom("harveygultiano29@yahoo.com");
// $mail->Body="Your Email Verification Code is ".$otp;
// $mail->addAddress("$username");
// $mail->Send();

// setcookie("otp", $otp);
// $date = date('H:i:s');
// $date = strtotime($date);
// $date = strtotime("+5 minute", $date);
// $exdate= date('H:i:s', $date);
// $date = date('H:i:s');
// $date = strtotime($date);
// $date = strtotime("+5 minute", $date);
//  $exdate= date('H:i:s', $date);

//  $d=date('H:i:s');



// $sql = "UPDATE `tblloginuser` SET `vkey` = '$otp' WHERE `tblloginuser`.`username` = '$username'";
// $result = mysqli_query($con, $sql);

// $sql = "UPDATE `tblloginuser` SET `is_expired` = '$exdate' WHERE `tblloginuser`.`username` = '$username'";
// $result = mysqli_query($con, $sql);   
// $sql = "SELECT * FROM tblloginuser where username= '$username'";
// $result = mysqli_query($con, $sql);


// 	if ($result->num_rows>0) {
// 	 echo('true');
// 	}
// 	else{
// 		 echo('false');
// 	}
// }



  ?>

