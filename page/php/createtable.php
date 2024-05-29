<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Timetable</title>
<style>
body{
    font-size: larger;
}
table{
    width:100%;
    table-layout: fixed;
    font-size:xx-large;
}
.tbl-header{
    background-color: rgba(255,255,255,0.3);
}
.tbl-content{
    height:300px;
    width:100%;
    overflow-x:auto;
    margin-top: 0px;
    border: 1px solid rgba(255,255,255,0.3);
}
th{
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #088abd;
    text-transform: uppercase;
}
td{
    padding: 15px;
    text-align: left;
    vertical-align:middle;
    font-weight: 300;
    font-size: 12px;
    color: #242424;
    border-bottom: solid 1px rgba(255,255,255,0.1);
}
</style>
</head>
<body>

<?php
require "../connect.php";

$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}
?>

<label for="major">Major:</label>
<select id="major1" name="major1" style="font-size: large; width: 200px;">
    <?php echo $majorOptions; ?>
</select>

<label for="level">Year:</label>
<select style="font-size: large;" id="level1" name="level1">
    <option value="1">First year</option>
    <option value="2">Second year</option>
    <option value="3">Third year</option>
    <option value="4">Fourth year</option>
</select>

<label for="semester">Semester:</label>
<select style="font-size: large;" id="semester1" name="semester1">
    <option value="1">First term</option>
    <option value="2">Second term</option>
    <option value="3">Summer term</option>
</select>
<button id="generate">Generate</button>

<button type="submit" id="save">Save</button>
<div class="tbl-header">
    <table cellpadding="0" style="width: 100%;" cellspacing="0" border="0">
        <thead>
            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Number</th>
                <th>Number of Students</th>
                <th>Choose Teacher</th>
            </tr>
        </thead>
        <tbody id="table">
            <form action="page/php/finaltable.php" id="teachersForm" name="teachersForm" method="POST">
                <input type="hidden" name="teachers" value="1">
                <!-- Data will be dynamically inserted here -->
            </form>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Handle click event for Generate button
    $("#generate").click(function() {
        var major1 = $("#major1").val();
        var level1 = $("#level1").val();
        var semester1 = $("#semester1").val();
        $.ajax({
            type: 'POST',
            url: 'php/addscedual.php',
            data: { major1: major1, level1: level1, semester1: semester1 },
            success: function(response) {
                $("#table").html(response); // Update the table based on the response
            }
        });
    });

    // Handle click event for Save button
    $("#teachersForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: 'page/php/finaltable.php',
            data: $(this).serialize(), // Send all form data
            success: function(response) {
                alert('Data saved successfully!'); // Confirmation message
                console.log(response); // Check the response after success
                window.location.href = 'page/php/finaltable.php';
            },
            error: function() {
                alert('An error occurred while saving the data.'); // Error message
            }
        });
    });
});
</script>
</body>
</html>
