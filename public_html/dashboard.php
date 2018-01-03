<?php 
    require("../lib/authorization.php");
    
    if (!IsRememberMeEnabled() && !IsLoggedIn()) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>User Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="../requests-handler.php" method="post">
            <input type="hidden" name="form-name" value="logout">
            <button type="submit">Log Out</button>
        </form>
    </body>
</html>
