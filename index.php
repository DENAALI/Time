<?php
include_once("connect.php");
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
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCEAN vibes by TemplateMo</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/magnific-popup.css"> 
    <link rel="stylesheet" href="css/templatemo-ocean-vibes.css"> 
<!--
    
TemplateMo 554 Ocean Vibes

https://templatemo.com/tm-554-ocean-vibes

-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<style>

table{
  width:100%;
  table-layout: fixed;
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
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #088abd;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #242424;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

section{
  margin: 12px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


    </style>
    <?php
    session_start();
    if ($_SESSION['teacher_id']==null)
    {
header('location:login.php');
    }
    
    
    ?>
           
</head>
<body>
    <header class="tm-site-header">
        <h1 class="tm-mt-0 tm-mb-15"><span class="tm-color-primary">TTSFC </span> <span class="tm-color-gray-2">Mutah</span></h1>
        <em class="tm-tagline tm-color-light-gray">Time Table System For Courses</Table></em>
      

    </header>
  
    <!-- Video banner 400 px height -->
  
    <div class="tm-container">
    <nav class="tm-main-nav">
  
        <ul id="inline-popups">
        <?php
include_once('connect.php');

$id = $_SESSION['teacher_id'];
$sql = "SELECT * FROM teacher WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$type = $row['type'];

echo '<input type="hidden" name="cheack" id="cheack" value="' . $type . '">';
?>

            <li class="tm-nav-item" name="add-teacher" id="add-teacher">
                <a href="#contact" data-effect="mfp-move-from-top" class="tm-nav-link">
                    Add Teacher
                    <i class="fas fa-3x fa-user"></i>
                </a>                
            </li>
            <li class="tm-nav-item" name="add-stat" id="add-stat">
                <a href="#stat" data-effect="mfp-move-from-top" class="tm-nav-link" id="tm-gallery-link" name="add-stat">
                    Add Statistics
                    <i class="fas fa-3x fa-plus"></i>
                </a>
            </li>
            <li class="tm-nav-item" name="create-table" id="create-table">
                <a href="#testimonials" data-effect="mfp-move-from-top" class="tm-nav-link" name="create-table">
                    Create Table
                    <i class="far fa-3x fa-map"></i>
                </a>
            </li>
        
          
            <li class="tm-nav-item" name="add-courses" id="add-courses">
                <a href="#Courses" data-effect="mfp-move-from-top" class="tm-nav-link" >
                    Add Courses
                    <i class="fas fa-3x fa-plus"></i>
                </a>
            </li>
            <li class="tm-nav-item" name="add-hall" id="add-hall">
                <a href="#hall" data-effect="mfp-move-from-top" class="tm-nav-link" name="add-hall">
                    Add Hall
                    <i class="fas fa-3x fa-plus"></i>
                </a>                
            </li>
            <li class="tm-nav-item" name="acpect-teacher" id="acpect-teacher">
                <a href="#" onclick="window.location.href='page/tables/acept.php';" class="tm-nav-link" name="acpect-teacher">
                    Acept Teacher
                    <i class="fas fa-3x fa-users"></i>
                </a>  
            </li>   
            <li class="tm-nav-item" name="chooseCourses" id="chooseCourses">
                <a href="#" onclick="window.location.href='page/tables/want to teach.php';" class="tm-nav-link" name="acpect-teacher">
                    Choose Courses
                    <i class="fas fa-3x fa-users"></i>
                </a>  
            </li>   
            <li class="tm-nav-item" name="EditCourses" id="EditCourses">
                <a href="#" onclick="window.location.href='page/tables/EditCourses.php';" class="tm-nav-link" name="EditCourses">
                    Edit Courses
                    <i class="fas fa-3x fa-users"></i>
                </a>  
            </li>   
            <li class="tm-nav-item" name="Editteacher" id="Editteacher">
                <a href="#" onclick="window.location.href='page/tables/editTeacher.php';" class="tm-nav-link" name="Editteacher">
                    Edit teacher
                    <i class="fas fa-3x fa-users"></i>
                </a>  
            </li>  
            <li class="tm-nav-item" name="about" id="about">
                <a href="#about2" data-effect="mfp-move-from-top" class="tm-nav-link" name="about"  >
                    About
                    <i class="fas fa-3x fa-question mark"></i>
                </a>
            </li>
        </ul>
        <button class="tm-btn tm-btn-primary" onclick="location.href='page/php/logout.php';">Log out</button>


    </nav>
</div>

       
        <!-- Popup itself -->
   
        <div id="testimonials" class="popup mfp-with-anim mfp-hide tm-bg-gray">
            <a href="#" class="tm-close-popup">
                return home
                <i class="fas fa-times"></i>
            </a>
           <!-- //__  _____________________________________________________________________ -->
<?php

include "page/genrate.php";


?>

<?php


?>
           <!-- //__  _____________________________________________________________________ -->
        </div>
        
             

        <div id="about2" class="popup mfp-with-anim mfp-hide tm-bg-gray ">
            <a href="#" class="tm-close-popup">
                return home
                <i class="fas fa-times"></i>
            </a>
            <h2 class="tm-color-primary tm-about-col tm-mb-40 tm-page-title">About Ocean Vibes</h2>
            <div class="tm-row tm-about-row">
                <div class="tm-col tm-about-col tm-about-left">                    
                    <img src="page/Picture1.png" alt="Image" class="tm-mb-30">
                    <p class="tm-mb-40">
                        Suspendisse sit amet pellentesque nunc. Vivamus fringilla
                        tellus finibus lacus blandit, siet amet aliquet augue sagittis.
                        Duis nec auctor felis, nec ornare ex. In non ante ligula.
                    </p>
                    <p class="tm-mb-40">
                        Curabitur non augue dignissim est pulvibar lobortis. Nunc
                        vulputate, mi vel cursus mollis, justo mauris rutrum dui, id
                        egestas ante ligula id nunc. Interdum et malesuada fames
                        ac ante ipsum primis in faucibus.
                    </p>
                </div>
                <div class="tm-col tm-about-col">
                    <p class="tm-mb-40">
                        You are NOT allowed to re-distribute this template ZIP file
                        on any website that <span class="tm-color-primary">collects and reposts</span> free templates
                        from many different websites.
                    </p>
                    <p class="tm-mb-40">
                        Pellentesque vitae ipsum vel risus molestie cursus nec quis
                        lectus. Duis egestas lorem eu nisi finibus, sit amet
                        elementum lacus pretium. In tempor felis vitae nulla feugiat aliquam.
                    </p>
                    <p class="tm-mb-40">
                If you need a working HTML contact form, 
                please visit our <a rel="nofollow" href="#" target="_parent">contact page</a>. </p>
                    <!-- <a href="#" class="tm-btn tm-btn-primary mfp-prevent-close tm-btn-contact tm-mb-40">
                        Contact Us
                    </a> -->
                </div>               
            </div>
        </div>

        <div id="contact" class="popup mfp-with-anim mfp-hide tm-bg-gray ">
    <a href="#" class="tm-close-popup">
        <i class="fas fa-times"></i>
    </a>
    <h2 class="tm-contact-col tm-color-primary tm-page-title tm-mb-40">Add Teacher</h2>
    <div class="tm-row tm-contact-row">
        <div class="tm-col tm-contact-col">
            <form id="teatcher-form" action="" method="POST" class="tm-contact-form">
                <div class="form-group">
                    <input type="text" name="teacherName" class="form-control rounded-0" placeholder="Teacher Name" required />
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control rounded-0" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <label for="major">Major:</label>
                    <select name="major" class="form-control" required>
                        <?php echo $majorOptions; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="active">Active:</label>
                    <select id="active" name="active" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dateFrom">Date From:</label>
                    <input type="date" id="dateFrom" name="dateFrom" required>
                </div>
                <div class="form-group">
                    <label for="dateTo">Date To:</label>
                    <input type="date" id="dateTo" name="dateTo" required>
                </div>
                <div class="form-group">
                    <label for="Academic">Academic Degree:</label>
                    <select name="Academic" class="form-control" required>
                        <option value="Bachelors">Bachelor's degree</option>
                        <option value="Postgraduate">Postgraduate Diploma</option>
                        <option value="Master">Master's degree</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <label for="type">type :</label>
                <select name="type-user" class="form-control" required>
                        <option value="Teacher">Teacher</option>
                        <option value="head">head departmant</option>
                        <option value="admin">admin</option>
                    </select>
                <div class="form-group tm-text-right">
                    <button type="submit" name="addteacher" id="addteacher" class="tm-btn tm-btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="stat" class="popup mfp-with-anim mfp-hide tm-bg-gray ">
    <a href="#" class="tm-close-popup">
        <i class="fas fa-times"></i>
    </a>
    <h2 class="tm-contact-col tm-color-primary tm-page-title tm-mb-40">Add statctic</h2>
    <div class="tm-row tm-contact-row">
        <div class="tm-col tm-contact-col">
        <section>
        <input type="file" id="excelFileInput" style="display: none;">
        <!-- <button id="backButton" style="float: left;">Back</button> -->
	<!-- <button id="importButton">Import from Excel</button> -->
    <button  name="importButton" id="importButton" class="tm-btn tm-btn-primary">Import from Excel</button>


            <!--for demo wrap-->
            <h1>Import from Excel</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                <th>Subject Number</th>
			<th>Subject Name</th>
			<th>number of student in Mandatory</th>
			<th>Number of Students in Optional </th>
		</tr>
                </thead>
              </table>
            </div>
            <div class="tbl-content">
              <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <?php

  ?>
              
                </tbody>
              </table>
            </div>
          </section>
          
 

        </div>
    </div>
</div>
                <div id="Courses" class="popup mfp-with-anim mfp-hide tm-bg-gray ">
            <a href="#" class="tm-close-popup">
                return home
                <i class="fas fa-times"></i>
            </a>
            <h2 class="tm-contact-col tm-color-primary tm-page-title tm-mb-40">Add  Courses</h2>
            <div class="tm-row tm-contact-row">
                <div class="tm-col tm-contact-col">
                
           
                    
                    <form id="contact-form" method="POST" class="tm-contact-form">
                                <div class="form-group">
               
                                    <input type="text" name="CoursesName" class="form-control rounded-0" placeholder="Courses Name" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="CoursesID" class="form-control rounded-0" placeholder="Courses ID" required />
        
                                </div>
                                <div class="form-group">
                <input type="text" name="precourseId" class="form-control rounded-0" placeholder="pre Course ID " required />

            </div>
                                <div class="form-group">
                                    <label for="major">Major:</label>
                                    <select name="major"  class="form-control" required>
                                     
                                     <?php echo $majorOptions; ?>
                                 </select>
                                   
                                </div>
                                <div class="form-group">
                                <label for="type">type:</label>
                            <select name="type" required>
                                <option value="theoretical">theoretical  &#160; &#160; &#160;&#160; &#160; &#160;</option>
                                <option value="laboratory">laboratory</option>
                            </select>
</div>
                               
                </div>
                <div class="tm-col tm-contact-col tm-contact-col-r">
                   
                    <div class="tm-col tm-contact-col">
                
                      
                            <form id="contact-form"  method="POST" class="tm-contact-form">
                            <div class="form-group">
                            <label for="year">Year:</label>
                            <select id="year" name="year" required>
                                <option value="1">First Year &#160; &#160; &#160;&#160; &#160; &#160;</option>
                                <option value="2">Second Year</option>
                                <option value="3">Third Year</option>
                                <option value="4">Fourth Year</option>
                            </select>
                
            </div>
        
                            <div class="form-group">

                            <label for="term">Term:</label>
                            <select name="term" required>
                                <option value="1">First Term &#160; &#160; &#160;&#160; &#160; &#160;</option>
                                <option value="2">Second Term</option>
                                <option value="3">Third Term</option>

                            </select>

                                </div>
                                <div class="form-group">
                                <input type="text" name="Capacity" class="form-control rounded-0" placeholder="Capacity Course  " required />

                                    </div>
                                <div class="form-group">
                                <div class="form-group tm-text-right">
                                    <button name="addcourse"  id="addcourse" type="submit"  class="tm-btn tm-btn-primary">Add  </button>
                                </div>
</div>
                            </form>
                            
                        </div>
                </div>
                <div id="hall" class="popup mfp-with-anim mfp-hide tm-bg-gray ">
            <a href="#" class="tm-close-popup">
                return home
                <i class="fas fa-times"></i>
            </a>
            <h2 class="tm-contact-col tm-color-primary tm-page-title tm-mb-40">Add  Hall</h2>
            <div class="tm-row tm-contact-row">
                <div class="tm-col tm-contact-col">
                
           
                    
                    <form id="hall-form" action="page/php/add-hall.php" method="POST" class="tm-contact-form" >
                                <div class="form-group">
               
                                    <input type="text" name="hallName" class="form-control rounded-0" placeholder="Hall Name" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="hallCapacity" class="form-control rounded-0" placeholder=" hall Capacity" required />
        
                                </div>
                               
                           
                                <div class="form-group">
                                <label for="type">type:</label>
                            <select name="type" required>
                                <option value="theoretical">theoretical  &#160; &#160; &#160;&#160; &#160; &#160;</option>
                                <option value="laboratory">laboratory</option>
                            </select>
                             </div>
                             <div class="form-group">
                                <div class="form-group tm-text-right">
                                    <button type="submit" name="addhall" id="addhall" class="tm-btn tm-btn-primary">Add  </button>
                                </div>
                        </form>          
                </div>
              
            </div>
        </div>
                

    <footer class="tm-footer">
        <span>Copyright &copy; 2024  Mutah University</span>
    
</footer>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>    
    <script src="js/templatemo-script.js"></script>

<script>
    
$(document).ready(function() {
    $('#addcourse').click(function(e) {
        e.preventDefault(); // منع الإرسال الافتراضي للنموذج

        // التحقق من المدخلات المطلوبة
        if (validateForm()) {
            // استدعاء الدالة التي تنفذ الإجراء المطلوب
            performAction();
        }
    });

    function validateForm() {
        var isValid = true;
        // التحقق من كل حقل من الحقول المطلوبة
        $('#contact-form input[required], #contact-form select[required]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                alert('يرجى ملء جميع الحقول المطلوبة');
                return false; // إيقاف التكرار إذا تم العثور على حقل فارغ
            }
        });
        return isValid;
    }

    function performAction() {
        // استخراج بيانات النموذج
        var formData = $('#contact-form').serialize();

        // إجراء طلب Ajax
        $.ajax({
            type: 'POST',
            url: 'page/php/add-course.php',
            data: formData,
            success: function(response) {
                // التعامل مع الاستجابة بعد النجاح
                if (response === 'success') {
                    alert("تمت إضافة القاعة بنجاح");
                } else {
                    alert("حدث خطأ أثناء إضافة القاعة");
                }
            },
            error: function(xhr, status, error) {
                // التعامل مع الخطأ في الطلب
                console.log(error);
                alert("حدث خطأ أثناء إرسال الطلب");
            }
        });
    }
});
</script>

