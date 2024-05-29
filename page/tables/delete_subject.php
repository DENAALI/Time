<?php
include '../../connect.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM subjects WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Subject deleted successfully!";
    } else {
        echo "Error deleting subject: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
// header("Location: path_to_your_main_page.php");
exit;
?>
