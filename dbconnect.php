<?php

$dblink = mysqli_connect('localhost', 'root','', 'phpopdracht');

		if(!$dblink) {
			die("Connection Error: " . mysqli_connect_error());
		}

?>		