<script>
$(document).ready(function() {
    $('#addteacher').click(function(e) {
        e.preventDefault(); // منع الإرسال الافتراضي لحدث النقر فقط
        
        // التحقق من المدخلات المطلوبة
        if (validateForm()) {
            // استدعاء الدالة التي تنفذ الإجراء المطلوب
            performAction();
        }
    });

    function validateForm() {
        var isValid = true;
        // التحقق من كل حقل من الحقول المطلوبة
        $('#teatcher-form input[required], #teatcher-form select[required]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                alert('يرجى ملء جميع الحقول المطلوبة');
                return false; // إيقاف التكرار إذا تم العثور على حقل فارغ
            }
        });
        return isValid;
    }

    function performAction() {
        // استخراج بيانات النموذج
        var formData = $('#teatcher-form').serialize();

        // إجراء طلب Ajax
        $.ajax({
            type: 'POST',
            url: 'page/php/add-teacher.php',
            data: formData,
            success: function(response) {
                // التعامل مع الاستجابة بعد النجاح
                console.log(response);
                if (response === "success") {
                    alert("تمت إضافة المعلم بنجاح");
                } else {
                    alert("حدث خطأ أثناء إضافة المعلم");
                }
            },
            error: function(xhr, status, error) {
                // التعامل مع الخطأ في الطلب
                console.log(error);
                alert("حدث خطأ أثناء إرسال الطلب");
            }
        });
    }
});
</script>

