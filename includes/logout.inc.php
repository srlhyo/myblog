<?php

if (!isset($_POST["logout"])) {
    header("Location: ../index.php");
    exit;
}

session_start();
session_unset(); // clear out variables
session_destroy(); // delete session file
header("Location: ../index.php"); // send user back to home page
