<?php

require 'config.php';


$sql = "INSERT INTO fri (is_free, has_beamer)
VALUES ('true', 'true')";
	
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>