<?php 

//include ('loginprocess.php');
session_start();
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
    {
      die('Connection Error : '.$con->connect_error);
    }

$sql= "SELECT * FROM signupinfo WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
$result = $con->query($sql); 
$row = $result->fetch_assoc();  


if($row['bloodGroup'] === "NULL")
{
	$bloodGroup= $_POST['bloodGroup'];
	$sql = "UPDATE signupinfo SET bloodGroup = '$bloodGroup'
                WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
}    

if($row['weight'] == NULL)
{
	$weight= $_POST['weight'];
	$sql = "UPDATE signupinfo SET weight = $weight
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
}    

if($row['height'] == NULL)
{
	$height= $_POST['height'];
	$sql = "UPDATE signupinfo SET height = $height
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
} 

if(isset($_POST['save_health_info']))
{
    $vaccine = $_POST['vaccine'];
    // echo $brands;
	$chk=""; 
    foreach($vaccine as $item)
    {
        $chk .= $item.",";
		// echo $item . "<br>";
        
    }
	$sql = "UPDATE signupinfo SET vaccine = '$chk'
				 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
    $result1 = $con->query($sql);
}


if($row['illness'] === "NULL")
{
	$illness= $_POST['illness'];
	$sql = "UPDATE signupinfo SET illness = '$illness'
                WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
}  

if($row['emergencyContact'] == NULL)
{
	$emergencyContact= $_POST['emergencyContact'];
	$sql = "UPDATE signupinfo SET emergencyContact = $emergencyContact
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
} 

/*if($row['doc1'] == "NULL")
{
	$filename =$_FILES["doc1upload"] ["name"];
	$tempname =$_FILES["doc1upload"] ["tmp_name"];
	$folder = "Documents/".$filename;
	move_uploaded_file($tempname, $folder);

	$sql = "UPDATE signupinfo SET doc1 = '$filename'
                 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
	$result1 = $con->query($sql);
}*/       

header("Location: account.php");

 ?>

