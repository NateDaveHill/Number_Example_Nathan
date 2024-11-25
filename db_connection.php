<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "number_example_db"
$conn = mysqli_connect($server, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully\n";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->select_db($dbname);

    $typeTable = "CREATE TABLE IF NOT EXISTS Type (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

    $userInputTable = "CREATE TABLE IF NOT EXISTS UserInput (
    id INT PRIMARY KEY AUTO_INCREMENT,
    start_number INT NOT NULL,
    end_number INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    type_id INT,
    FOREIGN KEY (type_id) REFERENCES Type(id)
)";

    if ($conn->query($typeTable) === TRUE) {
        echo "'Type' table exists or created successfully.\n";
    } else {
        echo "Error creating 'Type' table: " . $conn->error;
    }

    if ($conn->query($userInputTable) === TRUE) {
        echo "'UserInput' table exists or created successfully.\n";
    } else {
        echo "Error creating 'UserInput' table: " . $conn->error;
    }

    $conn->close();

}

