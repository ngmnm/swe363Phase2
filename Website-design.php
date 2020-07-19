<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFUPM Collection</title>
    <!-- <link rel="stylesheet" href="/Main-page/LastDesignMain.css"> -->
    <link rel="stylesheet" href="Website-design.css">


</head>

<body>
    <?php
    $host = "localhost:3307";
    $username = "root";
    $dbname = "department";

    $con = new mysqli($host, $username, '', $dbname);
    if ($con->connect_error) {
        die("Connectin Failed :" . $con->connect_error);
    }
    if (isset($_POST['searchsubmit'])) {
        $searchText = $_POST['searchbar'];
        $searchText = htmlspecialchars($searchText);
        $searchText = mysqli_real_escape_string($con, $searchText);
        $sql = "SELECT * FROM instructors           
        WHERE (`name` LIKE '%" . $searchText . "%') " or die(mysqli_error($con));
        $raw_results = mysqli_query($con, $sql);
        if (mysqli_num_rows($raw_results) > 0) {
            while ($results = mysqli_fetch_array($raw_results)) {
                $insID = "SELECT id FROM instructors where name= '$results[name]'  ";
                $raw = mysqli_query($con, $insID);

                while ($row = mysqli_fetch_array($raw)) {
                    $id = $row['id'];
                }

                echo "<button class='result' id='" . $id . "' onClick='inProfile(this.id)'  type='button'> " . $results['name'] . "</button>";
            }
        } else {
            echo "No results";
        }
    }


    if (isset($_POST['contactsubmit'])) {
        $contactemail = $_POST['contactemail'];
        $contactmessage = $_POST['contactmessage'];
        // $subject = "Do not replay to this email";
        $sql = "INSERT INTO contactus (`email`, `message`) VALUES ('$contactemail', '$contactmessage')";
        if (mysqli_query($con, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';


            // mail($contactemail, $subject, "Your message: " . $contactmessage . " Has been recived.");
        } else {
            echo 'failed to insert';
        }
    }


    ?>
    <script type="text/javascript">
        function inProfile(clicked_id) {
            location.href = "Evaluation.php?insID=" + clicked_id;
        }
    </script>
</body>

</html>