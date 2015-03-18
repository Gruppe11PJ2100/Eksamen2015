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
				
				<!-- Nav -->
					<nav id="nav">
						<a href="#main" class="icon fa-home active"><span>Hjem</span></a>
						
						<a href="#Qreservation" class="icon fa-cubes"><span> Hurting Reservasjon</span></a>
					<a href="#confirm" class="icon fa-check-circle-o"><span>Bekreft</span></a>
						
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Home -->
							<article id="Qreservation" class="panel">
							<div class="row.uniform ">
								<div class="9u">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
										<h1>Avbestillings skjema, fyll inn.</h1><br>
										Email:
										<input type="email" name="email" placeholder="Elektronisk Mail" required/>
										<br>
										Rom nr:
										<input type="text" name="romID" required>
										<br>
										Hvilken dag:
										<input type="text" name="day" required>
										<br>
										<input type="submit" name="submit" value="Submit"> 
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
    	echo "Reservasjon avbestilt";

	} else {
    	echo "Error: Du satt inn noe ugyldig";
	}
}

?>