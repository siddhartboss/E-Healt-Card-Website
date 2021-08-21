<!DOCTYPE html>
<html>
<head>
	<link rel ="stylesheet" href="css/signupnew.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>User Registration</title>

	
</head>
<style>
    body {
      background-image: url('./mg3.jpg');
      background-size: cover;
    }
    </style>


<body>
<div class="container">
	

	<h2 class = "heading"><b>SIGN UP</b></h2>
<hr>

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
		

    </form>

</div>
</body>
</html>