<?php
	require 'dbconnect.php';

	if(isset($_GET['true'])){
		
    	echo "<script>alert('New student added. The given ID = " . $_GET["id"] . "')</script>";
	}

	if(isset($_GET['updated'])){
		
    	echo "<script>alert('Student updated')</script>";

	}
?>		

<html>
	<head>

		<title>Php Opdracht</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="UTF-8">
		<link rel="icon" href="favicon.png" type="image/x-icon"/>

	</head>

	<body>

		<div class="wrapper">
			
			<h1>Php form</h1>
			<h2>This is a simple PHP form</h2>

				<div class="form">

					<form method="post" action="student.php">
					  <label>First name:</label><br>
					  <input type="text" name="firstname"><br>
					  <label>Prefix:</label><br>
					  <input type="text" name="prefix">
					  <br><label>Last name:</label><br>
					  <input type="text" name="lastname">
					  <br><label>Address:</label><br>
					  <input type="text" name="address">
					  <br><label>Zipcode:</label><br>
					  <input type="text" name="zipcode">
					  <br><label>City:</label><br>
					  <input type="text" name="city">
					  <br><label>Email:</label><br>
					  <input type="text" name="email">
					  <br><label>Studentnumber:</label><br>
					  <input type="text" name="studentnumber">
					  <br>
					  <br>
					  <input type="submit" value="Submit" name="submit">
					</form>
				</div>	
			</div>

			<div class='footer'>

				<p class='footer_text'>©Tristan de Jager 2016  |</p>
				<a class='footer_link' target=_blank href="http://Tristandejager.com">More info...</a>

			</div>

	</body>

</html>	