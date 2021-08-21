<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
//header("Location : index.php");
// echo "Logged out Successfully.";
// echo '<br><a href="index.php">MAIN PAGE</a>';
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body {
      background-image: url('./mg3.jpg');
      background-size: cover;
    }
    .btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
    margin-left: 36pc;
    margin-top: 20px;
}
    .logout{
      margin-top:10pc
     
    }
    </style>
</head>
<body>
  <h3 class ="logout text-center">Logged out successfully !! </h3>
  <a class="btn btn-primary " href="index.php" role="button">MAIN PAGE</a>
</body>
</html>