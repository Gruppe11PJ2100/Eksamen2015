<!--
	Index Template - Olaipai
	facebook.com/olaipai | @olaipai
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
		$name = $email = $day =  "";

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

			echo "<br>" . $prosjektor;

			$sql = "SELECT * FROM $day";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {

    				$id = $row["id"];

    				if($row["is_free"] == 'true' && $row["antall_medlemmer"] == $selected_radio && $row["prosjektor"] == $prosjektor){

    					$update = "UPDATE $day SET email='$email', is_free='false' where id=$id";

    					if ($conn->query($update) === TRUE) {
    						echo "New record created successfully";
						} else {
    						echo "Error: " . $update . "<br>" . $conn->error;
						}
						break;
    				}
    			}

			} else {
 		  		 echo "0 results";
			}
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
					<!--	<a href="#confirm" class="icon fa-database"><span>Bekreft</span></a>
						<a href="#" class="icon fa-check-circle-o"><span> Bekreftet</span></a>-->
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
									<img src="images/logo.jpg" height="600" width="850" alt="" />
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
									Phasellus enim sapien, blandit ullamcorper elementum eu, condimentum eu elit. 
									Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia 
									luctus elit eget interdum.
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
        									<input type="checkbox" name="day" value="mon" id="monday">
										</div>
										<div class="2u">
										<label for="tuesday">Tirsdag</label>
        									<input type="checkbox" name="day" value="tue" id="tuesday">
										</div>
										<div class="2u">
										<label for="wednesday">Onsdag</label>
        									<input type="checkbox" name="day" value="wed" id="wednesday">
        									</div>
        								<div class="2u">
										<label for="thursday">Torsdag</label> 
        									<input type="checkbox" name="day" value="thu" id="thursday">	
											</div>
										<div class="2u">
        								<label for="friday">Fredag</label>		
        									<input type="checkbox" name="day" value="fri" id="friday">	
											</div>
										</div>
										
									
									<div class="row">
										<div class="12u">
 										  Rom med prosjektor? 
 										  <p>
  											<input type="radio" name="prosjektor" value="true"> Ja 
  											&nbsp;
  										 	<input type="radio" name="prosjektor" value="false"> Nei 
        									<p>
									</div>
										<div class="row.uniform ">
											<div class="9u">
												<input type="text" name="name" placeholder="Navn" />
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
						<!--	<article id="confirm" class="panel">
								<header>
									<h2>Bekreft rom reservasjon</h2>
								</header> Fyll inn under
								<form action="../form.php" method="post">
									<div>
										<div class="row">
											<div class="6u">
												<input type="text" name="name" placeholder="Navn" />
											</div>
											<div class="6u">
												<input type="email" name="email" placeholder="Elektronisk Mail" />
											</div>
										</div>
										<div class="row">
										</div>
										<div class="row">
										</div>
										<div class="row">
											<div class="12u">
												<input type="submit" value="Bekreft" />
											</div>
										</div>
									</div>
								</form>
							</article>
-->
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

