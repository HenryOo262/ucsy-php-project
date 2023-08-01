<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Assessment Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="./assets/image/cufavicon.ico">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/form.css">
    </head>
    <body>
        <?php 
            // default data
            $year = (int)date('y') + 2000;
            $next = $year + 1;
            $row  = 1;
        ?>

        <!-- header content -->
        <header class="header-wrapper">
            <h1>ဆရာအကဲဖြတ်ပုံစံ</h1>
            <p>သင်တန်းဆရာများနှင့် သင်တန်းများဆီသို့ ကျောင်းသားများ၏ အထွေထွေအကဲဖြတ်မှုပုံစံ</p>
            <?php echo "<p>$year-$next စာသင်နှစ်</p>"; ?>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione illum, ipsa vitae mollitia tempore, nihil nemo dolorum, officia odio consectetur dolores beatae! Ab et, vitae unde illo temporibus cumque. Adipisci suscipit ullam ducimus repellendus ipsum animi obcaecati nisi neque, quisquam quae magnam atque quos dolorem placeat excepturi iure. Ut, doloribus fugiat architecto, ipsum distinctio nobis eveniet accusantium quam exercitationem dolores aspernatur consectetur doloremque rerum corporis tenetur molestiae placeat nulla amet quaerat ducimus! At provident tempore molestiae nesciunt doloremque voluptate culpa reprehenderit vero quasi commodi consectetur minus, accusamus reiciendis temporibus. Voluptates dolorum alias ipsum aliquid vero deserunt repudiandae cupiditate iusto incidunt.</p>
        </header>

        <!-- Assessment Form -->
        <div>
            <form method="POST" action="./src/form_handler.php">

                <!-- Instructor Information -->
                <div class="box1-wrapper">
                    <div>
                        <label for="semester"> Semester : </label>
                        <select name="semester" id="semester" onchange="populator()">
                            <?php
                                for($i = 1; $i <= 9; $i += 1){
                                    echo "<option value='$i'> Semester $i </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="academicYear"> Academic Year : </label>
                        <?php echo "<input name='academicYear' id='academicYear' type='text' oninput='validateAcademicYear()' placeholder='$year-$next' required>" ?>
                    </div>
                    <div>
                        <label for="instructorName"> Instructor Name : </label>
                        <input name="instructorName" id="instructorName" type="text" oninput="validateInstructorName()" placeholder="e.g, John Doe" required>
                    </div>
                    <div>
                        <label> Course : </label>
                        <select name="course1" id="course1">
                            <?php
                                for($i = 0; $i < count($courses[0]); $i += 1){
                                    echo "<option value='".$courses[0][$i]."'>".$courses[0][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course2" id="course2">
                            <?php
                                for($i = 0; $i < count($courses[1]); $i += 1){
                                    echo "<option value='".$courses[1][$i]."'>".$courses[1][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course3" id="course3">
                            <?php
                                for($i = 0; $i < count($courses[2]); $i += 1){
                                    echo "<option value='".$courses[2][$i]."'>".$courses[2][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course4" id="course4">
                            <?php
                                for($i = 0; $i < count($courses[3]); $i += 1){
                                    echo "<option value='".$courses[3][$i]."'>".$courses[3][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course5" id="course5">
                            <?php
                                for($i = 0; $i < count($courses[4]); $i += 1){
                                    echo "<option value='".$courses[4][$i]."'>".$courses[4][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course6" id="course6">
                            <?php
                                for($i = 0; $i < count($courses[5]); $i += 1){
                                    echo "<option value='".$courses[5][$i]."'>".$courses[5][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course7" id="course7">
                            <?php
                                for($i = 0; $i < count($courses[6]); $i += 1){
                                    echo "<option value='".$courses[6][$i]."'>".$courses[6][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course8" id="course8">
                            <?php
                                for($i = 0; $i < count($courses[7]); $i += 1){
                                    echo "<option value='".$courses[7][$i]."'>".$courses[7][$i]."</option>";
                                }
                            ?>
                        </select>
                        <select name="course9" id="course9">
                            <?php
                                for($i = 0; $i < count($courses[8]); $i += 1){
                                    echo "<option value='".$courses[8][$i]."'>".$courses[8][$i]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Instructor Information Ends -->

                <!-- Assessment Points -->
                <?php 

                    // iterate through the text array - the array contains text-groups(objects)
                    for($j = 0; $j < count($data['text']); $j+=1){

                        // each text-group become sub-forms 
                        echo "<div class='box2-wrapper'>"; 

                            // the very first row of each sub-form contains the headings
                            // the rest of the rows contain questions of the text-group
                            echo "<div class='column-wrapper'>
                                <div class='group-header-wrapper'>
                                    <p> " . $data['text'][$j]['group'][0] . " </p>
                                </div>
                                <div class='group-header-wrapper'> <p> လုံးဝသဘောမတူပါ </p> </div>
                                <div class='group-header-wrapper'> <p> သဘောမတူပါ </p> </div>
                                <div class='group-header-wrapper'> <p> ကြားနေ </p> </div>
                                <div class='group-header-wrapper'> <p> သဘောတူပါသည် </p> </div>
                                <div class='group-header-wrapper'> <p> လုံးဝသဘောတူပါသည် </p> </div>
                            </div>";

                            // iterate through each text-group array
                            for($k = 1; $k < count($data['text'][$j]['group']); $k += 1){

                                // each iteration is a row
                                echo "<div class='column-wrapper'>"; 

                                    // each text element is the first column
                                    echo "<div>";
                                    echo "<p>" . $data['text'][$j]['group'][$k] . "</p>";
                                    echo "</div>";

                                    // calls radio partial for the other columns
                                    // passes row number to use as input name
                                    // the include path is relative to the index.php in root dir
                                    include "./public/partials/radio.php";

                                    // increment for next row
                                    $row  += 1;
                                    
                                echo "</div>";

                            } // mini loop ends
                            
                        echo "</div>";

                    } // main loop ends

                ?>
                <!-- Assessment Points Ends -->

                <div class="btn-wrapper">
                    <input type="submit" class="btn" id="btn">
                </div>
                
            </form> 
        </div>
        <!-- Assessment Form ends -->

    </body>

    <script src="./assets/javascript/realtime-validator.js"> </script>  
    <script src="./assets/javascript/course-populator.js"> </script>  
    <!-- path relative to index.js  -->
</html>