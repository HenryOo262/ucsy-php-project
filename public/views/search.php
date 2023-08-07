<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/process.css">
    </head>
    <body class="school-bg">
        <div class="input-box">
            <form action="../src/search_handler.php" method="POST">
                <div class="flex col">
                    <h3> Search Records </h3>
                    <div>
                        <label for="instructor"> Instructor : </label> 
                        <input type="text" name="instructorName"> <br>
                    </div>
                    <div>
                        <label for="academicYear"> Academic Year : </label> 
                        <input type="text" name="academicYear"> <br>
                    </div>
                    <div class="flex row">
                        <button type="submit" name="submit_button" value="select"> Search </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>