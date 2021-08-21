<?php 
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];  
    $address = $_POST['address'];
    $earn = $_POST['earn'];
    //$profileImage = $_POST['profileImage'];

    //Checking if both passwords match
    if($password !== $password1)
    {
    	die('Entered passwords do not match');
    }

    //Database connection
    $conn = new mysqli('localhost','root','','user information'); 
    
    if($conn -> connect_error)
    {
    	die('Connection Error : '.$conn->connect_error);
    }
    else
    {
    	//For profile image
        $filename =$_FILES["uploadfile"] ["name"];
		$tempname =$_FILES["uploadfile"] ["tmp_name"];
		$folder = "Images/".$filename;
		move_uploaded_file($tempname, $folder);
		//$image=basename( $_FILES["uploadfile"]["name"],".jpg"); // used to store the filename in a variable
    	
        $sql = "INSERT INTO signupinfo (fname,mname,lname,email,password,contact,gender,dob,age,address,earn,profileImage)
                VALUES ('$fname','$mname','$lname','$email','$password',$contact,'$gender','$dob',$age,'$address','$earn','$filename')";
        

        if($conn->query($sql) === TRUE) 
        {
        	echo "Registration Successful.";
        	echo '<br><a href="index.php">MAIN PAGE</a>';

		} 
		else 
		{
  		    echo "Error: " . $sql . "<br>" . $conn->error;
		}        

	$sql = "INSERT INTO carddetail (fname,lname,email,password,address,dob)
                VALUES ('$fname','$lname','$email','$password','$address','$dob')";
	$conn->query($sql);

        $conn -> close();
    }

?>