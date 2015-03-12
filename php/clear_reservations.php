<?php
require 'config.php';

$sql = "UPDATE mon SET reserved_email='', is_free='true';";
$sql1 = "UPDATE tue SET reserved_email='', is_free='true';";
$sql2 = "UPDATE wed SET reserved_email='', is_free='true';";
$sql3 = "UPDATE thu SET reserved_email='', is_free='true';";
$sql4 = "UPDATE fri SET reserved_email='', is_free='true';";

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