<?php
require "../../connect.php";

$major_id = 0;
$schedual = [];

if (isset($_POST['major1'])) {
    $major_id = $_POST['major1'];
    $level = $_POST['level1'];
    $semester = $_POST['semester1'];

    if ($_POST['major1'] == 1) {
        $major = '221';
    } elseif ($_POST['major1'] == 2) {
        $major = '223';
    } elseif ($_POST['major1'] == 3) {
        $major = '222';
    }

    // جلب بيانات القاعات
    $sqlHalls = "SELECT * FROM hall";
    $resultHalls = $conn->query($sqlHalls);

    $halls = [];
    if ($resultHalls->num_rows > 0) {
        while ($row = $resultHalls->fetch_assoc()) {
            $halls[$row['type_name']][] = $row;
        }
    }

    // جلب بيانات الدورات
    $sql12 = "SELECT `course id`, `course name` FROM tims GROUP BY `course name`";
    $sql = "SELECT * FROM statistics";
    $result1 = $conn->query($sql12);
    $courses = [];
    $conflect = "";
    $scedual_select = "SELECT * FROM `schedule` ";
    $scedual_res = $conn->query($scedual_select);

    while ($row = $scedual_res->fetch_assoc()) {
        $student_count = 0;
        $result = $conn->query($sql);
        while ($stat_res = $result->fetch_assoc()) {
            if ($stat_res['subject_num'] == $row['subject_id']) {
                $student_count = $stat_res['num_of_study'];
            }
        }
        $selectsub = "SELECT * FROM `subjects` WHERE semester=$semester and subject_id=" . $row['subject_id'] . " and major_id=$major_id";
        $sub_result = $conn->query($selectsub);
        if (mysqli_num_rows($sub_result) > 0) {
            $selecttechers = "SELECT t.id, t.name FROM teacher t JOIN tetches tt ON t.id = tt.techer_id 
            AND tt.state = 1 AND tt.subject_id=" . $row['subject_id'];
            $tech_result = $conn->query($selecttechers);
            echo "<tr>";    
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['student_num'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['hall'] . "</td>";
            echo "<td><select name='teachers[" . $row['subject_id'] . "][" . $row['section'] . "]'>";
            echo "<option selected value=''>non</option>";
            while ($tech_row = $tech_result->fetch_assoc()) {
                if($row['techer']==$tech_row['name']){
                    echo "<option selected value='" . $tech_row['name'] . "'>" . $tech_row['name'] . "</option>";

                }else{

                    echo "<option value='" . $tech_row['name'] . "'>" . $tech_row['name'] . "</option>";
                }
            }
            echo "</select></td>";
            echo "</tr>";
        }
    }

    $major_id = $_POST['major1'] = null;
    $level = $_POST['level1'] = null;
    $semester = $_POST['semester1'] = null;
}

$conn->close();
?>
