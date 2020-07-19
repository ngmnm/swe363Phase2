<?php

session_start();
session_destroy();

// Redirect to the main page:
header('Location: /final-version/Main-page/LastDesignMain.php');
?>