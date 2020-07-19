<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation form</title>
    <link rel="stylesheet" href="/Main-page/Website-design.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="/Main-page/LastDesignMainPage.js"></script>
    <link rel="stylesheet" href="/Main-page/log.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>
    <!--Page wrapper-->
    <div class="page-wrapper">
    </div>
    <!--Evaluation form-->
    <div class="middle">
        <form style="color: black;" class="form container" action="form.php" method="POST">
            <table id="table">
                <tr>
                    <td colspan="4">
                        <h3>Before you evaluate the instructor remember that the other students can see this evaluation
                            so
                            make sure to use appropriate words in comments</h3>
                        <h4>Note: the scale will be from 1 to 5 where 1 is the lowest rating and 5 is the highest</h4>
                    </td>
                </tr>
                <tr>
                    <th id="standard">standard </th>
                    <th id="rating">rating </th>
                    <th>comment </th>
                </tr>
                <tr>
                    <td>Voice</td>
                    <td>
                        <pre>1  2  3  4  5</pre>
                        <input type="radio" name="voice" value="1">
                        <input type="radio" name="voice" value="2">
                        <input type="radio" name="voice" value="3">
                        <input type="radio" name="voice" value="4">
                        <input type="radio" name="voice" value="5">
                    </td>
                    <td class="commentCell"><input type="text" name="voiceCmnt" class="  comment"></td>
                </tr>

                <tr>
                    <td ">explaining</td>
                     <td>
                        <pre>1  2  3  4  5</pre>                       
                        <input type="radio" name="explaining" value="1">
                        <input type="radio" name="explaining" value="2">
                        <input type="radio" name="explaining" value="3">
                        <input type="radio" name="explaining" value="4">
                        <input type="radio" name="explaining" value="5">
                    </td>
                    <td class="commentCell"><input type="text" name="explainingCmnt" class="explaining  comment"></td>
                </tr>

                <tr>
                    <td>Quizes</td>

                    <td>
                        <pre>1  2  3  4  5</pre>
                        <input type="radio" name="quizes" value="1">
                        <input type="radio" name="quizes" value="2">
                        <input type="radio" name="quizes" value="3">
                        <input type="radio" name="quizes" value="4">
                        <input type="radio" name="quizes" value="5">
                    </td>
                    <td class="commentCell"><input type="text" name="quizesCmnt" class="quizes comment"></td>
                </tr>

                <tr>
                    <td>Attendence</td>

                    <td>
                        <pre>1  2  3  4  5</pre>
                        <input type="radio" name="attendence" value="1">
                        <input type="radio" name="attendence" value="2">
                        <input type="radio" name="attendence" value="3">
                        <input type="radio" name="attendence" value="4">
                        <input type="radio" name="attendence" value="5">
                    </td>
                    <td class="commentCell"><input type="text" name="attendenceCmnt" class="attendence  comment"></td>
                </tr>

                <tr>
                    <td colspan="4" class="commentCell">
                        <h3>addition comment</h3><input type="text" name="Cmnt" id="addition_comment">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" id="submitCell">

                        <button class="submitForm" name="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>


    </div>
    <!-- Footer-->
    <?php include 'footer.php'; ?>

</body>

</html>