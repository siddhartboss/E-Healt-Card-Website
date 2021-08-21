
<?php 

//include ('loginprocess.php');
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

 if($row['healthID'] == NULL) 
        {
             if($row['verified'] == "YES" AND $row['email_verified'] == "YES") //ADDED HERE
            {
                $var = $row['id'];
                $hid = 10000 + $var;
                $row['healthID'] =  10000 + $var;
                $sql = "UPDATE signupinfo SET healthID = $hid
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
                $result1 = $con->query($sql);

                //NEWWW
                $date      = date("Y/m/d");
                $renewdate   = date('Y/m/d', strtotime('+1 years'));
                $sql = "UPDATE signupinfo SET registrationDate = '$date' , renewalDate='$renewdate'
                WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
                $result1 = $con->query($sql);

                //QR CODE
                //$current = $_SERVER['REQUEST_URI']

                //exec("python testQR.py $current",$output);
                //var_dump($output);
            }
        }

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
$codecontent .= "DOB : ".$cdob1.".\r\n";
$codecontent .= "Address : ".$caddress.".\r\n";
$codecontent .= "Serial No : ".$cserialno.".\r\n";
$codecontent .= "Card ID : ".$c_id.".\r\n";
$codecontent .= "Date of Issue : ".$datei1.".\r\n";
$codecontent .= "Date of Renewal : ".$dater1.".\r\n";
$codecontent .= "Association : ".$association.".\r\n";
$codecontent .= "Emergency Contact : ".$econtact.".\r\n";
$str = nl2br($codecontent);
// echo $str;
$tempd = 'temp/';
$filename = $tempd.$row1['fname'].'.png';

QRcode::png($codecontent, $filename);
 ?>











