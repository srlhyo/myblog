<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebetter Blog</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="container">
        <header>
            <h1><span>blog</span>.bebetter.test</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION["username"])) {?>
                        <form action="/includes/logout.inc.php" method="post">
                            <button type="submit" name="logout" class="btn-f">Logout</button>
                        </form>
                    <?php } else {?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>