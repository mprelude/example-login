<?php

require_once "../vendor/autoload.php";

if (true === isset($_POST['username'])) {
    if ("" === $_POST['username'] || "" === $_POST['password']) {
        echo "<div id='message'>Please enter username &amp; password.</div>";
    } elseif ("user" === $_POST['username'] && "password" === $_POST['password']) {
        echo "<div id='message'>Access granted.</div>";
    } else {
        echo "<div id='message'>Access denied.</div>";
    }
}

?>
<!DOCTYPE html>
<html>
    <body>
        <?php if (true === isset($_POST['username'])): ?>
            <?php if ("" === $_POST['username'] || "" === $_POST['password']): ?>
                <div id='message'>Please enter username &amp; password.</div>
            <?php elseif ("user" === $_POST['username'] && "password" === $_POST['password']): ?>
                <div id='message'>Access granted.</div>
            <?php else: ?>
                <div id='message'>Access denied.</div>
            <?php endif; ?>
        <?php endif; ?>
        <form action="index.php" method="POST">
            Username:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="password" name="password">
            <input type="submit" name="submitLogin" value="Submit">
        </form>
    </body>
</html>
