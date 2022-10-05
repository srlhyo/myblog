<?php

if (isset($_POST["signup"])) {
    
    require "database.inc.php";

    // fetch the user info
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $passw = $_POST["passw"];
    $re_passw = $_POST["re-passw"];

    // for testing purposes
    // $mail = "asdsadsadas";

    if (empty($username) || empty($mail) || empty($passw) || empty($re_passw)) {
        header("Location: ../signup.php?error=emptyFields");
        exit;

    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidUmail");
        exit;

    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidMail&username=". $username);
        exit;

    } elseif (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidUsername&mail=" . $mail);
        exit;

    } elseif ($passw != $re_passw) {
        header("Location: ../signup.php?error=wrongPsswMatch&username=" . $username . "&mail=" . $mail);
        exit;

    } else {

        // check if user already exists!

        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit;

        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail" . $mail);
                exit;

            } else {
                $sql = "INSERT INTO users (username, email, passw) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit;

                } else {

                    $hashed_password = password_hash($passw, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $mail, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
        
                }
                
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header("Location: ../signup.php");
    exit;

}