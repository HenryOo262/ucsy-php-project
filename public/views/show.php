<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/card.css">
    </head>
    <body>
        <div class="card-wrapper">
            <?php 
                echo "<div class='card card-attribute'>
                    <li>Record ID</li>
                    <li>Instructor</li>
                    <li>Email</li>
                    <li>Faculty</li>
                    <li>Academic Year</li>
                    <li>Semester</li>
                    <li>Subject</li>
                    <li>Record Details</li>
                    <li>Update Record</li>
                </div>";
                for($i=0; $i<count($data); $i+=1){
                    echo "<form method='GET' action='../../src/record_handler.php' class='card card-piece'>";
                    
                        echo "<div>".$data[$i]["teachesID"]."</div>";
                        echo "<div>".$data[$i]["instructorName"]."</div>";
                        echo "<div>".$data[$i]["email"]."</div>";
                        echo "<div>".$data[$i]["faculty"]."</div>";
                        echo "<div>".$data[$i]["academicYear"]."</div>";
                        echo "<div>".$data[$i]["semester"]."</div>";
                        echo "<div>".$data[$i]["course"]."</div>";
                        echo "<div><button class='det' name='submit_button' value='details'>Details</button></div>";
                        echo "<div><button class='del' name='submit_button' value='update'>Update</button></div>";

                        echo "<input type='text' name='teachesID' class='hidden-input' value='".$data[$i]["teachesID"]."'>";
                    echo "</form>";
                }
            ?>
        </div>
    </body>
</html>