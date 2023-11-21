<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./assets/image/cufavicon.ico">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
        <!-- icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body class="school-bg">
        <div class="menu-wrapper">
            <a class="menu-item" href="/admin/search">
                <div class="icon flex col">
                    <span class="material-icons"> search </span>
                </div>
                <div class="title flex col">
                    View Records 
                </div>
            </a>
            <a class="menu-item" href="/admin/create">
                <div class="icon flex col">
                    <span class="material-icons"> storage </span>
                </div>
                <div class="title flex col">
                    Create Records 
                </div>
            </a>
        </div>
        <form action="./src/login_handler.php" method="POST" class="btn-wrapper flex row">
            <button class="btn" type="submit" name="logButton" value="logout" onclick="return showConfirmation('Are you sure you want to log out ?')"> Log Out </button>
        </form>
    </body>
    <script src="./assets/javascript/submit-confirmation.js"> </script>
</html>