<script>
<script>
$(document).ready(function() {
    $('#addhall').click(function(e) {
        e.preventDefault(); // منع الإرسال الافتراضي للنموذج

        // التحقق من المدخلات المطلوبة
        if (validateForm()) {
            // استدعاء الدالة التي تنفذ الإجراء المطلوب
            performAction();
        }
    });

    function validateForm() {
        var isValid = true;
        // التحقق من كل حقل من الحقول المطلوبة
        $('#hall-form input[required], #hall-form select[required]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                alert('يرجى ملء جميع الحقول المطلوبة');
                return false; // إيقاف التكرار إذا تم العثور على حقل فارغ
            }
        });
        return isValid;
    }

    function performAction() {
        // استخراج بيانات النموذج
        var formData = $('#hall-form').serialize();

        // إجراء طلب Ajax
        $.ajax({
            type: 'POST',
            url: 'page/php/add-hall.php',
            data: formData,
            success: function(response) {
                // التعامل مع الاستجابة بعد النجاح
                if (response === 'success') {
                    alert("تمت إضافة القاعة بنجاح");
                } else {
                    alert("حدث خطأ أثناء إضافة القاعة");
                }
            },
            error: function(xhr, status, error) {
                // التعامل مع الخطأ في الطلب
                console.log(error);
                alert("حدث خطأ أثناء إرسال الطلب");
            }
        });
    }
});
</script>

