<?php

require_once "../vendor/autoload.php";

?><!DOCTYPE html>
<html>
    <body>
        <form action="index.php" method="POST">
            Username:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="password" name="password">
            <input type="submit" name="submitLogin" value="Submit">
        </form>
    </body>
</html>
