
<?php 

//include ('loginprocess.php');
include('phpqrcode/qrlib.php');

session_start();
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
{    die('Connection Error : '.$con->connect_error);
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

        $serialnumber = uniqid();
        $sql = "UPDATE signupinfo SET CardSerialNo = '$serialnumber'
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $result1 = $con->query($sql);

        $sql = "UPDATE carddetail SET CardSerialNo = '$serialnumber'
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $con->query($sql);

        $cardid = rand(111111111,999999999);
        $sql = "UPDATE signupinfo SET CardID = $cardid
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $result1 = $con->query($sql);

        $sql = "UPDATE carddetail SET CardID = $cardid
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $con->query($sql);

        $sql = "UPDATE signupinfo SET healthID = $hid
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $result1 = $con->query($sql);

        $sql = "UPDATE carddetail SET healthID = $hid
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $con->query($sql);

        //NEWWW
        $date      = date("Y/m/d");
        $renewdate   = date('Y/m/d', strtotime('+1 years'));
        $sql = "UPDATE signupinfo SET registrationDate = '$date' , renewalDate='$renewdate'
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $result1 = $con->query($sql);

        $sql = "UPDATE carddetail SET registrationDate = '$date' , renewalDate='$renewdate'
            WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
        $con->query($sql);
        
        header("Location: qr1.php"); 
        //QR CODE
        //$current = $_SERVER['REQUEST_URI']

        //exec("python testQR.py $current",$output);
        //var_dump($output);

        // $name = $row['fname']." ".$row['mname']." ".$row['lname'];
        // $health_id = strval($row1['healthID']);

        // $cdob1 = $row1['dob'];

        // $caddress = $row1['address'];
        // $cserialno = $row1['CardSerialNo'];

        // $c_id = strval($row1['CardID']);

        // $datei1 = $row1['registrationDate'];

        // $dater1 = $row1['renewalDate'];

        // $association = "Medical Association,India";
        // $econtact = strval($row['emergencyContact']);

        // $codecontents = $name.'  '.$cdob1.'  '.$caddress.'   '.$cserialno.'  '.$c_id.'  '.$datei1.'  '.$dater1.'  '.$association.'  '.$econtact;

        // //echo $codecontents;
        // $codecontent = "Name : ".$name.".\r\n";
        // $codecontent .= "DOB : ".$cdob1.".\r\n";
        // $codecontent .= "Address : ".$caddress.".\r\n";
        // $codecontent .= "Serial No : ".$cserialno.".\r\n";
        // $codecontent .= "Card ID : ".$c_id.".\r\n";
        // $codecontent .= "Date of Issue : ".$datei1.".\r\n";
        // $codecontent .= "Date of Renewal : ".$dater1.".\r\n";
        // $codecontent .= "Association : ".$association.".\r\n";
        // $codecontent .= "Emergency Contact : ".$econtact.".\r\n";
        // $str = nl2br($codecontent);
        // $tempd = 'temp/';
        // $filename = $tempd.$row1['fname'].'.png';

        // QRcode::png($codecontent, $filename);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Card</title>
    <link rel="stylesheet" type="text/css" href="css/FinalCardNew.css">
    <style>
    body {
      background-image: url('./pic4.jpeg');
      background-size: cover;
    }
    </style>
</head>
<body>

    <div>
        <?php if($row['healthID'] == NULL) 
        {   echo '<h2>HEALTH ID WILL BE GENERATED ONLY WHEN ALL THE DETAILS HAVE BEEN ENTERED AND VERIFIED</h2>';
        }?>
        <br>
    </div>
    <div class="cardbox">
        <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="health.jpg" alt="HEALTH CARD" style="width:670px;height:450px;">
       
      <div class="bottom">
        <div >
       <?php     
        $imgname = $row['fname'];
	$imgnm = "temp1/".$imgname.'.png'
    ?>
    <img src="<?php echo $imgnm; ?>" style="width:100px;">
      </div>
        <h1>Medical Association,India</h1></div>
    </div>
   
    
 <div class="flip-card-back">
   

	<div class="generalInfo">
        <ul>
		<li><div class="image">
			<?php  
                            
                $image = $row['profileImage'];
                $image_src = "Images/".$image;
                                
            ?>
            <img src='<?php echo $image_src;  ?>' height="100px" width="100px">

		</div></li>		
		<li><div class="info">
			<p>NAME: <?php 

                echo $row['fname']." ".$row['mname']." ".$row['lname'];
            ?></p>

            <p>DOB: <?php 

                echo $row['dob'];
            ?></p>
            <p>AGE: <?php 

                echo $row['age'];
            ?></p>
            <p>GENDER: <?php 

                echo $row['gender'];
            ?></p>
            <p>ADDRESS: <?php 

                echo $row['address'];
            ?></p>
            <p>CONTACT NUMBER: 
            <?php 

                echo $row['contact'];
            ?></p>
		</div></li>
    </ul>
	</div>


	<div class="healthID">
		<p>HEALTH ID:
			<?php if($row['healthID'] !== NULL) 
		    {
				echo $row['healthID'];
			}?>
		</p>

	</div>

<br>
	<div class="healthInfo">
        <ul>
		<li><p>BLOOD GROUP: <?php 

                echo $row['bloodGroup'];
            ?></p>
        <li><p>WEIGHT: <?php 

                echo $row['weight']." kg";
            ?></p>
        <li><p>HEIGHT: <?php 

                echo $row['height']." cms";
            ?></p>        
		</ul><br><br>

        <p>ILLNESS: <?php 

                echo $row['illness'];
            ?></p><br>

        <p>Emergency Contact: <?php 

                echo $row['emergencyContact'];
            ?></p>    

	</div>


    <div class="healthID">
        <p>Date of Issue:
            <?php if($row['healthID'] !== NULL) 
            {
                echo $row['registrationDate'];
            }?>
        </p>

    </div>
    <div class="healthID">
        <p>Date of renewal:
            <?php if($row['healthID'] !== NULL) 
            {
                echo $row['renewalDate'];
            }?>
        </p>

    </div>
    <br>
    <br>
</div>

 
    </div>
  </div>
</div>
</body>
</html>