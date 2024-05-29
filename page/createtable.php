<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable Management</title>
    <style>
        body {
            font-size: larger;
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        table {
            text-align: center;
            width: 100%;
            table-layout: fixed;
            font-size: large;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .tbl-header {
            width: 99%;
            background-color: rgba(255, 255, 255, 0.3);
        }
        .tbl-content {
            height: 600px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        th, td {
            text-align: center;
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 14px;
            color: #088abd;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        th {
            text-align: center;

            border: double;

            background-color: #f2f2f2;
        }
        td {
            text-align: center;

            border: double;

            font-weight: 300;
            font-size: 14px;
            color: #242424;
        }
        select, button {
            font-size: large;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #088abd;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #066a9b;
        }
        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

<div>
    <label for="major">Major:</label>
    <select id="major1" name="major1">
        <?php echo $majorOptions; ?>
    </select>

    <label for="level">Year:</label>
    <select id="level1" name="level1">
        <option value="1">First year</option>
        <option value="2">Second year</option>
        <option value="3">Third year</option>
        <option value="4">Fourth year</option>
    </select>

    <label for="semester">Semester:</label>
    <select id="semester1" name="semester1">
        <option value="1">First term</option>
        <option value="2">Second term</option>
        <option value="3">Summer term</option>
    </select>
    <button id="genrate">Generate</button>
</div>

<?php
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
if (mysqli_num_rows($result) == 0) {
    header("Location:php/tttt.php");
    exit;
}
?>

<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border=1 >
       
        </table>
    </div>
    <div class="tbl-content">
        <form id="techers" action="./finaltable.php" name="techers" method="POST">
            <input type="hidden" id="major2" name="major2">
            <input type="hidden" id="semester2" name="semester2">
        <button id="savde" style="     display: none;"  type="submit">Save</button>
   
        <table  border=1 >
        <thead>
            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Number</th>
                <th>Number
                    of
                    Student</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Hall</th>
                    <th>Choose Teacher</th>
                </tr>
            </thead>
            <tbody id="table">
                <!-- Data will be inserted here dynamically -->
             


            </tbody>
        </table>
    </form>
</div>


<script>
    $(document).ready(function() {
        // Handle click event for Generate button
        $("#genrate").click(function() {
            var major1 = $("#major1").val();
            var level1 = $("#level1").val();
            var semester1 = $("#semester1").val();
            
            document.getElementById('major2').value=major1;
            document.getElementById('semester2').value=semester1;
            
            $.ajax({
                type: 'POST',
                url: 'php/addscedual.php',
                data: { major1: major1, level1: level1, semester1: semester1 },
                success: function(response) {
                    $("#table").html(response); // Update the table based on the response
                    document.getElementById('savde').style.display="block";
                }
            });
        });
        // $("#savde").click(function(){
        //     var major1 = $("#major1").val();
        //     var semester1 = $("#semester1").val();
        //     $("#major2").val=major1;
        //     $("#semester2").val=semester1;

        // });
        // Handle form submission for Save button
       
    });
</script> 


<?php


// if (isset($_POST['submit']))
// {

// $scedual_select = "SELECT * FROM `schedule`";

//     $scedual_res = $conn->query($scedual_select);

//     while ($row = $scedual_res->fetch_assoc()) {
//         $fieldName = "" . $row['subject_id'] . $row['section'] . "";

//         if (isset($_POST['teachers'][$row['subject_id']][$row['section']])) {
//             $teacher = "ggggggggggg";
//             if ($teacher != 'non') {
//                 $update = "UPDATE `schedule` SET `techer`='$teacher' WHERE subject_id='2211121 '";
//                 $result = $conn->query($update);
//                 if ($result === false) {
//                     die("فشل في تنفيذ الاستعلام: " . $conn->error);
//                 } else {
//                     echo "successddddddd111";
//                 }
//             }
//         }
//     }
// }
?>
</body>
</html>
