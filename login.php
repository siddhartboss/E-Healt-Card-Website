<!DOCTYPE html>
<html>
<head>
     <title>Login</title>
      <link rel="stylesheet" type="text/css" href="css/login.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
    body {
      background-image: url('./pic2.jpeg');
      background-size: cover;
    }
    </style>
</head>
<body>
  <header><br>
    <br>
    <div class="main">
        <div class ="title">
          <h2><b>LOGIN PAGE</b></h2>
        </div>
        </header>

  <div class = "container">
    <form action="loginprocess.php" class='loginform' method="POST" >
      <div>
        <label for="email" class="login-label"><h5><b>USER ID:</b></h5></label>
        <input type="text" name="email" required>
      </div>
      <div>
        <label for="password" class="login-label"><h5><b>PASSWORD:</b></h5> </label>
        <input type="password" name="password" required>
      </div>

      <input class="btn btn-success mt-3" type="submit" value="Submit"><br><br>
      <a href="signup.php" style=> Haven't registered yet? Signup </a>
    </form>

  </div>
</body>
</html>
