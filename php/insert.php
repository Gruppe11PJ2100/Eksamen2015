<?php

require 'config.php';


$sql = "INSERT INTO email
VALUES ('kaasddssd@student.westerdals.no', 'Edvin')";
	
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO mon (is_free, prosjektor, antall_medlemmer)
VALUES ('true', 'false', '4')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>