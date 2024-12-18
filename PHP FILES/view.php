<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = 'Iisc@1729';
$database = 'gate_registrations';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row['fullName'] . " - Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No records found.";
}

// Close connection
$conn->close();
?>
