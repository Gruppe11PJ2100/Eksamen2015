<!DOCTYPE HTML>

<html>
	<head>

		<title>WOACT Romreservasjon</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>

		<noscript>
		<!-- Calendar -->
		
    	<!-- Basics -->	
    		<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

		<?php 

		setcookie("perfect_match", 0, time() +  60 * 60 * 24, "/");
		setcookie("found_a_match", 0, time() +  60 * 60 * 24, "/");

		
		?>
	</head>
	<body>

		<?php

		// Commented out the echo, used for debugging only

		// define variables and set to empty values
		$name = $email = $day = $id = $id2 = $amount = "";

		$prosjektor = "false";

		$invalid;
		$perfect_match = null;
		$found_a_match = false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
   			$name = test_input($_POST["name"]);
   			$email = test_input($_POST["email"]);
   			$selected_radio = $_POST["members"];
			$day = test_input($_POST["day"]);
			if(isset($_POST["prosjektor"]))
				$prosjektor = test_input($_POST["prosjektor"]);

		}



		function test_input($data) {
 			$data = trim($data);
  			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

		require 'php/config.php';
		
		if (isset($_POST['submit'])){

			setcookie("name", $name, time() +  60 * 60 * 24, "/");
			setcookie("email", $email, time() +  60 * 60 * 24, "/");
			setcookie("members", $selected_radio, time() +  60 * 60 * 24, "/");
			setcookie("day", $day, time() +  60 * 60 * 24, "/");
			setcookie("prosjektor", $prosjektor, time() +  60 * 60 * 24, "/");

			if (!isset($_COOKIE["prosjektor"])){
				setcookie("prosjektor", "false", time() + 60 * 60 * 24, "/");
			} 


			/* Siden vi valkte å ha alle studentmailer i en database trenger vi ikke denne inserten.
			$sql = "INSERT INTO email
				VALUES ('$email', '$name')";
			if ($conn->query($sql) === TRUE) {
    			//echo "New record created successfully";
			} else {
    			//echo "Error: " . $sql . "<br>" . $conn->error;
			}	
			*/

			$sql2 = "SELECT email FROM $day WHERE email='$email';";
			$res = mysqli_query($conn, $sql2);
			//echo "" . $sql2 ."    ------    ". mysqli_num_rows($res);
			if(mysqli_num_rows($res) < 1){
				$allready_ordered = false;
				
			} else {
				$allready_ordered = true;

			}

			$sql3 = "SELECT email FROM email WHERE email='$email'";
			$result3 = mysqli_query($conn, $sql3);

			if(mysqli_num_rows($result3) == 1){
				$invalid = false;

			} else {
				$invalid = true;

			}

			//echo "invalid: " . $invalid;

			$sql = "SELECT * FROM $day ORDER BY antall";
			$result = mysqli_query($conn, $sql);


			if (mysqli_num_rows($result) > 0 && !$allready_ordered && !$invalid) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {

    				$id = $row["id"];

    				if($row["is_free"] == 'true' && $row["antall"] == $selected_radio && $row["prosjektor"] == $prosjektor){

    					$update = "UPDATE $day SET email='$email', is_free='false' where id=$id AND '$email' IN (SELECT email FROM email WHERE email='$email'); ";

    					if ($conn->query($update) === TRUE) {
    						//echo "New record created successfully perfect_match";
    						$perfect_match = true;
    						$found_a_match = true;

						} else {
    						//echo "Error: " . $update . "<br>" . $conn->error;
						}

						break;

    				} else  {
    					$perfect_match = false;
    				}

    			}

    			$newSql = "SELECT * FROM $day ORDER BY antall";
    			$result = $conn->query($newSql);

    			if($perfect_match == false){

    				while($row = $result->fetch_assoc()){

    					$amount = $row["antall"];

    					$id2 = $row["id"];

    					if($prosjektor == "false"){ // If the small rooms are filled but not the bigger ones

    						if($row["is_free"] == 'true' && $row["antall"] >= $selected_radio && !$perfect_match){

    							$update2 = "UPDATE $day SET email='$email', is_free='false' where id=$id2 AND '$email' IN (SELECT email FROM email WHERE email='$email'); ";

    							if ($conn->query($update2) === TRUE) {
    								//echo "<br>New record created successfully med et annet antall";
    								$found_a_match = true;

								} else {
    								//echo "Error: " . $update2 . "<br>" . $conn->error;
								}
								break;
    						}

	    				} else { // If the small rooms are filled but not the bigger ones, and you need a prosjektor

	    					if($row["is_free"] == 'true' && $row["antall"] >= $selected_radio && !$perfect_match && $row["prosjektor"] == $prosjektor){

	    						//echo "must have prosjektor";

    							$update2 = "UPDATE $day SET email='$email', is_free='false' where id=$id2 AND '$email' IN(SELECT email FROM email WHERE email='$email'); ";

    							if ($conn->query($update2) === TRUE) {
    								//echo "<br>New record created successfully med prosjektor";
    								$found_a_match = true;

								} else {
    								echo "Error: " . $update2 . "<br>" . $conn->error;
								}
								break;
	    					}

	    				}

    				}
    			}
			} else {
 		  		 //echo '<script type="text/javascript">alert("Ops noe gikk galt under reservasjonen, Feil Email eller Allerede bestillt i dag");</script>';
 			}

// START mailing part of the script
$takk = $dittrom1 = $dittrom2 = $default = "";
$takk = "Takk for din reservasjon " . $name;

if($perfect_match && $found_a_match){

		$dittrom1 = "Ditt rom: " . $id . " er reservert på " . $day . "<br>";
		setcookie("id", $id, time() +  60 * 60 * 24, "/");
		setcookie("perfect_match", true, time() +  60 * 60 * 24, "/");

	} else if(!$perfect_match && $found_a_match){

		$dittrom2 = "Ditt rom: " . $id2 . " er reservert på " . $day . "<br>";
		setcookie("id2", $id2, time() +  60 * 60 * 24, "/");
		setcookie("found_a_match", true, time() +  60 * 60 * 24, "/");

	} else {

		$default = "Ingen ledige rom denne dagen med deres spesifikasjoner beklager. RESERVASJON BLE IKKE FULLFØRT<br>";
}


require 'PHPMailer5/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                     	// Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               	// Enable SMTP authentication
$mail->Username = 'gruppe11pj2100@gmail.com';           // SMTP username
$mail->Password = '&%{I952T/1~=9@e';                    // SMTP password
$mail->SMTPSecure = 'ssl';                              // Enable ssl encryption
$mail->Port = 465;                                      // TCP port to connect to
$mail->From = 'gruppe11pj2100@gmail.com';
$mail->FromName = 'Westerdals';
$mail->addAddress($email, $name);  // Add a recipient
$mail->addAddress('gruppe11pj2100@gmail.com');               // Name is optional
$mail->addReplyTo('gruppe11pj2100@gmail.com', 'Information');
$mail->addCC('gruppe11pj2100@gmail.com');
$mail->addBCC('gruppe11pj2100@gmail.com');

$mail->isHTML(true);

$mail->Subject = "Takk for din reservasjon " . $name;
$mail->Body    = "" . $default . $dittrom1 . $dittrom2 . "<br>Hvis du vil kanselere din reservasjon gå 
							til denne siden <a href=\"localhost/avbestilling.php\">avbestilling</a>" ;


if(!$allready_ordered && !$invalid && $found_a_match){

	if(!$mail->send()) {
   	 	echo 'Message could not be sent.';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo "Melding Sendt";
}

	header('Location: #confirm');  //Redirect to recipt

} else {

	echo '<script type="text/javascript">alert("Ops noe gikk galt under reservasjonen, Feil Email eller Allerede bestillt i dag");</script>';

}
	
} // curly bracket from the if submitt button.

	
		$conn->close();	


