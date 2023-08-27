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
        <form action="../src/record_handler.php" method="GET" class="login">
            <div class="flex row">
                <h2> Search Records </h2>
            </div>
            <div class="input-wrapper">
                <label for="academicYear">
                    <input type="text" name="academicYear" list="academicYears" required> 
                    <datalist id="academicYears">
                        <?php 
                            for($i=date('Y'); $i>=1950; $i-=1) {
                                $nextYear = $i+1;
                                echo "<option value='$i-$nextYear'> $i-$nextYear </option>";
                            }
                        ?>
                    </datalist>
                </label> 
            </div>
            <div class="input-wrapper">
                <label for="semester">
                    <select name="semester">
                        <?php 
                            for($i=1; $i<=9; $i+=1) {
                                echo "<option value='$i'> Semester $i </option>";
                            }
                        ?>
                    </select>
                </label>
            </div>
            <div class="flex row">
                <button type="submit" name="submit_button" value="select"> Search </button>
            </div>
        </form>
    </body>
</html>