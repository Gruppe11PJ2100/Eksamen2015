<?php
require 'config.php';

$sql = "SELECT * FROM tue";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "Email: " . $row["id"]. " - Navn: " . $row["is_free"]. /*" Har Prosjektor: " . $row["has_beamer"] . "   E-Mail:   " . $row["reserved_email"] . */"<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);


?>