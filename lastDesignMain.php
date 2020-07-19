<? session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFUPM Collection</title>
    <link rel="stylesheet" href="/Main-page/LastDesignMain.css">
    <link rel="stylesheet" href="/Main-page/Website-design.css">
    <link rel="stylesheet" href="/Main-page/log.css">
    <script src="/Main-page/LastDesignMainPage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

  
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>
    <!--Page content-->
    <div class="middle">
        <div class="container">


            <!-- redirect to the evaluation or resources pages -->
            <script type="text/javascript">
                function evaluation(clicked_id) {
                    location.href = "mainEvaluation.php?depName=" + clicked_id;
                }

                function resources(clicked_id) {
                    location.href = "CoursesList.php?depName=" + clicked_id;
                }
            </script>


            <!-- display departments -->
            <?php
            $con = mysqli_connect('localhost:3307', 'root', '', 'department');

            $result = mysqli_query($con, "SELECT name, icon FROM departments") or die("error: " . mysqli_error($con));

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg1'>";
                    echo "<h2><i class='" . $row['icon'] . "'></i></h2>";
                    echo "<p class='course'  >" . $row['name'] . "</p>";
                    echo "<button class='button' id='" . $row['name'] . "' onClick='resources(this.id)'>Resources</button>";
                    echo "<button class='button' id='" . $row['name'] . "' onClick='evaluation(this.id)'>Instructors Evaluation</button></div>";
                }
            }
            ?>

        </div>
        <!--Page wrapper-->
        <div class="page-wrapper"></div>

        <!-- Footer-->
        <?php include 'footer.php'; ?>
      
</body>

</html>