<script>
		let importedData;

$(document).ready(function () {
    $("#importButton").on("click", function () {
        $("#excelFileInput").click();
    });

    $("#excelFileInput").on("change", function (e) {
        var file = e.target.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var data = new Uint8Array(e.target.result);
                var workbook = XLSX.read(data, { type: "array" });
                var sheetName = workbook.SheetNames[0];
                var sheet = workbook.Sheets[sheetName];
                importedData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
                displayDataInTable(importedData);
                $.post("page/php/save_data.php", { importedData: importedData }, function (response) {
                    alert(response);
                });
            };
            reader.readAsArrayBuffer(file);
        }
    });

    function displayDataInTable(data) {
        // Remove existing rows
        $("table tr:gt(0)").remove();

        // Append new rows based on imported data
        for (let i = 0; i < data.length; i++) {
            $("table").append("<tr><td>" + data[i].join("</td><td>") + "</td></tr>");
        }
        $("#saveButton").prop("disabled", false);
    }

    $("#saveButton").on("click", function () {
        console.log("Data to save:", importedData);
        alert("Data saved successfully!");
    });
});
document.getElementById('backButton').addEventListener('click', function() {
history.back();
});
	</script>
<script>
var cheack_value = document.getElementById('cheack').value;

if (cheack_value === 'Teacher') {
    var itemsToHide = document.querySelectorAll('.tm-nav-item:not(#about):not(#chooseCourses)');
    for (var i = 0; i < itemsToHide.length; i++) {
        itemsToHide[i].style.display = 'none';
    }
}
if(cheack_value === 'admin')
{
    var itemsToHide = document.querySelectorAll('.tm-nav-item:not(#add-hall):not(#add-teacher):not(#about):not(#EditCourses):not(#Editteacher)');
    for (var i = 0; i < itemsToHide.length; i++) {
        itemsToHide[i].style.display = 'none';
    }
}
if(cheack_value === 'head')
{
    var itemsToHide = document.querySelectorAll('.tm-nav-item:not(#add-hall):not(#acpect-teacher):not(#about):not(#add-courses):not(#create-table):not(#add-stat):not(#EditCourses):not(#Editteacher)');
    for (var i = 0; i < itemsToHide.length; i++) {
        itemsToHide[i].style.display = 'none';
    }
}
</script>
</body>
</html>