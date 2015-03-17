<!--
	Index Template - Olaipai
	facebook.com/olaipai | @olaipai
	edvinpai too
-->

<!DOCTYPE HTML>

<html>
	<head>
		<title>Westerdals WOACT Rom Reservasjon</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<!-- Calendar -->
			<link href="css/fullcalendar.css" rel='stylesheet' />
			<link href="js/lang-all.js">
			<link href="css/fullcalendar.print.css" rel='stylesheet' media='print' />
		<script src="js/calendar/jquery.min.js"></script>
		<script src="js/moment.min.js"></script>
		<script src="js/fullcalendar.min.js"></script>
		<script>
				$(document).ready(function() {
   				 $('#calendar').fullCalendar({

      				weekends: false,
      				editable: true,
      				dayClick: function(date, jsEvent, view) {
        		alert('Du har valgt '  +  date.format());
        		$(this).css('background-color', 'green');

    }
    			})
			});
</script>
		<noscript>
		<!-- Calendar -->
		
    	<!-- Basics -->	
    		<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>


		<?php

		// define variables and set to empty values
		$name = $email = $day = $id = $id2 = $amount = $prosjektor = "";

		$perfect_match = null;
		$found_a_match = false;


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
   			$name = test_input($_POST["name"]);
   			$email = test_input($_POST["email"]);
   			$selected_radio = $_POST['members'];
			$day = test_input($_POST["day"]);
			$prosjektor = $_POST["prosjektor"];


		}

		function test_input($data) {
 			$data = trim($data);
  			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

		require 'php/config.php';
		
		if (isset($_POST['submit'])){

			$sql = "INSERT INTO email
				VALUES ('$email', '$name')";
	

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}	

			echo "<br>" . $prosjektor . $selected_radio . $day . $email;

			$sql = "SELECT * FROM $day ORDER BY antall";
			$result = mysqli_query($conn, $sql);


			if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {

    				$id = $row["id"];

    				if($row["is_free"] == 'true' && $row["antall"] == $selected_radio && $row["prosjektor"] == $prosjektor){

    					$update = "UPDATE $day SET email='$email', is_free='false' where id=$id";

    					if ($conn->query($update) === TRUE) {
    						echo "New record created successfully perfect_match";
    						$perfect_match = true;
    						$found_a_match = true;

						} else {
    						echo "Error: " . $update . "<br>" . $conn->error;
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

    					if($prosjektor == "false"){

    						if($row["is_free"] == 'true' && $row["antall"] >= $selected_radio && !$perfect_match){

    							$update2 = "UPDATE $day SET email='$email', is_free='false' where id=$id2";

    							if ($conn->query($update2) === TRUE) {
    								echo "<br>New record created successfully med et annet antall";
    								$found_a_match = true;

								} else {
    								echo "Error: " . $update2 . "<br>" . $conn->error;
								}
								break;
    						}

	    				} else {

	    					if($row["is_free"] == 'true' && $row["antall"] >= $selected_radio && !$perfect_match && $row["prosjektor"] == $prosjektor){

	    						echo "must have prosjektor";

    							$update2 = "UPDATE $day SET email='$email', is_free='false' where id=$id2";

    							if ($conn->query($update2) === TRUE) {
    								echo "<br>New record created successfully med prosjektor";
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
 		  		 echo "0 results";
			}
		}

 // START mailing part of the script
$takk = $dittrom1 = $dittrom2 = $default = "";

$takk = "Takk for din reservasjon " . $name . "<br>";

	if($perfect_match && $found_a_match){
		$dittrom1 = "Ditt rom: " . $id . " er reservert på " . $day . "<br>";

	} else if(!$perfect_match && $found_a_match){
		$dittrom2 = "Ditt rom: " . $id2 . " er reservert på " . $day . "<br>";

	} else {
		$default = "Ingen ledige rom med deres spesifikasjoner<br>";

												}

require 'PHPMailer5/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.google.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gruppe11pj2100@gmail.com';                 // SMTP username
$mail->Password = '&%{I952T/1~=9@e';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'gruppe11pj2100@gmail.com';
$mail->FromName = 'Westerdals';
$mail->addAddress('gruppe11pj2100@gmail.com', 'Test User');     // Add a recipient
$mail->addAddress('gruppe11pj2100@gmail.com');               // Name is optional
$mail->addReplyTo('gruppe11pj2100@gmail.com', 'Information');
$mail->addCC('gruppe11pj2100@gmail.com');
$mail->addBCC('gruppe11pj2100@gmail.com');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Takk for din reservasjon " . $name . "<br>";
$mail->Body    = "" . $default . $dittrom1 . $dittrom2;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

		$conn->close();	


	?>

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav -->
					<nav id="nav">
						<a href="#main" class="icon fa-home active"><span>Hjem</span></a>
						<a href="#reservation" class="icon fa-laptop"><span>Reservasjon</span></a>
						<a href="#Qreservation" class="icon fa-cubes"><span> Hurting Reservasjon</span></a>
						<a href="#confirm" class="icon fa-database"><span>Bekreft</span></a>
						<!--<a href="#" class="icon fa-check-circle-o"><span> Bekreftet</span></a>-->
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Home -->
							<article id="main" class="panel">
								<header>
									<h1>Velkommen</h1>
									<p>Rom reservasjon</p>
								</header>
								<a href="#reservation" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>Reservasjon</span></span>

								</a>
								<br/>
								
									
								<a href="#Qreservation" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span> Hurtig Reservasjon</span>
									<img src="/images/logo.jpg" height="600" width="850" alt="" />

								</a>
								
							</article>

						<!-- quick reservation -->
						
							<article id="reservation" class="panel">
							<header>
								<h2> Reservasjon </h2>
								<br>
								<h4>Velg datoen under ved å klikke for rom reservasjon den dagen</h4>
							</header>
									<div id='calendar'></div>
							</article>	
						<!-- reservation --> 
							<article id="Qreservation" class="panel">
								<header>
									<h2>Hurtig Reservasjon</h2>
								</header>
								<p>
									Velg antall medlemmer og hvilken dag dere vil ha grupperom, eventuellt prosjektor hvis dere trenger det.
								</p>
								<section>
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
									<div class="row">
										<div class="4u">
										<input type="radio" name="members" value="2" id="member-1" class="member-input" checked>
       										<label for="member-1" class="member-label">2 medlemmer</label>
										</div>
										
										<div class="4u">
										<input type="radio" name="members" value="3" id="member-2" class="member-input">
        									<label for="member-2" class="member-label">3 medlemmer</label>
										</div>
										
										<div class="4u">
										<input type="radio" name="members" value="4" id="member-3" class="member-input">
        									<label for="member-3" class="member-label first">4 medlemmer</label>
										</div>
									</div>
									<div class="row">
										<div class="2u">
										<label for="monday">Mandag</label>
        									<input type="radio" name="day" value="mon" id="monday" checked>
										</div>
										<div class="2u">
										<label for="tuesday">Tirsdag</label>
        									<input type="radio" name="day" value="tue" id="tuesday">
										</div>
										<div class="2u">
										<label for="wednesday">Onsdag</label>
        									<input type="radio" name="day" value="wed" id="wednesday">
        									</div>
        								<div class="2u">
										<label for="thursday">Torsdag</label> 
        									<input type="radio" name="day" value="thu" id="thursday">	
											</div>
										<div class="2u">
        								<label for="friday">Fredag</label>		
        									<input type="radio" name="day" value="fri" id="friday">	
											</div>
										</div>
										
									
									<div class="row">
										<div class="12u">
 										  Rom med prosjektor? 
 										  <p>
  											<input type="radio" name="prosjektor" value="true"> Ja 
  											&nbsp;
  										 	<input type="radio" name="prosjektor" value="false" checked> Nei 
        									<p>
									</div>
										<div class="row.uniform ">
											<div class="9u">
												Navn:
												<input type="text" name="name" placeholder="Navn" />
												Email:
												<input type="email" name="email" placeholder="Elektronisk Mail" />
												&nbsp;
											<div class="5u">
												<input type="submit" name="submit" value="Bekreft" />												
											</div>
										
										</div>
									</form>
								</section>
							</article>

						<!-- confirm -->
						<article id="confirm" class="panel">
								<header>
									<h2>Bekreft rom reservasjon</h2>
								</header> Din reservasjon
									<div>
										<div class="row">
											<div class="6u">
												<?php 

												echo $takk;

												if($perfect_match && $found_a_match){
													echo $dittrom1;

												} else if(!$perfect_match && $found_a_match){
													echo $dittrom2;

												} else {
													echo $default;

												}
												echo "Email sendt til: " . $email . "<br>";


												?>



											</div>
											<div class="6u">
												
											</div>
										</div>
										<div class="row">
										</div>
										<div class="row">
										</div>
										<div class="row">
											<div class="12u">
												
											</div>
										</div>
									</div>
							</article>
					</div>
				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; PJ1201 2015</li><li>
						</ul>
					</div>
	
			</div<
	</body>

</html>

