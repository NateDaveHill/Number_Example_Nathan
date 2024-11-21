<?php

include 'db_connection.php';

global $conn;


$sql = "SELECT id, type FROM Type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['type']) . "</option>";
    }
} else {
    echo "<option disabled>No types available</option>";
}
