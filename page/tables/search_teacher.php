<?php
include '../../connect.php';
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = "SELECT * FROM teacher WHERE email LIKE '%$search%' OR name LIKE '%$search%' OR depar_num LIKE '%$search%' OR degree LIKE '%$search%' OR type LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['depar_num']}</td>";
        echo "<td>{$row['degree']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td>
                <a href='edit_teacher.php?id={$row['id']}'>Edit</a> | 
                <a href='javascript:void(0)' onclick='confirmDelete({$row['id']})'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No teachers found</td></tr>";
}
mysqli_close($conn);
?>
