<?php
require 'config.php';

$sql = "SELECT * FROM email";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["name"]. " - Prosjektor: " . $row["email"]. /*" ErLedig: " . $row["is_free"] . "   Medlemar:   " . $row["antall"] ."  Email: " . $row["email"] . */"<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);


?>