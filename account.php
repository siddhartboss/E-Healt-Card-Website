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

if($row['allDetails'] == "NO") 
        {
             if($row['bloodGroup'] != "NULL" && $row['weight'] != NULL && $row['height'] != NULL && $row['illness'] != "NULL" && $row['emergencyContact'] != NULL )
            {
                $sql = "UPDATE signupinfo SET allDetails = 'YES'
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
                $result1 = $con->query($sql);
            }
        }  

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/accountstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title"><i class='fas fa-user-md'></i> HEALTH <span>ID</span></div>
                    <div class="sidebar-btn"><i class="fas fa-bars"></i></div>
                    <ul>
                        <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <?php  
                            
                            $image = $row['profileImage'];
                            $image_src = "Images/".$image;
                                
                        ?>
                        <img src='<?php echo $image_src;  ?>'>
                                
                        <p><?php 

                                echo $row['fname']." ".$row['lname'];
                         ?></p>
                    </center>
                    <li class="item" id="profile" >
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile</i></span>
                        </a>
                    </li>
                    <!-- New Part-->
                    <li class="item" id="verify" >
                        <a href="otp_index.php" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Verify E-mail</i></span>
                        </a>
                    </li>
                    <!-- New Part-->
                    <li class="item" id="record">
                        <a href="healthRecordsite.php" class="menu-btn">
                            <i class="fas fa-poll"></i><span>Record</i></span>
                        </a>
                    </li>
                    <li class="item" id="viewcard">
                        <a href="FinalCardNew.php" class="menu-btn">
                          <i class='fas fa-print'></i><span>View Card</span></a>
                        </a>
                    </li>
		    <li class="item" id="cardinfo">
                        <a href="CardInfo.php" class="menu-btn">
                          <i class='fa fa-info-circle'></i><span>Card Info</span></a>
                        </a>
                    </li>
                    <?php if($row['policyform_filled']=="NO" && $row['earn']=="YES") : ?>
                    <li class="item" id="record">
                        <a href="e_policiesform.php" class="menu-btn">
                            <i class="fas fa-book"></i><span>Policy Form</i></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($row['policyform_filled']=="NO" && $row['earn']=="NO") : ?>
                    <li class="item" id="record">
                        <a href="none_policiesform.php" class="menu-btn">
                            <i class="fas fa-book"></i><span>Policy Form</i></span>
                        </a>
                    </li>
                <?php endif; ?>
                    
                  <?php if($row['policy_verified']=="YES") : ?>
                    <li class="item" id="record">
                        <a href="policiesinfo.html" class="menu-btn">
                            <i class="fas fa-file-medical"></i><span>Health Policy</i></span>
                        </a>
                    </li>
                <?php endif; ?>

                </div>
            </div>
            <!--sidebar end-->






            <!--main container start-->
            <div class="main-container" id="text">

                <div class="card" style="font-size: 125%">
                    <h2>PROFILE</h2><br>
                    <p>NAME: <?php 

                    echo $row['fname']." ".$row['mname']." ".$row['lname'];
                    ?></p>

                    <p>ALL DETAILS ENTERED : <?php 

                    echo $row['allDetails'];
                    ?></p>
                    
                    <p>DETAILS VERIFIED : <?php 

                    echo $row['verified'];
                    ?></p>

                    <!-- NEW SECTION-->
                    <p>EMAIL VERIFIED : <?php 

                    echo $row['email_verified'];
                    ?></p>
                    <!-- NEW SECTION-->
                    <p>HEALTH ID GENERATED: <?php 

                    if($row['healthID'] == NULL)
                    {
                        echo "NO";
                    }
                    else
                    {
                        echo $row['healthID'];
                    }
                    ?></p>
                    <p>POLICY DETAILS VERIFIED : <?php 

                        echo $row['policy_verified'];
                    ?></p>
                </div>
	<?php
	$imgname = $row['fname'];
	$imgnm = "temp1/".$imgname.'.png';
	?>
    <img src="<?php echo $imgnm; ?>">
            </div>
            <!--main container end-->
        </div>
        <!--wrapper end-->



        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
            /*$("#profile").on("click",function(){
        
                $(".main-container").html("Profile");
            });
            $("#record").on("click",function(){

              $(".main-container").html("Record");  

            });
            $("#viewcard").on("click",function(){
              $(".main-container").html("View Card");
            });*/
        });
        </script>

    </body>
</html>