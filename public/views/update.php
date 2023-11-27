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
        <script>
            const instructor = <?php echo json_encode($instructor); ?>;
        </script>
    </head>
    <body class="school-bg">
        <form action="../../src/record_handler.php" method="POST" class="process-wrapper">
            <h2 class="flex row"> Update Record </h2>
            <div class="process">
                <div class="input-wrapper">
                    <label for="email">
                        <input type="email" name="email" id="email" list="emails" oninput="dataCorrection()" <?php echo "value='".$data['email']."'"; ?> autocomplete="off" required>
                        <datalist name="emails" id="emails"> </datalist>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="instructorName">
                        <input type="text" name="instructorName" id="instructorName" list="instructors" oninput="emailSuggestion()" <?php echo "value='".$data['instructorName']."'"; ?> autocomplete="off" required>
                        <datalist id="instructors">
                            <?php 
                                for($i=0; $i<count($instructor); $i+=1) {
                                    echo "<option value='".$instructor[$i]["instructorName"]."'>".$instructor[$i]["instructorName"]."</option>";
                                }
                            ?>
                        </datalist>
                    </label> 
                </div>
                <div class="input-wrapper">
                    <label for="faculty">
                        <select name="faculty" id="faculty" <?php echo "value='".$data['faculty_id']."'"; ?>>
                            <?php 
                                for($i=0; $i<count($faculty); $i+=1) {
                                    echo "<option value='".$faculty[$i]["faculty_id"]."'>".$faculty[$i]["faculty_name"]."</option>";
                                }
                            ?>
                        </select>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="academicYear">
                        <input type="text" name="academicYear" list="academicYears" <?php echo "value='".$data['academicYear']."'"; ?> autocomplete="off" required> 
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
                        <input type="text" name="semester" list="semesters" <?php echo "value='".$data['semester']."'"; ?> autocomplete="off" required> 
                        <datalist id="semesters">
                            <?php 
                                for($i=1; $i<=9; $i+=1) {
                                    echo "<option value='$i'> $i </option>";
                                }
                            ?>
                        </datalist>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="course"> 
                        <input type="text" name="course" list="courses" <?php echo "value='".$data['course']."'"; ?> autocomplete="off" required> 
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
        <form action="../src/login_handler.php" method="POST" class="logout-btn-wrapper flex row">
            <button class="logout-btn" type="submit" name="logButton" value="logout" onclick="return showConfirmation('Are you sure you want to log out ?')"> Log Out </button>
        </form>
    </body>
    <script src="../../assets/javascript/data-suggestion.js"> </script>
    <script src="../../assets/javascript/submit-confirmation.js"> </script>
</html>