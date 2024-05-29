<?php
include '../../connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM teacher WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Teacher not found!";
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $depar_num = $_POST['depar_num'];
    $active = $_POST['active'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $report_id = $_POST['report_id'];
    $degree = $_POST['degree'];
    $type = $_POST['type'];
    $sql = "UPDATE teacher SET email='$email', password='$password', name='$name', depar_num='$depar_num', active='$active', date_from='$date_from', date_to='$date_to', report_id='$report_id', degree='$degree', type='$type' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Teacher updated successfully!";
    } else {
        echo "Error updating teacher: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Teacher</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Department Number</label>
                <input type="text" class="form-control" name="depar_num" value="<?php echo $row['depar_num']; ?>" required>
            </div>
            <div class="form-group">
                <label>Active</label>
                <input type="text" class="form-control" name="active" value="<?php echo $row['active']; ?>" required>
            </div>
            <div class="form-group">
                <label>Date From</label>
                <input type="date" class="form-control" name="date_from" value="<?php echo $row['date_from']; ?>" required>
            </div>
            <div class="form-group">
                <label>Date To</label>
                <input type="date" class="form-control" name="date_to" value="<?php echo $row['date_to']; ?>" required>
            </div>
            <div class="form-group">
                <label>Report ID</label>
                <input type="text" class="form-control" name="report_id" value="<?php echo $row['report_id']; ?>" required>
            </div>
            <div class="form-group">
                <label>Degree</label>
                <input type="text" class="form-control" name="degree" value="<?php echo $row['degree']; ?>" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" class="form-control" name="type" value="<?php echo $row['type']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>        </form>
    </div>
</body>
</html>