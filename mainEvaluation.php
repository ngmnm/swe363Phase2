<? session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="/Main-page/Website-design.css">
    <link rel="stylesheet" href="mainEvaluation.css">
    <link rel="stylesheet" href="/Main-page/log.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/Main-page/LastDesignMainPage.js"></script>

   
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>
    <!--Page content-->
    <div class="middle">
        <div class="container">
            <div id="intro">
                <h1><?php echo $_GET['depName'];  ?>
                    Instructors' Evaluation</h1>
                <p>In this page you can find the list of instructors and their evaluations from the students based on some standards </p>
            </div>

            <script type="text/javascript">
                function inProfile(clicked_id) {
                    location.href = "Evaluation.php?insID=" + clicked_id;
                }
            </script>
            <!-- siplay the instructors -->
            <?php

            $con = mysqli_connect('localhost:3307', 'root', '', 'department');

            $departmentName = $_GET['depName'];
            $result = mysqli_query($con, "SELECT id, name, picturePath, office FROM instructors WHERE departmentName = '$departmentName'") or die("error: " . mysqli_error($con));

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<button class='instructor' id='" . $row['id'] . "' onClick='inProfile(this.id)' type='button'>";
                    echo " <img src=" . $row['picturePath'] . " height='54px'>";
                    echo "<h3> " . $row['name'] . "</h3>";
                    echo "<p id='office'>Office: " . $row['office'] . "</p> </button>";
                }
            }
            ?>
            <div>
                <div>
                    <!--Footer-->
                    <?php include 'footer.php'; ?>

</body>

</html>