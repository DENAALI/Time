<?php
include_once("../../connect.php");

$teacherName = $_POST['teacherName'] ?? null;
$major = $_POST['major'] ?? null;
$active = $_POST['active'] ?? null;
$dateFrom = $_POST['dateFrom'] ?? null;
$dateTo = $_POST['dateTo'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$degree = $_POST['Academic'] ?? null;
$type = $_POST['type-user'] ?? null;

if ($teacherName && $major && $active && $dateFrom && $dateTo && $email && $password && $degree && $type) {
    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO teacher (name, email, password, depar_num, active, date_from, date_to, degree, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssss", $teacherName, $email, $password, $major, $active, $dateFrom, $dateTo, $degree, $type);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: All fields are required.";
}

$conn->close();
?>
