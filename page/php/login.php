<?php
session_start();
include_once("../../connect.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `teacher` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['teacher_id'] = $row['id'];
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid email or password."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Please provide email and password."));
}
?>
