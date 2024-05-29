<?php
session_start();
// تحقق مما إذا تم إرسال بيانات من الاستمارة
if(isset($_POST['ok'])) {
    // التأكد من وجود عناصر تم تحديدها
    if(isset($_POST['select']) && is_array($_POST['select'])) {
        // استيراد ملف الاتصال بقاعدة البيانات
        include '../connect.php';
        
        // تكوين استعلام الإدخال
        $teacher_id = $_SESSION['teacher_id']; // افتراضياً، لكنك قد تحتاج لتغييره وفقاً لمنطق التطبيق الخاص بك
        $insert_query = "INSERT INTO tetches (techer_id, subject_id, state) VALUES ";
        $values = array();
        
        // فحص كل صندوق تحديد وإضافة بياناته إذا تم تحديده
        foreach($_POST['select'] as $subject_name) {
        
            // الحصول على معرف الموضوع باستخدام اسمه
            $subject_id_query = "SELECT subject_id FROM subjects WHERE name = '$subject_name'";
            $subject_id_result = mysqli_query($conn, $subject_id_query);
            $subject_id_row = mysqli_fetch_assoc($subject_id_result);
            $subject_id = $subject_id_row['subject_id'];
            
            // إضافة البيانات إلى القيم التي سندرجها في الاستعلام
            $values[] = "('$teacher_id', '$subject_id', '0')"; // في هذا المثال، نفترض أن الحالة هي 1 للتفعيل
            
        }
        
        // إذا تم تحديد أي بيانات، قم بتنفيذ استعلام الإدخال
        if(!empty($values)) {
            $insert_query .= implode(", ", $values);
            if(mysqli_query($conn, $insert_query)) {
                echo "<script>alert(' Records added successfully');</script>";
                header("Location:tables/want to teach.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Please select at least one subject.";
        }
    } else {
        echo "No subjects selected.";
    }
} else {
    echo "Invalid request.";
}
?>
