<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Table #8</title>
    <?php 
    session_start();
    ?>
</head>

<body>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Table #8</h2>
           
            <input type="search" placeholder="Search Course" name="search" id="search" oninput="searchCourses()">
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="control__indicator"></div>
                            </th>
                            <th scope="col">Year</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Major ID</th>
                            <th scope="col">Subject ID</th>
                            <th scope="col">Pre Sub Num</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type Name</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <!-- سيتم ملء البيانات هنا بواسطة AJAX -->
                    </tbody>
                </table>
                <button onclick="goBack()" class="btn btn-secondary mb-3">Back</button>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadAllCourses();
        });

        function loadAllCourses() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'load_all_courses.php', true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('table-body').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        function searchCourses() {
            var searchQuery = document.getElementById('search').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'search_courses.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('table-body').innerHTML = this.responseText;
                }
            };
            xhr.send('search=' + searchQuery);
        }

        function editSubject(id) {
            window.location.href = "edit_subject.php?id=" + id;
        }

        function deleteSubject(id) {
            if (confirm("Are you sure you want to delete this subject?")) {
                window.location.href = "delete_subject.php?id=" + id;
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
