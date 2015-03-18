<?php

$db_adress = "127.0.0.1:3307";
$db_name = "myDB";
$db_user =  "root";
$db_pass = "";

$conn = new mysqli($db_adress, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";


// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


// sql to create table

$sql = "CREATE TABLE email (
email varchar(255) PRIMARY KEY, 
name VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE Mandag (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true','false') NOT NULL,
prosjektor enum('true','false') NOT NULL,
antall_medlemmer enum('2','3','4') NOT NULL,
email VARCHAR(50),
CONSTRAINT email1 FOREIGN KEY (email) REFERENCES email(email)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Tirsdag (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true','false') NOT NULL,
prosjektor enum('true','false') NOT NULL,
antall_medlemmer enum('2','3','4') NOT NULL,
email VARCHAR(50),
CONSTRAINT email2 FOREIGN KEY (email) REFERENCES email(email)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Onsdag (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true','false') NOT NULL,
prosjektor enum('true','false') NOT NULL,
antall_medlemmer enum('2','3','4') NOT NULL,
email VARCHAR(50),
CONSTRAINT email3 FOREIGN KEY (email) REFERENCES email(email)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Torsdag (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true','false') NOT NULL,
prosjektor enum('true','false') NOT NULL,
antall_medlemmer enum('2','3','4') NOT NULL,
email VARCHAR(50),
CONSTRAINT email4 FOREIGN KEY (email) REFERENCES email(email)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Fredag (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
is_free enum('true','false') NOT NULL,
prosjektor enum('true','false') NOT NULL,
antall_medlemmer enum('2','3','4') NOT NULL,
email VARCHAR(50),
CONSTRAINT email5 FOREIGN KEY (email) REFERENCES email(email)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>