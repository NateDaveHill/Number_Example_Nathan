<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_number = $_POST['start_number'];
    $end_number = $_POST['end_number'];
    $type_id = $_POST['type_id'];

    if (is_numeric($start_number) && is_numeric($end_number) && $end_number > $start_number && is_numeric($type_id)) {

        $sql = "INSERT INTO UserInput (start_number, end_number, created_at, type_id)
                VALUES (?, ?, NOW(), ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("iii", $start_number, $end_number, $type_id);

            if ($stmt->execute()) {
                echo "Record inserted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please enter valid numbers and ensure that the end number is greater than the start number.";
    }
}

$conn->close();
