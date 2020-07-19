<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'useraccounts');


if (!$con) {
    die("connectionfailed");
}
if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $re_pass = $_POST['re-pwd'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../Main-page/signForm.php?error=invalidmailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Main-page/signForm.php?error=invalidmail&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../Main-page/signForm.php?error=invalidusername&email=" . $email);
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: ../Main-page/signForm.php?error=passwordcheck&email=" . $email . "&username=" . $username);

        exit();
    } else {
        $sql = "SELECT email FROM users  WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Main-page/signForm.php?error=sqlerror");

            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $result = mysqli_stmt_num_rows($stmt);

            if ($result > 0) {
                header("Location: ../Main-page/signForm.php?error=accountexist&user=" . $username);
                exit();
            } else {
                $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../Main-page/signForm.php?error=sqlerror");

                    exit();
                } else {
                    $hashpass = password_hash($pass, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpass);
                    mysqli_stmt_execute($stmt);

                    session_start();
                    
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['email'] = $row['email'];


                    header("Location: ../Main-page/LastDesignMain.php?success=loged");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    echo mysqli_error($con);
    exit();
}
