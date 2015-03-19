<?php
require 'config.php';

$sql = "UPDATE Mandag SET email='', is_free='true';";
$sql1 = "UPDATE Tirsdag SET email='', is_free='true';";
$sql2 = "UPDATE Onsdag SET email='', is_free='true';";
$sql3 = "UPDATE Torsdag SET email='', is_free='true';";
$sql4 = "UPDATE Fredag SET email='', is_free='true';";

$conn->query($sql1);
$conn->query($sql2);
$conn->query($sql3);
$conn->query($sql4);


if ($conn->query($sql) === TRUE) {
  		  echo "Record updated successfully";
	} else {
 		   echo "Error updating record: " . $conn->error;
 	}

?>