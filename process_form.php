<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $start_number = intval($_POST['start_number']);
    $end_number = intval($_POST['end_number']);
    $type_id = intval($_POST['type_id']);

    if ($start_number >= $end_number) {
        echo "Please enter valid numbers, with the end number greater than the start number.";
        exit;
    }

    $sql = "INSERT INTO UserInput (start_number, end_number, type_id, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $start_number, $end_number, $type_id);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
