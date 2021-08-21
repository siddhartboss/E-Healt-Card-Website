<?php 
include('phpqrcode/qrlib.php');
session_start();
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
    {
      die('Connection Error : '.$con->connect_error);
    }
$sql= "SELECT * FROM signupinfo WHERE email = '".$_SESSION['email']."' ";
$result = $con->query($sql); 
$row = $result->fetch_assoc(); 

$sql= "SELECT * FROM carddetail WHERE email = '".$_SESSION['email']."' ";
$result = $con->query($sql); 
$row1 = $result->fetch_assoc(); 

// storing the variables as concatenated string 
// to convert it in qr code
$name = $row['fname']." ".$row['mname']." ".$row['lname'];
$health_id = strval($row1['healthID']);
$cdob1 = $row1['dob'];

$caddress = $row1['address'];
$cserialno = $row1['CardSerialNo'];
$c_id = strval($row1['CardID']);

$datei1 = $row1['registrationDate'];

$dater1 = $row1['renewalDate'];

$association = "Medical Association,India";
$econtact = strval($row['emergencyContact']);

$codecontents = $name.'  '.$cdob1.'  '.$caddress.'   '.$cserialno.'  '.$c_id.'  '.$datei1.'  '.$dater1.'  '.$association.'  '.$econtact;

//echo $codecontents;
$codecontent = "Name : ".$name.".\r\n";
$codecontent .= "Health Id : ".$health_id.".\r\n";
$codecontent .= "DOB : ".$cdob1.".\r\n";
$codecontent .= "Address : ".$caddress.".\r\n";
$codecontent .= "Serial No : ".$cserialno.".\r\n";
$codecontent .= "Card ID : ".$c_id.".\r\n";
$codecontent .= "Date of Issue : ".$datei1.".\r\n";
$codecontent .= "Date of Renewal : ".$dater1.".\r\n";
$codecontent .= "Association : ".$association.".\r\n";
$codecontent .= "Emergency Contact : ".$econtact.".\r\n";
$str = nl2br($codecontent);
$tempd = 'temp1/';
$filename = $tempd.$row1['fname'].'.png';

QRcode::png($codecontent, $filename);
echo '<script>alert("Health Id and QR Code generated succesfully! ")</script>';
header("Location: FinalCardNew.php"); 
 ?>

