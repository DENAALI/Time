<?php
// معلومات الاتصال بقاعدة البيانات
include_once("../../connect.php");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hallName = $_POST["hallName"];
  
    $hallCapacity = $_POST["hallCapacity"];
    $type = $_POST["type"];

    // استخدام إستعلام SQL لإدخال البيانات إلى قاعدة البيانات
    $sql = "INSERT INTO hall (hall_name, hall_capacity, type_name) VALUES ('$hallName',  $hallCapacity, '$type')";

    if ($conn->query($sql) === TRUE) {
       
        echo "success";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>