<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="Website-design.css">
    <link rel="stylesheet" href="CourseList.css">

    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="CoursesList.css">

    <script src="LastDesignMain.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Page Contetn-->
    <div class="middle" >


        <ul class="ulu">
            <?php

            $con = mysqli_connect('localhost:3307', 'root', '', 'department');

            $courseID = $_GET['courseID'];
            $ID = "SELECT * ID FROM resources";
            $courseCategory = $_GET['courseCategory'];
            $sql = "SELECT  * FROM resources
      WHERE (courseId = '$courseID' AND courseCategory='$courseCategory') ";
            $result = mysqli_query($con, $sql);
            $result2 = mysqli_query($con, $ID);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='lil' id='" . $row['ID'] . " '>";
                    echo "<span class='icon' ><i class='fa fa-file' aria-hidden='true'></i></span>";
                    echo "  <span class='course'>" . $row['resourceName'] . " </span>";
                    echo "  <a href='download.php?id=" . $row['ID'] . "'style='width:5%;> <button style='width:100%;' class='download' name='downloadbtn'>
                        <i class='fa fa-download' aria-hidden='true'></i></button></li></a>";
                }
            } else {
                echo 'There is no resources';
            }

            ?>

        </ul>
    </div>
    <!--Page wrapper-->
    <div class="page-wrapper">

    </div>
    <!-- Footer-->
    <?php include 'footer.php'; ?>

</body>

</html>