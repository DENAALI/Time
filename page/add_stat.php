
<?php
include_once("../connect.php");
// Database connection details

// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch major names from the database
$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
$subjectOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}
$sql = "SELECT id, name FROM subjects";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $subjectOptions .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
// Close the database connection




$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course Database</title>
    <style>
 body {
    background-image: radial-gradient(circle at 20% 14%, rgba(27, 27, 27,0.05) 0%, rgba(27, 27, 27,0.05) 50%,rgba(126, 126, 126,0.05) 50%, rgba(126, 126, 126,0.05) 100%),radial-gradient(circle at 18% 51%, rgba(248, 248, 248,0.05) 0%, rgba(248, 248, 248,0.05) 50%,rgba(26, 26, 26,0.05) 50%, rgba(26, 26, 26,0.05) 100%),radial-gradient(circle at 29% 38%, rgba(160, 160, 160,0.05) 0%, rgba(160, 160, 160,0.05) 50%,rgba(212, 212, 212,0.05) 50%, rgba(212, 212, 212,0.05) 100%),linear-gradient(238deg, rgb(35,57,255),rgba(44,177,221, 0.61));
			background-size: cover;
			
    }

   .container {
	height: 500px;
            width: 350px;
            margin: 100px auto;
            background-color:hsla(0,0%,100%,0.71);
            border: 1px solid #cccccc;
            padding: 20px;
              text-align: left;
            
        }
 .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
            color: black;
 margin-bottom: 5px;
        }

        input {
            display: block;
            width: 90%;
            padding: 10px;
            border: 1px solid #cccccc;
            margin-bottom: 10px;
        }
.select-wrapper {
    margin-bottom: 20px; /* Add some bottom margin for spacing */
}
select {
    width: 55%; /* Make the select element full width */
    padding: 10px; /* Add some padding for better visual appearance */
    font-size: 16px; /* Adjust font size for better readability */
    border-radius: 5px; /* Add border-radius for rounded corners */
    border: 1px solid #ccc; /* Add a border for better visual separation */
    box-sizing: border-box; /* Ensure padding and border are included in the width */
    background-color: #f9f9f9; /* Add a background color */
}

/* Style hover and focus states for better user interaction */
select:hover,
select:focus {
    outline: none; /* Remove default outline */
    border-color: #666; /* Change border color on hover/focus */
}
        .button-container {
            display: block;
            justify-content: space-around;
        }

        .button {
           display: inline-block;

            width: 30%; /* تحديد عرض أصغر للزر لتجنب التداخل */
            height: 40px; 
            padding: 10px;
            margin: 2px;

            background-color:hsla(209,74%,76%,1.00);
           
            border: none;
            cursor: pointer;

        }
      

       
</style>
</head>
<body>
 <div class="container">
        <form action="php/state.php"  method="post" name="state" >  
<h2>statistics</h2>
<div>
    <div id="courseList">
        <!-- Course list will be displayed here -->
    </div>

    <div id="courseForm">
        
<!-- <div>
<label for="major">Major:</label>
            <select name="major" required>
            <?php echo $majorOptions; ?>
                </select>
</div> -->
<label for="major">subject:</label>
            <select name="subject" required>
            <?php echo $subjectOptions; ?>
                </select>
<div>
            
                 
                  
</div>
<div>
            <label for="year">number of student(Mandatory):</label>
            <input type="number" name="man" id="">
            
            <label for="year">Number of Students(optional):</label>
            <input type="number" name="opt" id="" required >
<div >
            <input type="submit" class="button" value="add" name="state" >
           

        </div>
        </form>
    

   
</body>
</html>
