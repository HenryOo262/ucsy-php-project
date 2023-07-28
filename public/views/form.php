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
            <h1>General Assessment Form</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil totam asperiores maxime perferendis maiores mollitia quisquam fugit omnis unde repudiandae.</p>
            <?php echo "<p>$year-$next Academic Year</p>"; ?>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione illum, ipsa vitae mollitia tempore, nihil nemo dolorum, officia odio consectetur dolores beatae! Ab et, vitae unde illo temporibus cumque. Adipisci suscipit ullam ducimus repellendus ipsum animi obcaecati nisi neque, quisquam quae magnam atque quos dolorem placeat excepturi iure. Ut, doloribus fugiat architecto, ipsum distinctio nobis eveniet accusantium quam exercitationem dolores aspernatur consectetur doloremque rerum corporis tenetur molestiae placeat nulla amet quaerat ducimus! At provident tempore molestiae nesciunt doloremque voluptate culpa reprehenderit vero quasi commodi consectetur minus, accusamus reiciendis temporibus. Voluptates dolorum alias ipsum aliquid vero deserunt repudiandae cupiditate iusto incidunt.</p>
        </header>

        <!-- Assessment Form -->
        <div>
            <form method="POST" action="./src/form_handler.php">

                <!-- Instructor Information -->
                <div class="box1-wrapper">
                    <div>
                        <label for="semester"> Semester : </label>
                        <select name="semester">
                            <?php
                                for($i = 1; $i <= 9; $i += 1){
                                    echo "<option value='$i'> Semester $i </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="academicYear">Academic Year : </label>
                        <?php echo "<input name='academicYear' id='academicYear' type='text' placeholder='$year-$next' value='$year-$next' required>" ?>
                    </div>
                    <div>
                        <label for="instructorName">Instructor Name : </label>
                        <input name="instructorName" id="instructorName" type="text" oninput="validateInstructorName()" placeholder="e.g, John Doe" required>
                    </div>
                    <div>
                        <label for="classroom">Classroom : </label>
                        <input name="classroom" id="classroom" type="text" oninput="validateClassroom()" placeholder="e.g, E-001" required>
                    </div>
                </div>

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
                                <div class='group-header-wrapper'> <p> Totally Disagree </p> </div>
                                <div class='group-header-wrapper'> <p> Disagree </p> </div>
                                <div class='group-header-wrapper'> <p> Neutral </p> </div>
                                <div class='group-header-wrapper'> <p> Agree </p> </div>
                                <div class='group-header-wrapper'> <p> Totally Agree </p> </div>
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

                <div class="btn-wrapper">
                    <input type="submit" class="btn" id="btn">
                </div>
                
            </form> 
        </div>
        <!-- Assessment Form ends -->

    </body>

    <script src="./assets/javascript/form.js"> </script>  
    <!-- path relative to index.js  -->
</html>