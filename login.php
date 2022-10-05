<?php 
    require 'header.php';
?>
    <main>
        <form action="/includes/login.inc.php" method="post">
            <input type="text" name="mailuname" id="mailuname" placeholder="Username/E-mail...">
            <input type="password" name="passw" id="passw" placeholder="Password...">
            <button type="submit" name="login">Login</button>
        </form>
        
    </main>
<?php 
    require 'footer.php';
?>