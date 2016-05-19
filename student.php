<?php
		require 'dbconnect.php';

			class student{
				public $id;
				public $studentnumber;
				public $firstname;
				public $prefix;
				public $lastname;
				public $address;
				public $postalcode;
				public $city;
				public $email;

				public function __construct($fn, $pf, $ln, $add, $zp, $ct, $em, $sn){
					$this->studentnumber = $sn;
					$this->firstname = $fn;
					$this->prefix = $pf;
					$this->lastname = $ln;
					$this->address = $add;
					$this->postalcode = $zp;
					$this->city = $ct;
					$this->email = $em;
				}

				//Example
				//Tristan de Jager (99032512)

				public function ToStringDisplayName(){
					return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . ' ' . '(' . $this->studentnumber . ')';
				}


				//Example
				//Tristan de Jager
				//Kerkbuurt 24
				//3361BJ Sliedrecht

				public function ToStringAddress(){
					return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . PHP_EOL . $this->address . PHP_EOL . $this->postalcode . ' ' . $this->city;
				}

				//Example
				//Tristan de Jager <info@tristandejager.com>

				public function ToStringEmail(){
					return $this->firstname . ' ' . $this->prefix . ' ' . $this->lastname . ' ' . '&lt;' . $this->email . '&gt;';
				}

				public function SaveToDB($dblink){
					$result = mysqli_query($dblink, "SELECT * FROM students WHERE studentnumber = $this->studentnumber");
					
			        $num_rows = mysqli_num_rows($result);
			        if ($num_rows > 0){
			            $sql = "UPDATE students SET firstname='$this->firstname', prefix='$this->prefix', lastname='$this->lastname', address='$this->address', postalcode='$this->postalcode', city='$this->city', email='$this->email' WHERE studentnumber = $this->studentnumber;";
			            if ($dblink->query($sql) === TRUE){
			                header ('location: /PHPoefening/php_opdracht.php?updated');
			            }else{
			                echo "Error: " . $sql . "<br>" . $dblink->error;
			            }
			        }else{
					$sql = "INSERT INTO students (firstname, prefix, lastname, address, postalcode, city, email, studentnumber) VALUES ('$this->firstname', '$this->prefix', '$this->lastname', '$this->address', '$this->postalcode', '$this->city', '$this->email', '$this->studentnumber')";
					if($dblink->query($sql) === TRUE){
						$last_id = $dblink->insert_id;
						header('location: /PHPoefening/php_opdracht.php?true&id=' . $last_id);
					}

					else{
						echo "Error: " . $sql . "<br>" . $dblink->error;
					}
				}
				}

			} //end class Student

			if(isset($_POST["submit"])){
				$fn = $_POST["firstname"];
				$pf = $_POST["prefix"];
				$ln = $_POST["lastname"];
				$add = $_POST["address"];
				$zp = $_POST["zipcode"];
				$ct = $_POST["city"];
				$em = $_POST["email"];
				$sn = $_POST["studentnumber"];

				$s1 = new student($fn, $pf, $ln, $add, $zp, $ct, $em, $sn);
				$s1->SaveToDB($dblink);
			}

			

	$dblink->close();

?>