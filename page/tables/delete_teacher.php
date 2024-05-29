<?php
include '../../connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM teacher WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Teacher deleted successfully!";
    } else {
        echo "Error deleting teacher: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
