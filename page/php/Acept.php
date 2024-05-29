<?php
session_start();

// تحقق مما إذا تم إرسال بيانات من الاستمارة
if(isset($_POST['ok'])) {
    // التأكد من وجود عناصر تم تحديدها
    if(isset($_POST['select']) && is_array($_POST['select'])) {
        // استيراد ملف الاتصال بقاعدة البيانات
        include '../../connect.php';
        
        // تكوين استعلام التحديث
        $teacher_id =$_POST['id']; // افتراضياً، لكنك قد تحتاج لتغييره وفقاً لمنطق التطبيق الخاص بك
        
        // فحص كل صندوق تحديد وإضافة بياناته إذا تم تحديده
        foreach($_POST['select'] as $subject_name) {
            // الحصول على معرف الموضوع باستخدام اسمه
            $subject_id_query = "SELECT subject_id FROM subjects WHERE name = '$subject_name'";
            $subject_id_result = mysqli_query($conn, $subject_id_query);
            
            if ($subject_id_result && mysqli_num_rows($subject_id_result) > 0) {
                $subject_id_row = mysqli_fetch_assoc($subject_id_result);
                $subject_id = $subject_id_row['subject_id'];
                
                // تحديث قيمة state إلى 1 للمواضيع المحددة
                $update_query = "UPDATE tetches SET state = '1' WHERE techer_id = '$teacher_id' AND subject_id = '$subject_id'";
                
                if (mysqli_query($conn, $update_query)) {
                    echo "<script>alert(' Record for subject $subject_name updated successfully');</script>"; //
                    header("Location:../tables/acept.php");
                } else {
                    echo "Error updating record for subject $subject_name: " . mysqli_error($conn) . "<br>";
                }
            }
        }
        
    } else {
        echo "No subjects selected.";
    }
} else {
    echo "Invalid request.";
}
?>
