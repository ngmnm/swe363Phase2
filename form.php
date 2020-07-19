<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'department');


if (!$con) {
    die("connection failed");
}
if (isset($_POST['submit'])) {


    session_start();
    $id =$_SESSION['id'];
    

    
    $voice = $_POST['voice'];
    $VComment = $_POST['voiceCmnt'];

    echo $voice;
    $explaining = $_POST['explaining'];
    $EComment = $_POST['explainingCmnt'];

    $Quizes = $_POST['quizes'];
    $QComment = $_POST['quizesCmnt'];

    $attendence = $_POST['attendence'];
    $AComment = $_POST['attendenceCmnt'];

    $comment = $_POST['Cmnt'];

   

    if (empty($id)) {
        header("Location: form.php? error");
    } else {
        $sql = "INSERT INTO evaluation 
            (id, voice, voiceCmnt, explaining, explainCmnt, quizes, quizesCmnt, attend, attendCmnt, comments)
     VALUES ('$id', '$voice', '$VComment', '$explaining','$EComment','$Quizes','  $QComment ','$attendence','$AComment','$comment')";


        if (mysqli_query($con, $sql)) {

            header("Location: Evaluation.php?insID=" . $id);
            exit();
        } else {
            echo "erro" . mysqli_error($con);
        }
    }
}
