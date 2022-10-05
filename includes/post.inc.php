<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

if (!isset($_POST["edit-post"])) {
    header("Location: ../index.php");
    exit;
}

require "database.inc.php";

$title = $_POST["title-post"];
$body = $_POST["body-post"];

//check for empty fields
if (empty($title) || empty($body)) {
    header("Location: ../index.php?error=emptyFields");
    exit;

}

$sql = "INSERT INTO posts (title, body, user_id, created_at) VALUES (?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit;
}

session_start();

date_default_timezone_set('Europe/London');
$date = date('Y-m-d H:i:s');

mysqli_stmt_bind_param($stmt, "ssis", $title, $body, $_SESSION["userid"], $date);
mysqli_stmt_execute($stmt);
header("Location: ../index.php?post=sucess");

mysqli_stmt_close($stmt);
mysqli_close($conn);



