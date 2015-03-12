<?php
require 'config.php';

$id = 1;

$sql = "UPDATE gruppe_rom SET is_free='false' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

?>