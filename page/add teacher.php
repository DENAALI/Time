
<?php
include_once("../connect.php");
// Database connection details

// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch major names from the database
$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Database</title>
    <style>
        body {
            background-image: radial-gradient(circle at 20% 14%, rgba(27, 27, 27,0.05) 0%, rgba(27, 27, 27,0.05) 50%,rgba(126, 126, 126,0.05) 50%, rgba(126, 126, 126,0.05) 100%),radial-gradient(circle at 18% 51%, rgba(248, 248, 248,0.05) 0%, rgba(248, 248, 248,0.05) 50%,rgba(26, 26, 26,0.05) 50%, rgba(26, 26, 26,0.05) 100%),radial-gradient(circle at 29% 38%, rgba(160, 160, 160,0.05) 0%, rgba(160, 160, 160,0.05) 50%,rgba(212, 212, 212,0.05) 50%, rgba(212, 212, 212,0.05) 100%),linear-gradient(238deg, rgb(35,57,255),rgba(44,177,221, 0.61));
            background-size: cover;
        }
        .container {
            height: 1000px;
            width: 450px;
            margin: 100px auto;
            background-color: hsla(0,0%,100%,0.71);
            border: 1px solid #cccccc;
            padding: 20px;
            text-align: left;
        }
        .form-group {
            margin: 10px 0;
        }
        label {
            display: block;
            font-weight: bold;
            color: black;
            margin-bottom: 5px;
        }
        input, select {
            display: block;
            width: 90%;
            padding: 10px;
            border: 1px solid #cccccc;
            margin-bottom: 10px;
        }
        .button {
            display: inline-block;
            width: 30%;
            height: 40px;
            padding: 10px;
            margin: 2px;
            background-color: hsla(209,74%,76%,1.00);
            border: none;
            cursor: pointer;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 10px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="teacherDataForm" action="add-teacher.php" method="post">
            <h2>Teacher</h2>
            <div class="form-group">
                <label for="teacherName">Teacher Name:</label>
                <input type="text" id="teacherName" name="teacherName" required>
            </div>
            <div class="form-group">
                <label for="major">Major:</label>
                <select name="major" required>
                 
                 <?php echo $majorOptions; ?>
             </select>
            </div>
            <div class="form-group">
                <label for="active">Active:</label>
                <select id="active" name="active" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateFrom">Date From:</label>
                <input type="date" id="dateFrom" name="dateFrom" required>
            </div>
            <div class="form-group">
                <label for="dateTo">Date To:</label>
                <input type="date" id="dateTo" name="dateTo" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group radio-group">
                <h3>Select teacher permissions:</h3>
                <label>
                    <input type="radio" name="permission" value="head_department"> Head Department
                </label>
                <label>
                    <input type="radio" name="permission" value="admin"> Admin
                </label>
                <label>
                    <input type="radio" name="permission" value="only_teacher"> Only Teacher
                </label>
            </div>
            <div class="button-container">
                <input type="submit" class="button" value="Add">
                <input type="submit" class="button" value="Edit">
                <input type="submit" class="button" value="Delete">
            </div>
        </form>
    </div>
</body>
</html>
