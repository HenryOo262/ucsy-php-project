<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/process.css">
    </head>
    <body class="school-bg">
        <div class="input-box">
            <form action="../update_handler.php" method="POST">
                <div class="flex row">
                    <h3> Update Records </h3>
                </div>
                <div>
                    <label for="instructorName">Instructor Name : </label>
                    <input type="text" name="instructorName"> 
                </div>
                <div>
                    <label for="academicYear">Academic Year : </label>
                    <input type="text" name="academicYear"> 
                </div>
                <div>
                    <label for="course"> Course : </label>
                    <input type="text" name="course" list="courses"> 
                    <datalist id="courses">
                        <?php 
                            for($i=0; $i<count($data); $i+=1) {
                                echo "<option valuee='$data[$i]'> $data[$i] </option>";
                            }
                        ?>
                    </datalist>
                </div>
                <div class="flex row">
                    <button type="submit" onclick="return showConfirmation()"> Insert </button> 
                </div>
            </form>
        </div>
    </body>
    <script src="../assets/javascript/submit-confirmation.js"> </script>
</html>