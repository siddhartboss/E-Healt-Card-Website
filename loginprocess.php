<?php

session_start();

//include ('databaseconnection.php');
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
    {
      die('Connection Error : '.$con->connect_error);
    }  

$error = "";

if (isset($_POST['email']))
  {
  $_SESSION['email'] = $_POST["email"];
  $_SESSION['password'] = $_POST["password"];

  $_SESSION['email'] = stripcslashes($_SESSION['email']);
  $_SESSION['password'] = stripcslashes($_SESSION['password']);

  $_SESSION['email'] = mysqli_real_escape_string($con,$_SESSION['email']);
  $_SESSION['password']= mysqli_real_escape_string($con,$_SESSION['password']);

  $sql =  "SELECT * FROM signupinfo WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."' ";

  $result = mysqli_query($con,$sql);

  if( mysqli_num_rows($result) >= 1)
  {
    if($_SESSION['email'] == "adminone.hc@gmail.com" && $_SESSION['password']=="adminone")
    {
      header("Location: downloads.php");
    }
    else
    {
      header("Location: account.php");
    }
  }
  else {
    $error = "Invalid email or password";
    echo "$error";
  }


}

?>