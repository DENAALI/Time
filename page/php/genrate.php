<?php
// require "connect.php";

$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}
?>

<label for="major"> major:</label>
<select id="major1" name="major1" style="font-size: large; width: 200px;">
    <?php echo $majorOptions; ?>
</select>

<label for="level">year:</label>
<select style="font-size: large;" id="level1" name="level1">
    <option value="1">First year</option>
    <option value="2">Second year</option>
    <option value="3">Third year</option>
    <option value="4">Fourth year</option>
</select>

<label for="semester">semester:</label>
<select style="font-size: large;" id="semester1" name="semester1">
    <option value="1">First term</option>
    <option value="2">Second term</option>
    <option value="3">Summer term</option>
</select>
<button id="genrate">generate</button>

<div class="tbl-header">
<a href="page/createtable.php" id="nextnext" style="display: none; margin: 10px; text-align: center; "  class="tm-btn tm-btn-primary text-center ">next</a>
<?php
        

?>
    <table cellpadding="0" style="width: 100%;" cellspacing="0" border="0">
        <thead>
            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Count </th>
                <th> Number of Student</th>
                
                <th>edite</th>
                <!-- <th>edite</th>
                <th>Hall</th> -->
                
            </tr>
        </thead>
        <tbody id="table">
            <?php 

            
            
            include("php/gen.php"); ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#nextnext").hide();
    $(document).ready(function() {
        $("#genrate").click(function() {
            var major1 = $("#major1").val();
            var level1 = $("#level1").val();
            var semester1 = $("#semester1").val();
            $.ajax({
                type: 'POST',
                url: 'page/php/gen.php',
                data: {major1: major1, level1: level1, semester1: semester1},
                success: function(response) {
                    console.log(major1); // تحقق من الاستجابة بعد النجاح
                    $("#table").html(response); // تحديث الجدول بناءً على الاستجابة
                    document.getElementById('nextnext').style.display = 'block';

                   

                }
            });
            

        });
    });

   

</script>