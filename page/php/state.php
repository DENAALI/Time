<?php

include_once("../../connect.php");
if(isset($_POST['state'])){

    $subject = $_POST['subject'];
    $man=$_POST['man'];
    $opt=$_POST['opt'];

    $sql = "SELECT *FROM subjects where id=$subject";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $type=$row['type_name'];

    $total=$man+$opt;
    $name=$row['name'];
    $subid=$row['subject_id'];
    $presubid=$row['pre_sub_num'];

    $insert="INSERT INTO `statistics`( `subject_name`, `subject_num`, `subject_type`, `num_of_study`, `pre_subsnum`) VALUES 
    ('$name',$subid,'$type',$total,$presubid)";

    if($conn->query($insert)){
        echo "dun";
    }else{
        echo "error";

    }

}

?>