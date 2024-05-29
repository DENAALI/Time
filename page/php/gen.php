<?php

// include '../connect.php';
// require_once '../../connect.php';
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
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
        $scedual_select="SELECT *,COUNT(subject_name) as 'count' FROM `schedule` GROUP BY subject_name";
        $scedual_res=$conn->query($scedual_select);
    while ($row = $scedual_res->fetch_assoc()) {
             
        $student_count =0;
        $result = $conn->query($sql);
        while ($stat_res = $result->fetch_assoc()) {
                if ($stat_res['subject_num'] == $row['subject_id']) {
                    $student_count = $stat_res['num_of_study'];
                }
            }
            $selectsub = "SELECT * FROM `subjects` WHERE semester=$semester and subject_id=" . $row['subject_id'] . " and major_id=$major_id";
            $sub_result = $conn->query($selectsub);
            if (mysqli_num_rows($sub_result) > 0) {
        echo "<tr>";
        echo "<td>" . $row['subject_id'] . "</td>";
        echo "<td>" . $row['subject_name'] . "</td>";
        echo "<td id='count".$row['subject_id']."' >" . $row['count'] . "</td>";
        echo "<input type='hidden' id='idofrow' value=''>";
        echo "<td>" . $student_count. "</td>";
        echo "<td><button onclick='update(".$row['subject_id'].")' id='btnedit".$row['subject_id']."' class='btn'>delete 1 section</button></td>";
        echo "</tr>";
            }

    }

    // دالة لتوزيع القاعات
    function assignHall($courses, $halls) {
        $schedule = [];
        $hallUsage = []; // مصفوفة لتتبع استخدام القاعات

        foreach ($courses as $course) {
            $courseType = strpos($course['course_name'], 'lab') !== false ? 'laboratory' : 'theoretical';
            $assigned = false;

            foreach ($halls[$courseType] as $hall) {
                $timeSlot = $course['day'] . ' ' . $course['hour'];
                if (!isset($hallUsage[$hall['hall_name']][$timeSlot])) {
                    // تخصيص القاعة للدورة
                    $schedule[] = [
                        'day' => $course['day'],
                        'hour' => $course['hour'],
                        'hall_name' => $hall['hall_name'],
                        'course_id' => $course['course_id'],
                        'course_name' => $course['course_name'],
                        'section' => $course['section']
                    ];

                    // تعيين القاعة على أنها مستخدمة في هذا الوقت
                    $hallUsage[$hall['hall_name']][$timeSlot] = true;
                    $assigned = true;
                    break;
                }
            }

            // إذا لم يتم تخصيص قاعة، قم بطباعة رسالة خطأ أو التعامل مع المشكلة حسب الحاجة
            if (!$assigned) {
                echo "Error: Could not assign hall for course " . $course['course_name'] . " (Section " . $course['section'] . ") at " . $course['day'] . " " . $course['hour'] . "\n";
            }
        }
        return $schedule;
    }

    // جلب الأوقات لكل شعبة وتوزيع القاعات
    // foreach ($courses as &$course) {
    //     $sqlTimes = "SELECT * FROM tims WHERE `course id` = " . $course['course_id'] . " AND `section` = " . $course['section'];
    //     $resultTimes = $conn->query($sqlTimes);

    //     if ($resultTimes->num_rows > 0) {
    //         while ($timeRow = $resultTimes->fetch_assoc()) {
    //             $course['day'] = $timeRow['day'];
    //             $course['hour'] = $timeRow['hour'];
    //         }
    //     }
    // }

    // // توزيع القاعات
    // $schedule = assignHall($courses, $halls);
    // $schedual = $schedule;

    // // عرض الجدول النهائي
    // // echo "<pre>";
    // foreach ($schedule as $details) {
    //     // echo "Day: " . $details['day'] . "\n";
    //     // echo "Hour: " . $details['hour'] . "\n";
    //     // echo "Hall Name: " . $details['hall_name'] . "\n";
    //     // echo "Course ID: " . $details['course_id'] . "\n";
    //     // echo "Course Name: " . $details['course_name'] . "\n";
    //     // echo "Section: " . $details['section'] . "\n";
    //     // echo "----------------------------------------\n";
    //     echo "<tr>";
    //     echo "<td>" . $details['course_id'] . "</td>";
    //     echo "<td>" . $details['course_name'] . "</td>";
    //     echo "<td>" . $details['section'] . "</td>";
    //     echo "<td>" . $details['day'] . "</td>";
    //     echo "<td>" . $details['hour'] . "</td>";
    //     echo "<td>" . $details['hall_name'] . "</td>";
    //     echo "</tr>";
    // }
    // echo "</pre>";

    echo "<button class='btn'>next</button>";
}

$conn->close();
?>

<!-- <input type='hidden' id='idofrow' value=''>

<button  ></button> -->

<script>


</script>