<?php

require 'config.php';


$sql = "INSERT INTO email
VALUES ('kleedv17@student.westerdals.no')";
	
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>