
<style>

body{
    font-size: x-large ;
}
table{
  width:100%;
  table-layout: fixed;
  font-size:large;

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
  text-align: center;
  font-weight: 500;
  font-size: large ;
  color: #088abd;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: 300;
  font-size: large ;
  color: #242424;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


</style>


<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$scedual_select = "SELECT * FROM `schedule`";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $scedual_res = $conn->query($scedual_select);

    while ($row = $scedual_res->fetch_assoc()) {
        $fieldName = "" . $row['subject_id'] . $row['section'] . "";

        if (isset($_POST['teachers'][$row['subject_id']][$row['section']])) {
            $teacher = $_POST['teachers'][$row['subject_id']][$row['section']];
            if ($teacher != '') {
                $update = "UPDATE `schedule` SET `techer`='$teacher' WHERE subject_id=" . $row['subject_id'] . " AND section=" . $row['section'];
                $result = $conn->query($update);
                if ($result === false) {
                    die("فشل في تنفيذ الاستعلام: " . $conn->error);
                } else {
                    // echo "success";
                }
            }
        }
    }
    echo "تم تحديث البيانات بنجاح";
} else {
    echo "لم يتم استلام أي بيانات";
}

// عرض البيانات بعد التحديث
$scedual_res = $conn->query($scedual_select);
?>

<table cellpadding="0" style="width: 100%;" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>Subject Number</th>
            <th>Subject Name</th>
            <th>Section Number</th>
            <th>day</th>
            <th>time</th>
            <th>Hall</th>
            <th>Number of Student</th>
            <th>techer</th>
        </tr>
    </thead>
    <tbody id="table">

<?php
while ($row = $scedual_res->fetch_assoc()) {
    $student_count = 0;
    $sql = "SELECT * FROM statistics";
    $result = $conn->query($sql);
    while ($stat_res = $result->fetch_assoc()) {
        if ($stat_res['subject_num'] == $row['subject_id']) {
            $student_count = $stat_res['num_of_study'];
        }
    }
    if(isset($_POST['major2'])){

        $selectsub = "SELECT * FROM `subjects` WHERE major_id=".$_POST['major2']." and semester= ".$_POST['semester2']." and subject_id=" . $row['subject_id'];
        $sub_result = $conn->query($selectsub);
        if (mysqli_num_rows($sub_result) > 0) {
            $selecttechers = "SELECT t.id, t.name FROM teacher t JOIN tetches tt ON t.id=tt.techer_id AND tt.state=1 AND tt.subject_id=" . $row['subject_id'];
            $tech_result = $conn->query($selecttechers);
            
            echo "<tr>";    
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['hall'] . "</td>";
            echo "<td>" . $row['student_num'] . "</td>";
            echo "<td>" . $row['techer'] . "</td>";
            echo "</tr>";
        }
    }
}
echo "</tbody></table>";

$conn->close();
?>
