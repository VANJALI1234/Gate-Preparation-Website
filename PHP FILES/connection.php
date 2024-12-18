<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "Iisc@1729", "gate_registrations");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullName = isset($_POST['uname']) ? trim($_POST['uname']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['number']) ? trim($_POST['number']) : '';
$branch = isset($_POST['branch']) ? trim($_POST['branch']) : '';
$dob = isset($_POST['date']) ? $_POST['date'] : '';
$terms = isset($_POST['agreedTerms']) ? 1 : 0;

// Validation
if (empty($fullName) || empty($email) || empty($phone) || empty($branch) || empty($dob)) {
    die("All fields are required!");
}

// SQL Insert Query
$sql = "INSERT INTO registrations (fullName, email, phone, branch, dob, terms) 
        VALUES ('$fullName', '$email', '$phone', '$branch', '$dob', '$terms')";

// Insert data into database
if ($conn->query($sql) === TRUE) {
    echo "Registration successful! <a href='view.php'>View Registrations</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
