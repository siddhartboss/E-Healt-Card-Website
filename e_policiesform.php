<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
        background-color:#F2F2F2;
    }
    .problem{
        margin:10% auto;
        border-top:8px solid #20639B;
        border-radius:8px;
        padding:3%;
        background-color:white;
        color:#20639B;
        font-weight:bold;
        box-shadow: 10px 10px 8px #888888;
        width:50%;
        
  
    }
    .submit{border-radius: 8px;
        background-color:#1172b9;
        border-color:#0e334e;
        color:white;
        text-align:center;
        width:20%;
        height:40px;
        
        }

</style>
<body>
<form class="problem" action="e_policiesform.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Occupation:</label>
        <input type="text" class="form-control" name="occupation" required>
      </div>
      <br>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Annual Income:</label>
        <input type="text" class="form-control" name="annual_income"  placeholder="in Rupees" required>
      </div>
      <br>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Income Certificate:</label>
        <input type="file" accept=".pdf" name="file">
      </div>
      <br>
      <input type="radio" name="declaration" required>
      <label for="html">I hearby declare that all the particulars stated above are true to the best of my knowledge and belief</label>
      <br>
      <br>
      <input  type="submit" name="SUBMIT" class="submit" style = "text-transform:uppercase;">   
      </form>
</body>
</html>

<?php

session_start();
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "user information";

$db= mysqli_connect($server , $username , $password , $dbname);
$sql= "SELECT * FROM signupinfo WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
$result = $db->query($sql); 
$row = $result->fetch_assoc();  


if(isset($_POST['SUBMIT'])){
	if(!empty($_POST['occupation']) && !empty($_POST['annual_income']) && !empty($_POST['declaration'])){ 
		$occupation = $_POST['occupation'];
		$annual_income = $_POST['annual_income'];
		$policyform_filled = "YES"; 
        $location="incomedocs/";
        $file_tmp=$_FILES['file']['tmp_name'];
        $temp = explode(".", $_FILES["file"]['name']);
        $newfilename = date('dmYHis') . '.' . end($temp);
         $file_location="incomedocs/" . $newfilename;
         $query = "UPDATE signupinfo SET policyform_filled='$policyform_filled',annual_income='$annual_income',occupation='$occupation',file_location='$file_location' WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
         //$sql="UPDATE `signupinfo` SET `policyform_filled`=[$policyform_filled],`annual_income`=[$annual_income],`occupation`=[$occupation],`file_location`=[$file_location] WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
         //$result1 = $db->query($sql);
         $run = mysqli_query($db,$query) or die(mysqli_error());
		if($run){
		    if(is_uploaded_file($_FILES['file']['tmp_name'])) 
		    {move_uploaded_file($file_tmp, $location.$newfilename);
		     }
    		header("Location:account.php");
		}
		else{
			echo "SOMETHING WENT WRONG";
		}

		
	}
	else{
		echo "<span style='color:red;'>ALL FIELDS ARE COMPULSORY</span>";
	}
}
?> 