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
$sql = "ALTER TABLE gruppe_rom 
DROP COLUMN reserved_from,
DROP COLUMN reserved_to,
ADD day enum('mon','tue','wed','thu','fri')
";

if ($conn->query($sql) === TRUE) {
    echo "Table gruppe_rom created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


?>