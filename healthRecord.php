<!-- Blood Group, list of diseases, allergies, Weight, Height,  -->

<!-- Database connection -->
<?php 

session_start();
$con = new mysqli('localhost','root','','user information');
if($con -> connect_error)
    {
      die('Connection Error : '.$con->connect_error);
    }

$sql= "SELECT * FROM signupinfo WHERE email = '".$_SESSION['email']."' ";
$result = $con->query($sql); 
$row = $result->fetch_assoc();  

 ?>


<div class="container">
	<div class="header">
		<h4>HEALTH RECORDS</h4>
	</div>

	<div>
		<form action="healthRecordConnect.php" method="POST" enctype="multipart/form-data" style='font-family: "Roboto", sans-serif;'>
			<div>
				<?php if($row['bloodGroup'] === "NULL") 
				        {
				        	echo	'<label for="bloodGroup">Blood Group : </label><br>

							        <input type="radio" id="A+" name="bloodGroup" value="A+">';
  							echo	'<label for="A+">A+</label>';

 							echo	'<input type="radio" id="A-" name="bloodGroup" value="A-">';
  							echo	'<label for="A-">A-</label><br>';

  							echo	'<input type="radio" id="B+" name="bloodGroup" value="B+">';
  							echo	'<label for="B+">B+</label>';

							echo	'<input type="radio" id="B-" name="bloodGroup" value="B-">';
  							echo	'<label for="B-">B-</label><br>';

 							echo	'<input type="radio" id="O+" name="bloodGroup" value="O+">';
  							echo	'<label for="O+">O+</label>';

  							echo	'<input type="radio" id="O-" name="bloodGroup" value="O-">';
  							echo	'<label for="O-">O-</label><br>';

  							echo	'<input type="radio" id="AB+" name="bloodGroup" value="AB+">';
  							echo	'<label for="AB+">AB+</label>';

							echo	'<input type="radio" id="AB-" name="bloodGroup" value="AB-">';
  							echo	'<label for="AB-">AB-</label><br>';

 							echo	'<input type="radio" id="OB+" name="bloodGroup" value="OB+">';
  							echo	'<label for="OB+">OB+</label>';

  							echo	'<input type="radio" id="OB-" name="bloodGroup" value="OB-">';
  							echo	'<label for="OB-">OB-</label><br>';
				        }
				        else
				        {
				        	echo "Blood Group: ".$row['bloodGroup'];
				        }
				?>

			</div>

			<div>
				<?php if($row['weight'] == NULL) 
				        {
				        	echo '<label for="weight">Weight (kgs) : </label>
				                  <input type="number" name="weight"> ';
				        }
				        else
				        {
				        	echo "Weight : ".$row['weight']." kg ";
				        }
				?>
				
			</div>

			<div>
				<?php if($row['height'] == NULL) 
				        {
				        	echo '<label for="height">Height (in cms) : </label>';
				            echo '<input type="number" name="height"> ';
				        }
				        else
				        {
				        	echo "Height : ".$row['height']." cms";
				        }
				?>
			</div>

			<div>
				<?php if($row['illness'] == "NULL") 
				        {
				        	echo '<label for="illness">Illnesses : </label>';
				            echo '<input type="text" name="illness"> ';
				        }
				        else
				        {
				        	echo "Illnesses : ".$row['illness'];
				        }
				?>
			</div>

			<div>
				<?php if($row['emergencyContact'] == NULL) 
				        {
				        	echo '<label for="emergencyContact">Emergency Contact : </label>';
				            echo '<input type="tel" name="emergencyContact"> ';
				        }
				        else
				        {
				        	echo "Emergency Contact : ".$row['emergencyContact'];
				        }
				?>
			</div><br>
				
				
				
			<div>
        		<button type="submit" name="save_health_info">Submit</button>
            </div>
        </form>

            <form action="filesLogic.php" method="POST" enctype="multipart/form-data" style='font-family: "Roboto", sans-serif;'>
            	<div>
				    <?php if($row['doc1'] == "NULL") 
				        {
				        	echo '<label for="myfile">Upload document for verification : </label>
				                   <input type="file" name="myfile">
          						   <button type="submit" name="save">upload</button>';
				        }
				        else
				        {
				        	//echo "Height : ".$row['height']." cms";
				        }
				?>

			</div>
            </form>
				
			
	</div>
</div>