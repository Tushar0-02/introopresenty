<?php
// Database connection details
$servername = "localhost"; // Adjust if necessary
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "introo"; // Database name

// Create connection
$conn = new mysqli('localhost', 'root', '', 'introo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$date = $_POST['date'];
$password = $_POST['password'];
$time = $_POST['time'];

// SQL query to insert data
$sql = "INSERT INTO presenty (name, date, password, time) VALUES ('$name', '$date', '$password', '$time')";

$stmt = $conn->prepare("INSERT INTO presenty (name, date, password, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $date, $password, $time);


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
