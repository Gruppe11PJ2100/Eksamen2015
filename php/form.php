<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php
// define variables and set to empty values
$id = $day =  "";
$string = "@student.westerdals.no";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id = test_input($_POST["id"]);
   $day = test_input($_POST["day"]);
   $email = test_input($_POST["email"]);


}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   RomNr.: <input type="text" name="id">
   <br><br>
   Dag (mon, tue, wed, thu, fri): <input type="text" name="day">
   <br><br>
   Email <input type="text" name="email">@student.westerdals.no
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
require 'config.php';


if (isset($_POST['submit'])){

$sql1 = "SELECT * FROM $day WHERE id=$id;";
$result = mysqli_query($conn, $sql1);

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	if($row["is_free"] == 'true'){


    		$sql = "UPDATE $day SET reserved_email='$email$string', is_free='false' WHERE id=$id";

			if ($conn->query($sql) === TRUE) {
  				  echo "Record updated successfully";
			} else {
 				   echo "Error updating record: " . $conn->error;
			}

    	} else {
    		echo "its taken";
    	}

    }

}



$conn->close();



?>

</body>
</html>