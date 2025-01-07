<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'student_form_db';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $matric_number = $_POST["matric_number"]; // Match the DB column name
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $program = $_POST["program"];
    $level = $_POST["level"];
    $course = $_POST["course"];
    $comments = $_POST["comments"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO studentn (`name`, `matric_number`, `email`, `phone`, `address`, `dob`, `gender`, `program`, `level`, `course`, `comments`)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing the statement: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("sssssssssss", $name, $matric_number, $email, $phone, $address, $dob, $gender, $program, $level, $course, $comments);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
