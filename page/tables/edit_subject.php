<?php
include '../../connect.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM subjects WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Subject not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $major_id = $_POST['major_id'];
    $subject_id = $_POST['subject_id'];
    $pre_sub_num = $_POST['pre_sub_num'];
    $name = $_POST['name'];
    $type_name = $_POST['type_name'];
    $capacity = $_POST['capacity'];

    $sql = "UPDATE subjects SET year='$year', semester='$semester', major_id='$major_id', subject_id='$subject_id', pre_sub_num='$pre_sub_num', name='$name', type_name='$type_name', Capacity='$capacity' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Subject updated successfully!";
    } else {
        echo "Error updating subject: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Edit Subject</title>
</head>
<body>
    <div class="container">
        <h2 class="mb-5">Edit Subject</h2>
        <form method="post">
            <div class="form-group">
                <label>Year</label>
                <input type="number" class="form-control" name="year" value="<?php echo htmlspecialchars($row['year']); ?>" required>
            </div>
            <div class="form-group">
                <label>Semester</label>
                <input type="number" class="form-control" name="semester" value="<?php echo htmlspecialchars($row['semester']); ?>" required>
            </div>
            <div class="form-group">
                <label>Major ID</label>
                <input type="number" class="form-control" name="major_id" value="<?php echo htmlspecialchars($row['major_id']); ?>" required>
            </div>
            <div class="form-group">
                <label>Subject ID</label>
                <input type="number" class="form-control" name="subject_id" value="<?php echo htmlspecialchars($row['subject_id']); ?>" required>
            </div>
            <div class="form-group">
                <label>Pre Sub Num</label>
                <input type="number" class="form-control" name="pre_sub_num" value="<?php echo htmlspecialchars($row['pre_sub_num']); ?>" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Type Name</label>
                <input type="text" class="form-control" name="type_name" value="<?php echo htmlspecialchars($row['type_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Capacity</label>
                <input type="number" class="form-control" name="capacity" value="<?php echo htmlspecialchars($row['Capacity']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
        </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
