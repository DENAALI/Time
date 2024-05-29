<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Teacher Management</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Teacher Management</h2>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search Teacher" name="search" aria-label="Search Teacher" aria-describedby="button-addon2">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>        </form>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form>
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department Number</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- سيتم ملء البيانات هنا بواسطة PHP -->
                    <?php include 'search_teacher.php'; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>        </form>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        // تأكيد حذف المعلم
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this teacher?")) {
                window.location.href = "delete_teacher.php?id=" + id;
            }
        }
    </script>
</body>

</html>
