<?php
    if(!isset($_SESSION["loginFail"])) {
        $_SESSION["loginFail"] = false;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log In</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./assets/image/cufavicon.ico">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/process.css">
    </head>
    <body class="school-bg">
        <form action="./src/login_handler.php" method="POST" class="login">
            <div class="flex row">
                <h2> Login </h2>
            </div>
            <div class="flex row">
                <img src="./assets/image/ucsy-logo.png" class="logo" alt="ucsy-logo">
            </div>
            <?php
                if($_SESSION["loginFail"]) {
                    echo "<div class='error-message'> Wrong Login Info, Please Try Again ! </div>";
                }
            ?>
            <div class="input-wrapper">
                <label for="username"> 
                    <input type="text" name="username" required> 
                </label>
            </div>
            <div class="input-wrapper">
                <label for="password">
                    <input type="password" name="password" required>
                </label> 
            </div>
            <div class="flex row">
                <button type="submit" name="logButton" value="login"> Log In </button>
            </div>
        </form>
    </body>
</html>