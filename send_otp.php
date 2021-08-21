<?php
session_start();
$con=mysqli_connect('localhost','root','','user information');
$email=$_POST['email'];
$res=mysqli_query($con,"SELECT * from signupinfo where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	//Checking if email already verified
	$row = $res->fetch_assoc();
	if($row['email_verified'] == "NO")
	{
		mysqli_query($con,"INSERT INTO user_otp (`email`, `otp`) VALUES ('$email', '')");
		$otp=rand(11111,99999);
		mysqli_query($con,"UPDATE user_otp set otp='$otp' where email='$email'");
		$html="Your otp verification code is ".$otp;
		$_SESSION['EMAIL']=$email;
		smtp_mailer($email,'OTP Verification',$html);
		echo "yes";
    }
    else
    {
    	echo "already_verified";
    }
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject, $msg){
	require_once 'config.php'; 
	require 'vendor/autoload.php'; 
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("pers.testing.one@gmail.com", "eHealth Card team");
	$email->setSubject($subject);
	$email->addTo($to, "Lame");
	$email->addContent("text/plain", "The otp is ");
	$email->addContent(
		"text/html", "<strong>".$msg."</strong>"
	);
	$sendgrid = new \SendGrid(SENDGRID_API_KEY);
	try {
		$response = $sendgrid->send( $email );
		
	} catch ( Exception $e ) {
		echo 'Caught exception: '. $e->getMessage() ."\n";
	}
}
?>