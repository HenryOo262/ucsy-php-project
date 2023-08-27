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
        <script>
            var instructor = <?php echo json_encode($instructor); ?>;
        </script>
    </head>
    <body class="school-bg">
        <form action="../src/record_handler.php" method="POST" class="process-wrapper">
            <div class="flex row">
                <h2> Create Records </h2>
            </div>
            <div class="process">
                <div class="input-wrapper">
                    <label for="instructorName">
                        <input type="text" name="instructorName" id="instructorName" list="instructors" onchange="emailSuggestion()" required>
                        <datalist id="instructors">
                            <?php 
                                for($i=0; $i<count($instructor); $i+=1) {
                                    echo "<option value='".$instructor[$i][0]."'>".$instructor[$i][0]."</option>";
                                }
                            ?>
                        </datalist>
                    </label> 
                </div>
                <div class="input-wrapper">
                    <label for="email">
                        <input type="email" name="email" id="email" list="emails" required>
                        <datalist name="emails" id="emails"> </datalist>
                    </label>
                </div>
                <div class="input-wrapper">
                    <label for="faculty">
                        <select name="faculty">
                            <?php 
                                for($i=0; $i<count($faculty); $i+=1) {
                                    echo "<option value='".$faculty[$i][0]."'>".$faculty[$i][1]."</option>";
                                }
                            ?>
                        </select>
                    </label>
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
                <div class="input-wrapper">
                    <label for="course"> 
                        <input type="text" name="course" list="courses" required> 
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
                <button type="submit" name="submit_button" value="create" onclick="return showConfirmation('Are you sure you want to create a new record ?')"> Create </button>
            </div>
        </form>
    </body>
    <script src="../assets/javascript/submit-confirmation.js"> </script>
    <script src="../assets/javascript/data-suggestion.js"> </script>
</html>