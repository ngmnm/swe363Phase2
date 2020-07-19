<? session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Main-page/log.css">
    <link rel="stylesheet" href="Website-design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="Evaluation.css    ">
    <script src="/Main-page/LastDesignMainPage.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<!--Header-->
<?php include 'header.php'; ?>
<!--Page Content-->
<div class="middle">
    <table class="container">
        <tr>
            <td colspan="3">
                <div class="info">
                    <?php

                    $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                    $instructorID = $_GET['insID'];

                    $result = mysqli_query($con, "SELECT instructors.departmentName, instructors.name, instructors.picturePath, instructors.office, insProfile.email, insProfile.website 
                                                  FROM instructors
                                                  INNER JOIN insProfile ON instructors.id = insprofile.insID  AND instructors.id='$instructorID' ")
                        or die("error: " . mysqli_error($con));
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo " <h1>" . $row['name'] .  "</h1>";
                            echo "<p> Department: " . $row['departmentName'] . "</p>";
                            echo "<p> Office: " . $row['office'] . "</p>";
                            echo "<p> Email: <a href='mailto:" . $row['email'] . "' class='insEmail'>" . $row['email'] . "</a></p>";
                            echo "<p>Website: <a href='" . $row['website'] . "' class='insWebsite'>" . $row['website'] . "</a></p>
                                 </div></td>";
                            echo " <td>
                                      <div class='personal_info'>
                                          <img src='" . $row['picturePath'] . "'class='personalPhoto'>
                                     </div>
                                  </td>";



                            $_SESSION['email'] = $row['email'];
                            $_SESSION['id'] = $_GET['insID'];
                        }
                    }
                    ?>
        </tr>

        <tr>

            <td class="standard flip">
                <div class="card-inner">
                    <div class="card-front">
                        <h3>Voice</h3>
                        <?php
                        $con = mysqli_connect('localhost:3307', 'root', '', 'department');
                        $instructorID = $_GET['insID'];
                        $result = mysqli_query($con, "SELECT AVG(voice), count(voice), voiceCmnt
                                              FROM evaluation
                                              WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $star = ($row['AVG(voice)'] / 5) * 100;
                                echo "<div class='star-ratings-sprite'><span style='width:" . $star . "%' class='star-ratings-sprite- rating'></span></div>";
                                echo "  <span> (" . $row['count(voice)'] . ")</span></div>";
                            }
                        }
                        $result = mysqli_query($con, "SELECT  voiceCmnt FROM evaluation  WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "  <div class='card-back'>
                                <span>" . $row['voiceCmnt'] . "</span>
                            </div>";
                            }
                        }
                        ?>
                    </div>
            </td>
            <td class="standard flip">
                <div class="card-inner">

                    <div class="card-front">
                        <h3>Explaining</h3>
                        <?php
                        $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                        $instructorID = $_GET['insID'];

                        $result = mysqli_query($con, "SELECT AVG(explaining), count(explaining)
                              FROM evaluation
                              WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $star = ($row['AVG(explaining)'] / 5) * 100;
                                echo "<div class='star-ratings-sprite'><span style='width:" . $star . "%' class='star-ratings-sprite- rating'></span></div>";
                                echo "  <span> (" . $row['count(explaining)'] . ")</span></div>";
                            }
                        }
                        $result = mysqli_query($con, "SELECT  explainCmnt FROM evaluation  WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "  <div class='card-back'>
                    <span>" . $row['explainCmnt'] . "</span>
                </div>";
                            }
                        }
                        ?>
                    </div>

            </td>
            <td class="standard flip">
                <div class="card-inner">
                    <div class="card-front">
                        <h3>Quizes</h3>
                        <?php
                        $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                        $instructorID = $_GET['insID'];

                        $result = mysqli_query($con, "SELECT AVG(quizes), count(quizes)
                              FROM evaluation
                              WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $star = ($row['AVG(quizes)'] / 5) * 100;
                                echo "<div class='star-ratings-sprite'><span style='width:" . $star . "%' class='star-ratings-sprite- rating'></span></div>";
                                echo "  <span> (" . $row['count(quizes)'] . ")</span></div>";
                            }
                        }
                        $result = mysqli_query($con, "SELECT  quizesCmnt FROM evaluation  WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "  <div class='card-back'>
                                  <span>" . $row['quizesCmnt'] . "</span>
                                      </div>";
                            }
                        }
                        ?>
                    </div>
            </td>
            <td class="standard flip">
                <div class="card-inner">
                    <div class="card-front">
                        <h3>Attendence</h3>
                        <?php


                        $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                        $instructorID = $_GET['insID'];

                        $result = mysqli_query($con, "SELECT AVG(attend), count(attend)
                              FROM evaluation
                              WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $star = ($row['AVG(attend)'] / 5) * 100;
                                echo "<div class='star-ratings-sprite'><span style='width:" . $star . "%' class='star-ratings-sprite- rating'></span></div>";
                                echo "  <span> (" . $row['count(attend)'] . ")</span></div>";
                            }
                        }
                        $result = mysqli_query($con, "SELECT  attendCmnt FROM evaluation  WHERE id='$instructorID' ")
                            or die("error: " . mysqli_error($con));
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "  <div class='card-back'>
                      <span>" . $row['attendCmnt'] . "</span>
                          </div>";
                            }
                        }
                        ?>
                    </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h3>Final Grade</h3>
                <?php


                $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                $instructorID = $_GET['insID'];

                $result = mysqli_query($con, "SELECT AVG(attend), AVG(quizes), AVG(quizes), AVG(explaining), AVG(voice), count(voice)
                 FROM evaluation WHERE id='$instructorID' ")
                    or die("error: " . mysqli_error($con));
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sum = ($row['AVG(attend)'] / 5) + ($row['AVG(quizes)'] / 5) + ($row['AVG(explaining)'] / 5) + ($row['AVG(voice)'] / 5);
                        $finalgrade = $sum / 4 * 100;
                        echo "<div class='star-ratings-sprite'><span style='width:" . $finalgrade . "%' class='star-ratings-sprite- rating'></span></div>";
                        echo "  <span> (" . $row['count(voice)'] . ")</span>";
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="comments">
                <h3>comments</h3></br>

                <?php


                $con = mysqli_connect('localhost:3307', 'root', '', 'department');

                $instructorID = $_GET['insID'];

                $result = mysqli_query($con, "SELECT comments FROM evaluation WHERE id='$instructorID' ")
                    or die("error: " . mysqli_error($con));
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<span>" . $row['comments'] . "</span></br>";
                                        }
                }
                ?>

            </td>
        </tr>
        <tr>
            <?php
            $con = mysqli_connect('localhost:3307', 'root', '', 'department');

            $instructorID = $_GET['insID'];

            $result = mysqli_query($con, "SELECT  email  FROM insProfile WHERE insID='$instructorID' ")
                or die("error: " . mysqli_error($con));
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo " <td colspan='4' class='evaluate' id='" . $instructorID . "' onclick='form(this.id)'>Evaluate </td>";
                }
            }
            ?>
        </tr>

    </table>
    <script type="text/javascript">
        function form(click) {
            location.href = "EvaluationForm.php?insID=" + click;
        }
    </script>

</div>
<<!--Page Wrapper-->
    <div class="page-wrapper"></div>
    <!-- Footer-->
    <?php include 'footer.php'; ?>
    </body>

</html>