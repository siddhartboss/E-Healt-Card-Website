
<?php 

//include ('databaseconnection.php');
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
    {
      die('Connection Error : '.$con->connect_error);
    }  

$error = "";
include 'filesLogic.php';?>
<?php 
$sql = "SELECT * FROM signupinfo";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="css/landingpagestyle.css">
  <title>Download files</title>
  <style>
    body {
      background-image: url('./pic3.jpeg');
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="main">
    <div class="logo">
      <img src = >
        <ul>
            <li><a href="logout.php" style="font-size:20px;">Logout</a> </li>
        </ul>
    </div>
    
    <table>
      <thead>
          <th>ID</th>
          <th>Filename</th>
          <th>size (in mb)</th>
          <th>Downloads</th>
          <th>Action</th>
      </thead>
      <tbody>
        <?php foreach ($files as $file): ?>
          <tr>
            <td><?php echo $file['id']; ?></td>
            <td><?php echo $file['doc1']; ?></td>
            <td><?php echo floor($file['docsize'] / 1000) . ' KB'; ?></td>
            <td><?php echo $file['downloads']; ?></td>
            <td><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
          </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>
</body>
</html>