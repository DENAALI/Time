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
    <title>Acept Teacher</title>
    <?php 
    session_start();
    ?>
</head>

<body>

    <div class="content">
        
        <form method="post" action="../../page/php/Acept.php">
            <div class="container">
         

                <h2 class="mb-5">Acept Teacher</h2>
                
                <input type="search" placeholder="Search Course" name="search" id="search">
                <div class="table-responsive custom-table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="control__indicator"></div>
                                </th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../connect.php';

                            $sql = "
                            SELECT 
                            t.id AS id,
                                t.name AS teacher_name,
                                t.email AS teacher_email,
                                t.degree AS teacher_degree,
                                sub.id AS subject_id,
                                sub.name AS subject_name,
                                sub.year AS subject_year,
                                sub.semester AS subject_semester,
                                sub.type_name AS subject_type
                            FROM 
                                tetches te
                            JOIN 
                                teacher t ON te.techer_id = t.id and state=0
                            JOIN 
                                subjects sub ON te.subject_id = sub.subject_id group by t.name
                            ";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                        <th scope="row">
                                            <label class="control control--checkbox">
                                            <input type="hidden" name="id" value="'.$row['id'].'">
                                                <input type="checkbox" name="select[]" value="' . htmlspecialchars($row['subject_name']) . '" />
                                                <div class="control__indicator"></div>
                                            </label>
                                        </th>
                                        <td>' . htmlspecialchars($row['teacher_name']) . '</td>
                                        <td>' . htmlspecialchars($row['teacher_email']) . '</td>
                                        <td>' . htmlspecialchars($row['teacher_degree']) . '</td>
                                        <td>' . htmlspecialchars($row['subject_name']) . '</td>
                                        <td>' . htmlspecialchars($row['subject_year']) . '</td>
                                        <td>' . htmlspecialchars($row['subject_semester']) . '</td>
                                        <td>' . htmlspecialchars($row['subject_type']) . '</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No data available</td></tr>";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>

                <button type="submit" name="ok">OK</button>
                <button type="button" onclick="history.back()">Back</button>
        </form>
    </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
