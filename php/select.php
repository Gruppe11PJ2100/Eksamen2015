<?php
require 'config.php';

$sql = "SELECT * FROM mon";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Prosjektor: " . $row["prosjektor"]. " ErLedig: " . $row["is_free"] . "   Medlemar:   " . $row["antall_medlemmer"] ."  Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);


?>