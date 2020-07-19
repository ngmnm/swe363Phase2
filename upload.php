<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>upload file</title>
  <link rel="stylesheet" href="Website-design.css">
  <link rel="stylesheet" href="Upload.css">
  <link rel="stylesheet" href="/Main-page/log.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <script src="/Main-page/LastDesignMainPage.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

  <!--Header-->
  <?php include 'header.php'; ?>
  <!--content-->
  <div class="container">
    <form action="#" method="POST" enctype="multipart/form-data">
      <input type="text" placeholder="File Name" id="filename" name="filename">
      <input type="file" id="myFile" name="file">
      <h4> Categories:</h4>
      <div class="custom-select" style="width:200px;">
        <select name="selectfolder">
          <option value="0"></option>
          <option value="slide" id="slide">Slides & Lecture notes</option>
          <option value="book" name="book">E-book</option>
          <option value="exam" name="exam">Old Exams</option>
          <option value="quiz" name="quiz">Quizzes</option>
          <option value="homework" name="homework">Homeworks</option>
          <option value="lab" name="lab">Lab</option>
        </select>
      </div>
      <input type="submit" value="Submit" id="submitFile" name="submitfile" onclick="document.getElementById('popupmsg').style.display='block'">
    </form>
  </div>
  <!--PHP-->
  <?php
  $con = new mysqli('localhost:3307', 'root', '', 'department');
  if ($con->connect_error) {
    die("Connectin Failed :" . $con->connect_error);
  } else {
    echo '';
  }
  if (isset($_POST['submitfile'])) {
    $fileNameByUser = $_POST['filename'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf', 'docx', 'jpg', 'jpeg', 'png', 'zip', 'rar', 'txt');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 100000) {
          $fileDistenation = 'C:/xampp/htdocs/Trial/Project/Upload/' . $fileName;
          move_uploaded_file($fileTmpName, $fileDistenation);
          // ?Data Insertion to DB
          $courseId = $_GET['courseID'];
          echo $courseId;
          $dir_option = $_POST['selectfolder'];
          if ($dir_option === "slide") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','slide','$fileNameByUser','$fileDistenation')";
          } else if ($dir_option === "book") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','book','$fileNameByUser','$fileDistenation')";
          } else if ($dir_option === "exam") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','exam','$fileNameByUser','$fileDistenation')";
          } else if ($dir_option === "quiz") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','quiz','$fileNameByUser','$fileDistenation')";
          } else if ($dir_option === "homework") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','homework','$fileNameByUser','$fileDistenation')";
          } else if ($dir_option === "lab") {
            $sql = "INSERT INTO resources (`courseID`,`CourseCategory`,`resourceName`,`resource`) 
            VALUES ('$courseId','lab','$fileNameByUser','$fileDistenation')";
          }





          if (mysqli_query($con, $sql)) {
            echo '<p class="popmsg">File Uploaded Successfully</p>';
          } else {
            echo '<p class="popmsg">File Could no be save in the Database</p>';
            echo ("Error description: " . mysqli_error($con));
          }
        } else {
          echo '<p class="popmsg">File Is too big</p>';
        }
      } else {
        echo '<p class="popmsg">File Can not be uploaded</p>';
      }
    } else {
      echo '<p class="popmsg">File Extension Not Supported</p>';
    }
  }
  ?>
  <!--Page wrapper-->
  <div class="page-wrapper">

  </div>
  <!-- Footer-->
  <?php include 'footer.php'; ?>

  <script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>

</body>

</html>