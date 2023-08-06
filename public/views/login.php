<?php
    if(!isset($_SESSION["loginFail"])){
        $_SESSION["loginFail"] = false;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Log In</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./assets/image/cufavicon.ico">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/login.css">
    </head>
    <body>
        <div class="login-form">
            <form method="POST" action="./src/login_handler.php">
                <div class="flex col">
                    <h2> Admin Login </h2>
                    <img src="./assets/image/ucsy-logo.png" class="logo" alt="ucsy-logo">
                    <?php
                        if($_SESSION["loginFail"]){
                            echo "<div style='background-color:red; color:white; paddin:10px;'> Wrong Login Info, Please Try Again! </div>";
                        }
                    ?>
                    <div> 
                        <label for="username"> Username : </label> 
                        <input type="text" name="username" required> <br>
                    </div>
                    <div>
                        <label for="password"> Password : </label> 
                        <input type="password" name="password" required> <br>
                    </div>
                    <div class="flex row">
                        <button type="submit"> Log In </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>