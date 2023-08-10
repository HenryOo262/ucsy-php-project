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
    </head>
    <body class="school-bg">
        <div class="menu-box">
            <div class="menu">
                <a href="/admin/instructor" style="background-color:#c2e1c2;">Manage Instructor</a>
                <a href="/admin/course" style="background-color:#e2d7f1;">Manage Course</a>
                <a href="/admin/search" style="background-color:#f4b6c2;">Search Records</a>
                <a href="/admin/update" style="background-color:#a0c8ff;">Update Records</a>
            </div>
            <form action="./src/login_handler.php" method="POST" class="flex row">
                <button type="submit" name="log_button" value="logout" onclick="return showConfirmation('Are you sure you want to log out ?')"> Log Out </button>
            </form>
        </div>
    </body>
    <script src="./assets/javascript/submit-confirmation.js"> </script>
</html>