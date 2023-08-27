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
            $year = date('Y');
            $next = $year + 1;
            // data to pass to radio partials
            $row  = 1;
        ?>

        <!-- header content -->
        <header class="header-wrapper">
            <h1>ရန်ကုန်ကွန်ပျူတာတက္ကသိုလ်</h1>
            <p>သင်ခန်းစာနှင့် ဆရာဆရာမများအား ကျောင်းသားကျောင်းသူများမှ ယေဘုယျ အကဲဖြတ်ခြင်းမေးခွန်းလွှာ</p>
            <?php echo "<p>$year-$next ပညာသင်နှစ်</p>"; ?>
            <p>မှတ်ချက်။  ။ ဆရာဆရာမများနှင့် ကျောင်း​သူကျောင်းသားများအကြား အရေအသွေးပြည့်ဝ၍ပိုမိုကောင်းမွန်သော သင်ကြား၊သင်ယူမှု ပတ်ဝန်းကျင်တစ်ခုဖြစ်စေရန်နှင့် အကောင်းဆုံး သင်ကြားသင်ယူမှုပုံစံရရှိစေရန်အတွက် ကျောင်းသူကျောင်းသားများထံမှ သုံးသပ်မှုကို ရှာဖွေရန် ရန်ကုန်ကွန်ပျူတာတက္ကသိုလ်မှ ဤမေးခွန်းလွှာကိုပြုလုပ်ထားသည်။</p>
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
                        <?php echo "<input type='text' name='academicYear' id='academicYear' list='academicYears' oninput='validateAcademicYear()' placeholder='$year-$next' required>" ?>
                        <datalist id="academicYears">
                        <?php 
                            for($i=date('Y'); $i>=1950; $i-=1) {
                                $nextYear = $i+1;
                                echo "<option value='$i-$nextYear'> $i-$nextYear </option>";
                            }
                        ?>
                    </datalist>
                    </div>
                    <div>
                        <label for="instructorName"> Instructor Name : </label>
                        <input name="instructorName" id="instructorName" type="text" oninput="validateInstructorName()" placeholder="e.g, John Doe" required>
                    </div>
                    <div>
                        <label> Subject : </label>
                        <?php   
                            for($i=1; $i<=9; $i+=1) {
                                echo "<select name='course$i' id='course$i'>";
                                    for($j = 0; $j < count($courses[$i-1]); $j += 1) {
                                        echo "<option value='".$courses[$i-1][$j]."'>".$courses[$i-1][$j]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </div>
                </div>
                <!-- Instructor Information Ends -->

                <!-- Assessment Points -->
                <?php 

                    // iterate through qgroups array
                    for($j = 0; $j < count($qgroups); $j+=1) {

                        // each element of qgroups array become question group headers
                        echo "<div class='box2-wrapper'>"; 

                        echo "<div class='group-header-wrapper'>
                                <div> </div>
                                <div> <p> " . $qgroups[$j] . " </p> </div>
                                <div> <p> လုံးဝသဘောမတူပါ </p> </div>
                                <div> <p> သဘောမတူပါ </p> </div>
                                <div> <p> ကြားနေ </p> </div>
                                <div> <p> သဘောတူပါသည် </p> </div>
                                <div> <p> လုံးဝသဘောတူပါသည် </p> </div>
                            </div>";

                            // for each element of qgroups, iterate through questions array
                            for($k = 0; $k < count($questions[$j]); $k += 1) {

                                // each iteration is a row
                                echo "<div class='column-wrapper'>"; 

                                    echo "<div> <p> $mmnum[$row] <p> </div>";

                                    // each text element is the first column
                                    echo "<div> <p>" . $questions[$j][$k] . "</p> </div>";

                                    // calls radio partial for the other columns
                                    // passes row number to use as input name
                                    include "./public/partials/radio.php";

                                    // increment for next row
                                    $row  += 1;
                                    
                                echo "</div>";

                            } // mini loop ends
                            
                        echo "</div>";

                    } // main loop ends

                ?>
                <!-- Assessment Points Ends -->

                <div class="comment-wrapper">
                    <div> Any Comment : </div>
                    <div>
                        <textarea rows="4" cols="50" name="comment"> </textarea>
                    </div>
                </div>

                <div class="flex row">
                    <input type="submit" class="btn" id="btn">
                </div>

            </form> 
        </div>
        <!-- Assessment Form ends -->
    </body>
    <script src="./assets/javascript/realtime-validator.js"> </script>  
    <script src="./assets/javascript/course-populator.js"> </script>  
</html>