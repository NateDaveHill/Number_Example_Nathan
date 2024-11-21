<?php
// Set content type to JSON
header('Content-Type: application/json');

// Include database connection
include 'db_connection.php';

// Query to get data from the `Type` table
$sql = "SELECT id, type FROM Type";
$result = $conn->query($sql);

// Create an empty array to store results
$types = [];

// Loop through the results and add each row to the array
while ($row = $result->fetch_assoc()) {
    $types[] = $row;
}

// Close the database connection
$conn->close();

// Output the array as JSON
echo json_encode($types);
