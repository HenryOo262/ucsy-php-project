<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/process.css">
    </head>
    <body class="school-bg">
        <form action="../src/create_handler.php" method="POST" class="login-box">
            <div class="flex row">
                <h2> Create Records </h2>
            </div>
            <div class="input-wrapper">
                <label for="instructorName">
                    <input type="text" name="instructorName" required>
                </label> 
            </div>
            <div class="input-wrapper">
                <label for="academicYear">
                    <input type="text" name="academicYear" required> 
                </label> 
            </div>
            <div class="input-wrapper">
                <label for="course"> 
                    <input type="text" name="course" list="courses" required> 
                    <datalist id="courses">
                        <?php 
                            for($i=0; $i<count($data); $i+=1) {
                                echo "<option valuee='$data[$i]'> $data[$i] </option>";
                            }
                        ?>
                    </datalist>
                </label>
            </div>
            <div class="flex row">
                <button type="submit" name="submit_button" onclick="return showConfirmation('Are you sure you want to create a new record ?')"> Create </button>
            </div>
        </form>
    </body>
    <script src="../assets/javascript/submit-confirmation.js"> </script>
</html>