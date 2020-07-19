<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
  <link rel="stylesheet" href="Website-design.css">
  <link rel="stylesheet" href="log.css">
  <link rel="stylesheet" href="CoursesList.css">
  <script src="/Main-page/LastDesignMain.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <!--Header-->
  <?php include 'header.php'; ?>

  <script type="text/javascript">
    function resourceP(clicked_id) {
      location.href = "Sources.php?courseCategory=" + clicked_id;
    }
  </script>
  <script type="text/javascript">
    function UploadPage(clicked_id) {
      location.href = "upload.php?" + clicked_id;
    }
  </script>
  <!--Page Contetn-->
  <div class="middle">
    <ul class="ulu">
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li style='list-style-type: none;width: 100%;text-align: right;height: 30px;'class='specialL' id='specialL &courseID=" . $courseID . "' onclick=' UploadPage(this.id);'>";
      ?>
      <span class="course" class="specialL"> <button class="button">Uplode File</bitton></span>
      <span class="download"><i class="fa fa-upload" aria-hidden="true"></i></span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li class='lil' id='slide&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">Slides & Lecture notes</span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li class='lil' id='book&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">E-book</span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li class='lil' id='exam&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">Old Exams</span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li class='lil' id='quiz&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">Quizzes</span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
      $courseID = $_GET['courseID'];
      echo " <li class='lil' id='homework&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">Homeworks</span>
      </li>
      <?php
      $con = mysqli_connect('localhost:3307', 'root', '', 'department');
        $courseID = $_GET['courseID'];
      echo " <li class='lil' id='lab&courseID=" . $courseID . "' onclick=' resourceP(this.id);'>";
      ?>
      <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
      <span class="course">Lab</span>
      </li>
    </ul>
  </div>
  <!--Page wrapper-->
  <div class="page-wrapper">

  </div>
  <!-- Footer-->
  
  <?php include 'footer.php'; ?>


</body>

</html>