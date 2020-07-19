<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'useraccounts');


if (!$con) {
    die("connectionfailed");
}
if (isset($_POST['login'])) {

    $email = $_POST['mail'];
    $pass = $_POST['pass'];

    if (empty($email) || empty($pass)) {

        header("Location: /Main-page/LastDesignMain.php?error=emptyfiled");
        exit();
    } else {
        $sql = "SELECT * FROM users  WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: /Main-page/LastDesignMain.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($pass, $row['password']);

                if ($passcheck == false) {
                    header("Location: /Main-page/LastDesignMain.php?error=wrongpass");
                    exit();
                } else if ($passcheck == true) {
                    session_id("name");
                    session_start();
                    // session_id("name");
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    session_start();  // needed for sessions.
                    if (isset($_SESSION['url']))
                        $url = $_SESSION['url']; // holds url for last page visited.
                    else
                        $url = "Main-page/LastDesignMain.php?"; // default page for 

                    header("Location: $url");
                }
            } else {


                header("Location: /Main-page/LastDesignMain.php?error=emaildoesntexist");

                exit();
            }
        }
    }
}
