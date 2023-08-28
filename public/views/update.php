<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Record</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/process.css">
    </head>
    <body class="school-bg">
        <form action="../../src/record_handler.php" method="POST" class="process-wrapper">
            <h2 class="flex row"> Update Record </h2>
            <div class="process">
                <div class="input-wrapper">
                    <label for="instructorName">
                        <input type="text" name="instructorName" <?php echo "value='".$data['instructorName']."'" ?> list="instructors" readonly required>
                    </label> 
                </div>
                <div class="input-wrapper">
                    <label for="email">
                        <input type="email" name="email" list="emails" <?php echo "value='".$data['email']."'" ?> readonly required>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="faculty">
                        <input type="text" name="faculty" <?php echo "value='".$data['faculty']."'" ?> readonly required>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="academicYear">
                        <input type="text" name="academicYear" list="academicYears" <?php echo "value='".$data['academicYear']."'" ?> required> 
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
                        <input type="text" name="semester" list="semesters" <?php echo "value='".$data['semester']."'" ?> required>
                        <datalist id="semesters">
                            <?php 
                                for($i=1; $i<=9; $i+=1) {
                                    echo "<option value='$i'>";
                                }
                            ?>
                        </datalist>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="course"> 
                        <input type="text" name="course" list="courses" <?php echo "value='".$data['course']."'" ?> required> 
                        <datalist id="courses">
                            <?php 
                                for($i=0; $i<count($course); $i+=1) {
                                    echo "<option value='$course[$i]'>";
                                }
                            ?>
                        </datalist>
                    </label>
                </div>
            </div>
            <div class="flex row">
                <button type="submit" name="submit_button" value="save" onclick="return showConfirmation('Are you sure you want to save changes ?')"> Update </button>
            </div>
            <input type="text" name="teachesID" class="hidden-input" <?php echo "value='".$data['teachesID']."'" ?> >
        </form>
    </body>
    <script src="../../assets/javascript/submit-confirmation.js"> </script>
</html>