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

// Display "Mock Test" link
echo "<a href='https://gate.iitkgp.ac.in/gate2022/mock_links.html' style='text-decoration: none; color: #007BFF; font-size: 18px;'>Go to Mock Test</a><br><br>";

if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
        echo "<strong>Name:</strong> " . $row['fullName'] . "<br>";
        echo "<strong>Email:</strong> " . $row['email'] . "<br>";
        echo "<strong>Phone Number:</strong> " . $row['phone'] . "<br>";
        echo "<strong>Branch:</strong> " . $row['branch'] . "<br>";
        echo "<strong>Date of Birth:</strong> " . $row['dob'] . "<br>";
        echo "</div>";
    }
} else {
    echo "No records found.";
}

// Close connection
$conn->close();
?>
