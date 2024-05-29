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
   
        <form method="post" action="../to-teach.php">
            <div class="container">
                
                <h2 class="mb-5">Choose Courses</h2>
                <div class="table-responsive custom-table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <!-- <label class="control control--checkbox">
                                        <input type="checkbox" class="js-check-all" /> -->
                                        <div class="control__indicator"></div>
                                    </label>
                                </th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Number of Students</th>
                                <th scope="col">Capacity</th>
                                <th scope="col">Sections</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../connect.php';

                            $sql = "
                              SELECT 
                                s.subject_id,
                                s.name AS subject_name,
                                st.num_of_study,
                                s.Capacity,
                                CEIL(st.num_of_study / s.Capacity) AS sections
                              FROM 
                                subjects s
                              JOIN 
                                statistics st ON s.subject_id = st.subject_num
                            ";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                        <th scope="row">
                                            <label class="control control--checkbox">
                                                <input type="checkbox" name="select[]" value="' . htmlspecialchars($row['subject_name']) . '" />
                                                <div class="control__indicator"></div>
                                            </label>
                                        </th>
                                        <td>' . htmlspecialchars($row['subject_name']) . '</td>
                                        <td>' . htmlspecialchars($row['num_of_study']) . '</td>
                                        <td>' . htmlspecialchars($row['Capacity']) . '</td>
                                        <td>' . htmlspecialchars($row['sections']) . '</td>
                                    </tr>
                                    <tr class="spacer">
                                        <td colspan="100"></td>
                                    </tr>';
                                }
                            } else {
                                echo "<tr><td colspan='5'>No data available</td></tr>";
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