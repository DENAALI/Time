<?php
include_once("../../connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your MySQL database
    
    // Create connection
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get form data
    $year = $_POST['year'];
    $name = $_POST['CoursesName'];
    $semester = $_POST['term'];
    $major_id = $_POST['major'];
    $subject_id = $_POST['CoursesID'];
    $pre_sub_num = $_POST['precourseId'];
    $type = $_POST['type'];
    $Capacity = $_POST['Capacity'];
    
    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO subjects (year, semester, major_id, subject_id, pre_sub_num, name, type_name, Capacity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiissi", $year, $semester, $major_id, $subject_id, $pre_sub_num, $name, $type, $Capacity);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "success"; // إرجاع قيمة نجاح إلى الجانب العميل
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>