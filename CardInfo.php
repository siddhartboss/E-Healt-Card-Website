
<?php 

//include ('loginprocess.php');
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

?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Card</title>
    <link rel="stylesheet" type="text/css" href="css/CardInfo.css">
</head>
<style>
    body {
      background-image: url('./pic4.jpeg');
      background-size: cover;
    }
    </style>
<body>

    <div>
        <?php if($row['healthID'] == NULL) 
        {
            echo '<h2>HEALTH ID WILL BE GENERATED ONLY WHEN ALL THE DETAILS HAVE BEEN ENTERED AND VERIFIED</h2>';
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
                            $imgname = $row1['fname'];
                            $imgnm = "temp1/".$imgname.'.png';
                            ?>
                            <img src="<?php echo $imgnm; ?>" style="width:100px;">
                        </div>
                        <h1>Medical Association,India</h1>
                    </div>
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
                                <p>CARD HOLDER NAME: 
                                <?php echo $row['fname']." ".$row['mname']." ".$row['lname'];
                                ?></p>

                                <p>HEALTH ID:
                                <?php if($row1['healthID'] !== NULL) 
                                {   echo $row1['healthID']; }
                                ?></p>

                                <p>CARD HOLDER DOB: 
                                <?php echo $row1['dob'];
                                ?></p> 

                                <p>CARD HOLDER ADDRESS: 
                                <?php echo $row1['address'];
                                ?></p> 

                                <p>CARD SERIAL NUMBER:
                                <?php if($row1['CardSerialNo'] !== NULL) 
                                {   echo $row1['CardSerialNo']; }
                                ?></p>

                                <p>CARD ID:
                                <?php if($row1['CardID'] !== 0) 
                                {   echo $row1['CardID'];   }
                                ?></p>

                                <p>Date of Issue:
                                <?php if($row1['healthID'] !== NULL) 
                                {   echo $row1['registrationDate']; }
                                ?></p>

                                <p>Date of renewal:
                                <?php if($row1['healthID'] !== NULL) 
                                {   echo $row1['renewalDate'];  }
                                ?></p>

                                <p>Association: 
                                <?php echo "Medical Association,India";
                                ?></p>

                                <p>Emergency Contact: 
                                <?php echo $row['emergencyContact'];
                                ?></p> 
                            </div></li>
                        </ul>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 