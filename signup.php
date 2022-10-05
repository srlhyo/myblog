<?php 
    require 'header.php';
?>
    <main>
        <h1>SIGN UP</h1>
        <form action="/includes/signup.inc.php" method="post">
            <input type="text" name="username" id="username" placeholder="Username...">
            <input type="email" name="mail" id="mail" placeholder="E-mail...">
            <input type="password" name="passw" id="passw" placeholder="Password...">
            <input type="password" name="re-passw" id="re-passw" placeholder="Repeat password...">
            <button type="submit" name="signup">Signup</button>
        </form>
        
    </main>
<?php 
    require 'footer.php';
?>