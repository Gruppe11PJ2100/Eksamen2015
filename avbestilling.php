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

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav 
					<nav id="nav">
						<a href="#main" class="icon fa-home active"><span>Hjem</span></a>
					</nav> -->

				<!-- Main -->
					<div id="main">
						
						<!-- Home -->
							<article id="Qreservation" class="panel">
							<div class="row.uniform ">
								<div class="9u">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<h2>Avbestilling</h2>
										<br>
									
										<input type="email" name="email" placeholder="Westerdals-email" class="nameEmail" required/>
										<br>
										
										<input type="text" name="romID" placeholder="Rom Nr." class="nameEmail" required>
										<br>
										
										<input type="text" name="day"  placeholder="Dag" class="nameEmail" required>
										<br>
										
										<input type="submit" name="submit" value="Bekreft"> 
									</form>
								</div>
							</div>
						</article>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; PJ1201 2015</li><li>
						</ul>
					</div>
	
			</div>
	</body>

</html>

<?php 

	require 'php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = test_input($_POST["email"]);
   $rom = test_input($_POST["romID"]);
   $day = test_input($_POST["day"]);


}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if (isset($_POST['submit'])){
	$sql = "UPDATE $day SET email='', is_free='true' WHERE id=$rom AND email='$email';";

	if ($conn->query($sql) === TRUE) {
    	echo '<script type="text/javascript">alert("Reservasjon Avbestillt");</script>';

	} else {
    	echo "Error: Du satt inn noe ugyldig";
	}
}

?>