<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/process.css">
    </head>
    <body class="school-bg">
        <form action="../src/record_handler.php" method="GET" class="login">
            <div class="flex row">
                <h2> View Records </h2>
            </div>
            <div class="input-wrapper">
                <label for="academicYear">
                    <input type="text" name="academicYear" list="academicYears" autocomplete="off"> 
                    <datalist id="academicYears">
                        <?php 
                            for($i=date('Y'); $i>=2020; $i-=1) {
                                $nextYear = $i+1;
                                echo "<option value='$i-$nextYear'> $i-$nextYear </option>";
                            }
                        ?>
                    </datalist>
                </label> 
            </div>
            <div class="input-wrapper">
                <label for="semester">
                    <input type="text" name="semester" list="semesters" autocomplete="off">
                    <datalist id="semesters">
                        <?php 
                            for($i=1; $i<=9; $i+=1) {
                                echo "<option value='$i'> $i </option>";
                            }
                        ?>
                    </datalist>
                </label>
            </div>
            <div class="flex row">
                <button type="submit" name="submit_button" value="search"> Search </button>
            </div>
        </form>
        <form action="../src/login_handler.php" method="POST" class="logout-btn-wrapper flex row">
            <button class="logout-btn" type="submit" name="logButton" value="logout" onclick="return showConfirmation('Are you sure you want to log out ?')"> Log Out </button>
        </form>
    </body>
    <script src="../assets/javascript/submit-confirmation.js"> </script>
</html>