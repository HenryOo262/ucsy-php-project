<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/next.css">
    </head>
    <body class="school-bg">
        <div class="next-wrapper">
            <h4> Evaluation Successful </h4>
            <a href="/form">
                <div class="btn">
                    Next Instructor
                </div>
            </a>
            <form action="./src/login_handler.php" method="POST">
                <button class="btn" type="submit" name="logButton" value="logout" onclick="return showConfirmation('Are you sure you want to log out ?')"> Log Out </button>
            </form>
        </div>
    </body>
    <script src="./assets/javascript/submit-confirmation.js"> </script>
</html>