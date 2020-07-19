<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
  <link rel="stylesheet" href="log.css">
  <link rel="stylesheet" href="Website-design.css">
  <link rel="stylesheet" href="CoursesList.css">
  
  <script src="LastDesignMainPage.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <!--Header-->
  <?php include 'header.php'; ?>

  <!--Page Contetn-->
  <div class="middle">

    <script type="text/javascript">
      function courseC(clicked_id) {
        location.href = "CoursCategores.php?courseID=" + clicked_id;
      }
    </script>

    <ul class="ulu">
      <?php

      $con = mysqli_connect('localhost:3307', 'root', '', 'department');

      $departmentName = $_GET['depName'];
      $result = mysqli_query($con, "SELECT  courseName FROM courses WHERE departmentName = '$departmentName'") or die("error: " . mysqli_error($con));

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<li class='lil' id='" . $row['courseName'] . " 'onClick='courseC(this.id)''>
                <span class='icon' ><i class='fa fa-folder' aria-hidden='true'></i></span>
                <span class='course'>" . $row['courseName'] . " </span>
                </li>";
        }
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