<?php

if (!isset($_POST["login"])) {
    header("Location: ../login.php");
    exit;

}

require "database.inc.php";

// fetch the user info
$mailOrUname = $_POST["mailuname"];
$passw = $_POST["passw"];

if (empty($mailOrUname) || empty($passw)) {
    header("Location: ../signup.php?error=emptyFields");
    exit;

}

$sql = "SELECT id, username, passw FROM users WHERE username=? OR email=?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=sqlerror");
    exit;

}

mysqli_stmt_bind_param($stmt, "ss", $mailOrUname, $mailOrUname);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: ../login.php?error=nouser");
    exit;
}
    
$pwdCheck = password_verify($passw, $row["passw"]);

if ($pwdCheck == false) {
    header("Location: ../login.php?error=wrongpassw");
    exit;

}

session_start();
$_SESSION["userid"] = $row["id"];
$_SESSION["username"] = $row["username"];

header("Location: ../index.php?login=success");


mysqli_stmt_close($stmt);
mysqli_close($conn);

exit;