?>

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav 
					<nav id="nav">
						<a href="#home" class="icon fa-home active"><span>Hjem</span></a>
						<a href="#Qreservation" class="icon fa-cubes"><span> Hurting Reservasjon</span></a>
					</nav>-->

				<!-- Main -->
					<div id="main">
						
						<!-- Home -->
							<article id="home" class="panel">
								<header>
									<div class="mainNav">
										<img src="images/WACT_svart_rgb.svg" height="200" width="200" alt="Westerdals Logo">
							 		</div>
								</header>
								
								<div class="mainNav buttons">
									<a href="#Qreservation" class="jumplink"><div class ="button"> Hurtigreservasjon </div></a>
									<a href="avbestilling.php" class="jumplink"><div class ="button buttonRed"> Avbestilling </div></a>
								</div>
								
							</article>
	
						<!-- reservation --> 
							<article id="Qreservation" class="panel">
								<header>

									<div class="mainNav">
										<a href="#home" class="jumplink pic"><img src="images/WACT_svart_rgb.svg" height="200" width="200" alt="Westerdals Logo" title="Tilbake til hovedmenyen"/></a>
							 		</div>

								</header>
								
								<section>

								<!-- Medlemsvelger -->
								<h2>Hurigreservasjon</h2>
								<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									<h3>Hvor mange er dere?</h3>
									<div class="seperator blue"></div>
									<div class="row">

										<div class="4u">
											<input type="radio" name="members" value="2" id="member-1" class="member-input" checked>
       										<label for="member-1" class="member-label two">2</label>
										</div>
										
										<div class="4u">
											<input type="radio" name="members" value="3" id="member-2" class="member-input">
        									<label for="member-2" class="member-label three">3</label>
										</div>
										
										<div class="4u">
											<input type="radio" name="members" value="4" id="member-3" class="member-input">
        									<label for="member-3" class="member-label four">4</label>
										</div>

									</div>

									<!-- Ukedagvelger -->
									<h3>Hvilken dag?</h3>
									<div class="seperator purple"></div>
									<div class="row">

										<div class="2u">
											<input type="radio" name="day" id="monday" value="Mandag" class="week-input" checked>
											<label for="monday" class="week-label">Mandag</label>
										</div>

										<div class="2u">
											<input type="radio" name="day" id="tuesday" value="Tirsdag" class="week-input">
											<label for="tuesday" class="week-label">Tirsdag</label>
										</div>

										<div class="2u">
											<input type="radio" name="day" id="wednesday" value="Onsdag" class="week-input">
											<label for="wednesday" class="week-label">Onsdag</label>
        								</div>

        								<div class="2u">
        									<input type="radio" name="day" id="thursday" value="Torsdag" class="week-input">	
											<label for="thursday" class="week-label">Torsdag</label> 
        								</div>

										<div class="2u">
											<input type="radio" name="day" id="friday" value="Fredag" class="week-input">	
        									<label for="friday" class="week-label">Fredag</label>		
        								</div>

        								<div class="4u">
										
  											<input type="checkbox" name="prosjektor" id="projector" value="true" class="projector-input"> 
  										 	<label for="projector" class="projector-label"></label>
        								
        								</div>

        									<span class ="projectorTekst">Vi trenger prosjektor.</span>

									</div>
										
									<!-- Prosjektor -->
									<h3>Hvem reserverer?</h3>
									<div class="seperator yellow"></div>

										<div class="row.uniform ">
											<div class="9u">
												<input type="text" name="name" class="nameEmail" placeholder="Navn" required />
												<input type="email" name="email" class="nameEmail" placeholder="Din Westerdals-epost" required />
												&nbsp;
												<div class="5u">
													
													<input type='submit' name='submit' value="Bekreft" /> 
													
												</div>

											</div>

										</div>

								</section>
							</article>
						<!-- confirm -->
							<article id="confirm" class="panel">
								<header>

									<div class="mainNav">
										<a href="index.php" class="jumplink pic"><img src="images/WACT_svart_rgb.svg" height="200" width="200" alt="Westerdals Logo" title="Tilbake til hovedmenyen"/></a>
							 		</div>

									<h2>Kvittering</h2>
								</header> 


									<div>

										<div class="row">
											<div class="6u"> 
												<p> Navn: </p>
												<?php echo "" . $_COOKIE["name"]; ?>
												</div>
											</div>
										<div class="row">
											<div class="6u">
												<p> Medlemmer: </p>
												<?php echo "" . $_COOKIE["members"]; ?>
												</div>
										</div>
										<div class="row">
											<div class="6u"> 
												<p> Rom nr: </p>
												<?php 
												if($_COOKIE["perfect_match"] == true){

													echo "" . $_COOKIE["id"];

													} else if($_COOKIE["found_a_match"] == true){

														echo "" . $_COOKIE["id2"];

												} else {
													echo "Ingen ledige rom denne dagen med deres spesifikasjoner beklager. RESERVASJON BLE IKKE FULLFØRT.";
												}

												 ?>
												</div>
											</div>
										<div class="row">
										<div class="6u">
												<p> Hvilke dager: </p>
												<?php echo "" .$_COOKIE["day"]; ?>
											</div>
										</div>
										<div class="row">
											<div class="6u">

												<p> Prosjektor: </p>
												<?php 

												if (isset($_COOKIE["prosjektor"])) 
													echo "" . $_COOKIE["prosjektor"];
												else 
													echo "" . $prosjektor;
												?>
												</div>
										</div>
										<div class="row">
											<div class="6u"> 
												<p>Epost sendt til: </p>
												<?php echo "" . $_COOKIE["email"]; ?>
												</div>
										</div>
										<div class="row">
												</div>
										</div>
									</div>
							</article>
					</div>
				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li style="color: black">&copy; PJ2100 2015</li><li>
						</ul>
					</div>
	
			</div>
	</body>

</html>

