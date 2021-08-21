<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
	<link rel ="stylesheet" href="css/signupnew.css">
	<style>
    body {
      background-image: url('./pic3.jpeg');
      background-size: cover;
    }
    </style>
</head>
<body>
<div class="container">
	<div class="header">
		<div class ="title">
          <h1>Sign Up</h1>

        </div>

	
	</div>
	<form action="signupconnect.php" method="POST" enctype="multipart/form-data">
    	<h2> User Information </h2>
		<p>
			<label for="fname"><b>First Name :</b> </label>
			<input type="text" name="fname" required>
		</p>
		<p>
			<label for="mname"><b>Middle Name :</b></label>
			<input type="text" name="mname" required>
		</p>

		<p>
			<label for="lname"><b>Last Name :</b></label>
			<input type="text" name="lname" required>
		</p>

		<p>
			<label for="email"><b>Email :</b></label>
			<input type="email" name="email" required>
		</p>

		<p>
			<label for="password"><b>Password :</b></label>
			<input type="password" name="password" required>
		</p>

		<p>
			<label for="password1"><b>Confirm Password :</b> </label>
			<input type="password" name="password1" required>
		</p>

		<p>
			<label for="contact"><b>Contact number :</b></label>
			<input type="tel" pattern="[0-9]{10}" name="contact" required>
		</p>

		<p>
		<label for="gender"><b>Gender :</b></label>
			<fieldset>
			<input type="radio" id="male" name="gender" value="male">
  			<label for="male">Male</label> 
 			<input type="radio" id="female" name="gender" value="female">
  			<label for="female">Female</label>
  			<input type="radio" id="other" name="gender" value="other">
  			<label for="other">Other</label></fieldset>
		</p>

		<p>
			<label for="dob"><b>Date of birth :</b></label>
  			<input type="date" name="dob">
		</p>

		<p>
			<label for="age"><b>Age :</b></label>
			<input type="number" name="age" required>
		</p> 

		<p>
			<label for="address"><b>Address :</b> </label><br>
			<textarea name="address" rows="5" cols="30"></textarea>
		</p>
		<p>
            
            <label for="earn"><b>Do you earn :</b></label>
            <input type="radio" id="YES" name="earn" value="YES">
            <label for="YES">YES</label> 
            <input type="radio" id="NO" name="earn" value="NO">
            <label for="NO">NO</label>
		</p>

		<p>
			<!--
			<label for="profileImage">Profile Image : </label>
			<input type="file" name="uploadfile" required value=""/> -->
			<label for="profileImage"><b>Profile Image :</b></label>
			<!--<input type="file" name="profileImage" required> -->
			<input type="file" name="uploadfile" value=""/>
		    <!-- <input type ="submit" name= "submit" value="Upload"/> -->
		</p> 
        
        <p class="wrapper">
        	<button class = 'subbtn' type="submit" name="register_user">SUBMIT</button>
        </p>





















<a href="login.php"> Login </a>
</div>
</body>
</html>