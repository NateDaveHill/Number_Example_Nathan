<?php

header('Content-Type: application/json');

include 'db_connection.php';

$sql = "SELECT id, type FROM Type";
$result = $conn->query($sql);

$types = [];

while ($row = $result->fetch_assoc()) {
    $types[] = $row;
}

$conn->close();

echo json_encode($types);
