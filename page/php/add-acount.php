<?php
// معلومات الاتصال بقاعدة البيانات
include_once("../../connect.php");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $major=$_POST["major"];
  
    $type = "user";

    // استخدام إستعلام SQL لإدخال البيانات إلى قاعدة البيانات
    $sql = "INSERT INTO user (name, email, password,id_major,type) VALUES ('$Name',  '$email', '$password',$major,'$type')";

    if ($conn->query($sql) === TRUE) {
       
        // echo "success";
        header("Location:../../login.php");
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>