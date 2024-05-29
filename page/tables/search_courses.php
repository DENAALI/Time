<?php
include '../../connect.php';
session_start();

$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM subjects WHERE name LIKE '%$search%' OR type_name LIKE '%$search%' OR year LIKE '%$search%' OR semester LIKE '%$search%' OR major_id LIKE '%$search%' OR subject_id LIKE '%$search%' OR pre_sub_num LIKE '%$search%' OR Capacity LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <th scope="row">
                <div class="control__indicator"></div>
            </th>
            <td>' . htmlspecialchars($row['year']) . '</td>
            <td>' . htmlspecialchars($row['semester']) . '</td>
            <td>' . htmlspecialchars($row['major_id']) . '</td>
            <td>' . htmlspecialchars($row['subject_id']) . '</td>
            <td>' . htmlspecialchars($row['pre_sub_num']) . '</td>
            <td>' . htmlspecialchars($row['name']) . '</td>
            <td>' . htmlspecialchars($row['type_name']) . '</td>
            <td>' . htmlspecialchars($row['Capacity']) . '</td>
            <td>
                <button type="button" onclick="editSubject(' . htmlspecialchars($row['id']) . ')">Edit</button>
                <button type="button" onclick="deleteSubject(' . htmlspecialchars($row['id']) . ')">Delete</button>
            </td>
        </tr>
        <tr class="spacer"><td colspan="100"></td></tr>';
    }
} else {
    echo "<tr><td colspan='10'>No data available</td></tr>";
}

mysqli_close($conn);
?>
