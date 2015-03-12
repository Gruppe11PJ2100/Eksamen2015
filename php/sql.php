<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

	
// sql to create table
$sql = "CREATE TABLE mon (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true', 'false') NOT NULL,
has_beamer enum('true', 'false') NOT NULL,
reserved_email varchar(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


?>