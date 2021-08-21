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

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/Style2.css">
</head>


<body>
  <div class="container">
	<div class="header">
		<h4>HEALTH RECORDS</h4>
	</div>


	<div>
		<form action="healthRecordConnect.php" method="POST" enctype="multipart/form-data">
			<p>
				<?php if($row['bloodGroup'] === "NULL")
				        {
				        	echo	'<label for="bloodGroup">Blood Group : </label><br>';

							echo    '<input type="radio" id="A+" name="bloodGroup" value="A+">';
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

			</p>

			<p>
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

			</p>

			<p>
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
			</p>
			<p>
				<?php if($row['age'] == NULL)
						{
							echo '<label for="age">Age : </label>';
							echo '<input type="number" name="age" required>';
						}
						else
						{
							echo "Age : ".$row['age'];
						}
				?>
			</p>
			
			<p>
				<?php if($row['age']>=0 &&  $row['age']<=1)
						{
							echo 'AVAILABLE VACCINES FOR INFANTS<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
								echo '<th>VACCINE</th>';  
								echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';
							  
							echo '<tr>';
								echo '<td>BCG</td>';
							  	echo '<td>At Birth(or within one year)</td>';
							echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>Hepatitis B - Birth dose</td>';
							  echo '<td>At Birth(or within 24 hours)</td>';
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>OPV(Oral Polio Vaccine) Birth dose</td>';
							  echo '<td>At Birth(or within 24 hours)</td>';
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>OPV 1,2 & 3</td>';
							  echo '<td>At 6 weeks, 10 weeks & 14 weeks</td>';
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>Pentavalent 1, 2 & 3</td>';
							  echo '<td>At 6 weeks, 10 weeks & 14 weeks</td>';							  
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>IPV (inactivated Polio Vaccine)</td>';
							  echo '<td>14 weeks</td>';
							  echo '</tr>';

							  echo '<tr>';
							  echo '<td>Rota Virus Vaccine</td>';
							  echo '<td>At 6 weeks, 10 weeks & 14 weeks</td>';							  
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>Measles 1st Dose</td>';
							  echo '<td>9 completed months-12 months.(can be given till 5 years of age)</td>';							  
							  echo '</tr>';
							  
							  echo '<tr>';
							  echo '<td>Vitamin A, 1st Dose</td>';
							  echo '<td>At 9 months with measles </td>';
							  echo '</tr>';
							  echo '</table>';
						}
				?>
			</p>
			
			<p>
				<?php if($row['age']>1 &&  $row['age']<=2)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';
							  
							echo '<tr>';
							  echo '<td>DPT 1st  booster</td>';
							  echo '<td>16-24 months</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>OPV Booster</td>';
							  echo '<td>16-24 months</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Measles 2nd  dose</td>';
							  echo '<td>16-24 months</td>';
							echo '</tr>';
							 
							echo '<tr>';
							  echo '<td>Vitamin A  (2nd to 9th dose)</td>';
							  echo '<td>16 months with DPT/OPV booster, then, one dose every 6 month up to the age of 5 years</td>';
							echo '</tr>';

							echo '</table>';
						}
				?>
			</p>
			<p>
				<?php if($row['age']>2 &&  $row['age']<=5)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>OPV Booster</td>';
							  echo '<td>till 5 years of age</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>DPT 2nd Booster</td>';
							  echo '<td>5-6 years</td>';
							echo '</tr>';

							echo '</table>';
						}
				?>
			</p>
			<p>
				<?php if($row['age']>5 &&  $row['age']<=10)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>DPT 2nd Booster</td>';
							  echo '<td>5-6 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Tetanus & adult Diphtheria(Td)</td>';
							  echo '<td>10 years</td>';
							echo '</tr>';
							echo '</table>';
						}
				?>
			</p>
			<p>
				<?php if($row['age']>10 &&  $row['age']<=16)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>Tetanus & adult Diphtheria(Td)</td>';
							  echo '<td>16 years</td>';
							echo '</tr>';
							echo '</table>';
						}
				?>
			</p>
			
			<p>
				<?php if($row['age']>=18 &&  $row['age']<=26)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>COVID-19 Vaccine</td>';
							  echo '<td>After 18 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Tetanus, Diphtheria, Pertusis</td>';
							  echo '<td>19-64 years(substitute one dose of Tdap for Td, then booster dose of Td once every 10 years till age of 64)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Human Papillomavirus</td>';
							  echo '<td>19-26 years (3 doses-females)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Varicella</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>MMR</td>';
							  echo '<td>19-26 years(1 or 2 doses)</td>';
							echo '</tr>';
							
							echo '<tr>';
							  echo '<td>Pneumococcal(*recommended if risk factor is present)</td>';
							  echo '<td>19-64 years(1 or 2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis A(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis B(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(3 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Meningococcal(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(1 or more doses)</td>';
							echo '</tr>';

							echo '</table>';
						}
				?>
			</p>
			<p>
				<?php if($row['age']>26 &&  $row['age']<=59)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>COVID-19 Vaccine</td>';
							  echo '<td>After 18 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Tetanus, Diphtheria, Pertusis</td>';
							  echo '<td>19-64 years(substitute one dose of Tdap for Td, then booster dose of Td once every 10 years till age of 64)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Varicella</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>MMR(*recommended if risk factor is present)</td>';
							  echo '<td>27-59 years(1 dose)</td>';
							echo '</tr>';
							
							echo '<tr>';
							  echo '<td>Influenza(*recommended if risk factor is present)</td>';
							  echo '<td>27-59 years(1 dose annually)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Pneumococcal(*recommended if risk factor is present)</td>';
							  echo '<td>19-64 years(1 or 2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis A(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis B(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(3 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Meningococcal(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(1 or more doses)</td>';
							echo '</tr>';

							echo '</table>';
						}
				?>
			</p>
			<p>
				<?php if($row['age']>59 &&  $row['age']<=64)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';

							echo '<tr>';
							  echo '<td>COVID-19 Vaccine</td>';
							  echo '<td>After 18 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Tetanus, Diphtheria, Pertusis</td>';
							  echo '<td>19-64 years(substitute one dose of Tdap for Td, then booster dose of Td once every 10 years till age of 64)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Varicella</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Zoster</td>';
							  echo '<td>60 to >=65 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Pneumococcal(*recommended if risk factor is present)</td>';
							  echo '<td>19-64 years(1 or 2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis A(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis B(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(3 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Meningococcal(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(1 or more doses)</td>';
							echo '</tr>';

							echo '</table>';
						}
				?>
			</p>

			<p>
				<?php if($row['age']>=65)
						{
							echo 'AVAILABLE VACCINES<br>';
							echo '<table class="styled-table">';
							echo '<thead>';
							echo '<tr>';
							  echo '<th>VACCINE</th>';
							  echo '<th>AGE</th>';
							echo '</tr>';
							echo '</thead>';
							
							echo '<tr>';
							  echo '<td>COVID-19 Vaccine</td>';
							  echo '<td>After 18 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Tetanus, Diphtheria, Pertusis</td>';
							  echo '<td>>=65 years( Td booster every 10 years)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Zoster</td>';
							  echo '<td>60 to >=65 years</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Varicella</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Pneumococcal(*recommended if risk factor is present)</td>';
							  echo '<td>>=65 years(1 dose)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis A(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(2 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Hepatitis B(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(3 doses)</td>';
							echo '</tr>';

							echo '<tr>';
							  echo '<td>Meningococcal(*recommended if risk factor is present)</td>';
							  echo '<td>After 18 years(1 or more doses)</td>';
							echo '</tr>';

							echo '</table>';
						}	
				?>
			</p>
			
			<p>
				<?php if($row['vaccine'] == "NULL")
					{
						echo '<label for="vaccine">Vaccines Taken : </label><br>';
						if($row['age']>=0 && $row['age']<=1)
						{
							echo '<input type="checkbox" id="BCG" name="vaccine[]" value="BCG">';
							echo '<label for="BCG">BCG</label>';
							
							echo '<input type="checkbox" id="Hepatitis B - Birth dose" name="vaccine[]" value="Hepatitis B - Birth dose">';
							echo '<label for="Hepatitis B - Birth dose">Hepatitis B - Birth dose</label>';
							
							echo '<input type="checkbox" id="OPV Birth dose" name="vaccine[]" value="OPV Birth dose">';
							echo '<label for="OPV Birth dose">OPV Birth dose</label>';
							
							echo '<input type="checkbox" id="OPV 1,2 & 3" name="vaccine[]" value="OPV 1,2 & 3">';
							echo '<label for="OPV 1,2 & 3">OPV 1,2 & 3</label>';
							
							echo '<input type="checkbox" id="Pentavalent 1,2 & 3" name="vaccine[]" value="Pentavalent 1,2 & 3">';
							echo '<label for="Pentavalent 1,2 & 3">Pentavalent 1,2 & 3</label>';
							
							echo '<input type="checkbox" id="IPV" name="vaccine[]" value="IPV">';
							echo '<label for="IPV">IPV</label>';
							
							echo '<input type="checkbox" id="Rota Virus" name="vaccine[]" value="Rota Virus">';
							echo '<label for="Rota Virus">Rota Virus</label>';
							
							echo '<input type="checkbox" id="Measles" name="vaccine[]" value="Measles">';
							echo '<label for="Measles">Measles</label>';

							echo '<input type="checkbox" id="Vitamin A" name="vaccine[]" value="Vitamin A">';
							echo '<label for="Vitamin A">Vitamin A</label>';
						}
						if($row['age']>1 && $row['age']<=2)
						{
							echo '<input type="checkbox" id="DPT 1st Booster" name="vaccine[]" value="DPT 1st Booster">';
							echo '<label for="DPT 1st Booster">DPT 1st Booster</label>';

							echo '<input type="checkbox" id="OPV Booster" name="vaccine[]" value="OPV Booster">';
							echo '<label for="OPV Booster">OPV Booster</label>';
							
							echo '<input type="checkbox" id="Measles" name="vaccine[]" value="Measles">';
							echo '<label for="Measles">Measles</label>';

							echo '<input type="checkbox" id="Vitamin A" name="vaccine[]" value="Vitamin A">';
							echo '<label for="Vitamin A">Vitamin A</label>';
						}
						if($row['age']>2 && $row['age']<=5)
						{
							echo '<input type="checkbox" id="OPV Booster" name="vaccine[]" value="OPV Booster">';
							echo '<label for="OPV Booster">OPV Booster</label>';

							echo '<input type="checkbox" id="DPT 2nd Booster" name="vaccine[]" value="DPT 2nd Booster">';
							echo '<label for="DPT 2nd Booster">DPT 2nd Booster</label>';
						}
						if($row['age']>5 && $row['age']<=10)
						{
							echo '<input type="checkbox" id="DPT 2nd Booster" name="vaccine[]" value="DPT 2nd Booster">';
							echo '<label for="DPT 2nd Booster">DPT 2nd Booster</label>';

							echo '<input type="checkbox" id="Tetanus & adult Diphtheria" name="vaccine[]" value="Tetanus & adult Diphtheria">';
							echo '<label for="Tetanus & adult Diphtheria">Tetanus & adult Diphtheria</label>';
						}
						if($row['age']>10 && $row['age']<=16)
						{
							echo '<input type="checkbox" id="Tetanus & adult Diphtheria" name="vaccine[]" value="Tetanus & adult Diphtheria">';
							echo '<label for="Tetanus & adult Diphtheria">Tetanus & adult Diphtheria</label>';
						}
						if($row['age']>=18 &&  $row['age']<=26)
						{
							echo '<input type="checkbox" id="COVID-19 Vaccine" name="vaccine[]" value="COVID-19 Vaccine">';
							echo '<label for="COVID-19 Vaccine">COVID-19 Vaccine</label>';
					
							echo '<input type="checkbox" id="Tetanus, Diphtheria, Pertusis" name="vaccine[]" value="Tetanus, Diphtheria, Pertusis">';
							echo '<label for="Tetanus, Diphtheria, Pertusis">Tetanus, Diphtheria, Pertusis</label>';

							echo '<input type="checkbox" id="Human Papillomavirus" name="vaccine[]" value="Human Papillomavirus">';
							echo '<label for="Human Papillomavirus">Human Papillomavirus</label>';

							echo '<input type="checkbox" id="Varicella" name="vaccine[]" value="Varicella">';
							echo '<label for="Varicella">Varicella</label>';

							echo '<input type="checkbox" id="MMR" name="vaccine[]" value="MMR">';
							echo '<label for="MMR">MMR</label>';

							echo '<input type="checkbox" id="Pneumococcal" name="vaccine[]" value="Pneumococcal">';
							echo '<label for="Pneumococcal">Pneumococcal</label>';

							echo '<input type="checkbox" id="Hepatitis A" name="vaccine[]" value="Hepatitis A">';
							echo '<label for="Hepatitis A">Hepatitis A</label>';

							echo '<input type="checkbox" id="Hepatitis B" name="vaccine[]" value="Hepatitis B">';
							echo '<label for="Hepatitis B">Hepatitis B</label>';

							echo '<input type="checkbox" id="Meningococcal" name="vaccine[]" value="Meningococcal">';
							echo '<label for="Meningococcal">Meningococcal</label>';	
						}
						if($row['age']>26 &&  $row['age']<=59)
						{
							echo '<input type="checkbox" id="COVID-19 Vaccine" name="vaccine[]" value="COVID-19 Vaccine">';
							echo '<label for="COVID-19 Vaccine">COVID-19 Vaccine</label>';
					
							echo '<input type="checkbox" id="Tetanus, Diphtheria, Pertusis" name="vaccine[]" value="Tetanus, Diphtheria, Pertusis">';
							echo '<label for="Tetanus, Diphtheria, Pertusis">Tetanus, Diphtheria, Pertusis</label>';

							echo '<input type="checkbox" id="Varicella" name="vaccine[]" value="Varicella">';
							echo '<label for="Varicella">Varicella</label>';

							echo '<input type="checkbox" id="MMR" name="vaccine[]" value="MMR">';
							echo '<label for="MMR">MMR</label>';

							echo '<input type="checkbox" id="Influenza" name="vaccine[]" value="Influenza">';
							echo '<label for="Influenza">Influenza</label>';

							echo '<input type="checkbox" id="Pneumococcal" name="vaccine[]" value="Pneumococcal">';
							echo '<label for="Pneumococcal">Pneumococcal</label>';

							echo '<input type="checkbox" id="Hepatitis A" name="vaccine[]" value="Hepatitis A">';
							echo '<label for="Hepatitis A">Hepatitis A</label>';

							echo '<input type="checkbox" id="Hepatitis B" name="vaccine[]" value="Hepatitis B">';
							echo '<label for="Hepatitis B">Hepatitis B</label>';

							echo '<input type="checkbox" id="Meningococcal" name="vaccine[]" value="Meningococcal">';
							echo '<label for="Meningococcal">Meningococcal</label>';	
						}
						if($row['age']>59 &&  $row['age']<=64)
						{
							echo '<input type="checkbox" id="COVID-19 Vaccine" name="vaccine[]" value="COVID-19 Vaccine">';
							echo '<label for="COVID-19 Vaccine">COVID-19 Vaccine</label>';
					
							echo '<input type="checkbox" id="Tetanus, Diphtheria, Pertusis" name="vaccine[]" value="Tetanus, Diphtheria, Pertusis">';
							echo '<label for="Tetanus, Diphtheria, Pertusis">Tetanus, Diphtheria, Pertusis</label>';

							echo '<input type="checkbox" id="Varicella" name="vaccine[]" value="Varicella">';
							echo '<label for="Varicella">Varicella</label>';

							echo '<input type="checkbox" id="MMR" name="vaccine[]" value="MMR">';
							echo '<label for="MMR">MMR</label>';

							echo '<input type="checkbox" id="Zoster" name="vaccine[]" value="Zoster">';
							echo '<label for="Zoster">Zoster</label>';

							echo '<input type="checkbox" id="Pneumococcal" name="vaccine[]" value="Pneumococcal">';
							echo '<label for="Pneumococcal">Pneumococcal</label>';

							echo '<input type="checkbox" id="Hepatitis A" name="vaccine[]" value="Hepatitis A">';
							echo '<label for="Hepatitis A">Hepatitis A</label>';

							echo '<input type="checkbox" id="Hepatitis B" name="vaccine[]" value="Hepatitis B">';
							echo '<label for="Hepatitis B">Hepatitis B</label>';

							echo '<input type="checkbox" id="Meningococcal" name="vaccine[]" value="Meningococcal">';
							echo '<label for="Meningococcal">Meningococcal</label>';	
						}
						if($row['age']>=65)
						{
							echo '<input type="checkbox" id="COVID-19 Vaccine" name="vaccine[]" value="COVID-19 Vaccine">';
							echo '<label for="COVID-19 Vaccine">COVID-19 Vaccine</label>';
					
							echo '<input type="checkbox" id="Tetanus, Diphtheria, Pertusis" name="vaccine[]" value="Tetanus, Diphtheria, Pertusis">';
							echo '<label for="Tetanus, Diphtheria, Pertusis">Tetanus, Diphtheria, Pertusis</label>';

							echo '<input type="checkbox" id="Varicella" name="vaccine[]" value="Varicella">';
							echo '<label for="Varicella">Varicella</label>';

							echo '<input type="checkbox" id="MMR" name="vaccine[]" value="MMR">';
							echo '<label for="MMR">MMR</label>';

							echo '<input type="checkbox" id="Zoster" name="vaccine[]" value="Zoster">';
							echo '<label for="Zoster">Zoster</label>';

							echo '<input type="checkbox" id="Pneumococcal" name="vaccine[]" value="Pneumococcal">';
							echo '<label for="Pneumococcal">Pneumococcal</label>';

							echo '<input type="checkbox" id="Hepatitis A" name="vaccine[]" value="Hepatitis A">';
							echo '<label for="Hepatitis A">Hepatitis A</label>';

							echo '<input type="checkbox" id="Hepatitis B" name="vaccine[]" value="Hepatitis B">';
							echo '<label for="Hepatitis B">Hepatitis B</label>';

							echo '<input type="checkbox" id="Meningococcal" name="vaccine[]" value="Meningococcal">';
							echo '<label for="Meningococcal">Meningococcal</label>';	
						}
					}
					else
					{
						echo "Vaccines Taken : ".$row['vaccine'];
					}
				?>	
			</p>
			<p>
			Set Reminder
			</p>
			<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKolkata&amp;src=ZTdibWxmMXE2amtjbmJjbW5nNjZ1bjY1dGdAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23B39DDB" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
			<p></p>
            <p>
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
			</p>

			<p>
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
			</p><br>

			
					

			<div class="local">
        		<button type="submit" name="save_health_info">Submit</button>
            </div>
        </form>

            <form action="filesLogic.php" method="POST" enctype="multipart/form-data">
            	<p>
				    <?php if($row['doc1'] == "NULL")
				        {
				        	echo '<label for="myfile">Upload document for verification : </label>
				                   <input type="file" name="myfile">
          						   <button type="submit" name="save">Upload</button>';
				        }
				        else
				        {
				        	//echo "Height : ".$row['height']." cms";
				        }
				?>

			</p>
            </form> 

	</div>
</div>
</body>
</html>
