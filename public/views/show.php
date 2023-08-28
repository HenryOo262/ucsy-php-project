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
                echo "<div class='card-attribute'>
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
                    echo "<form method='GET' action='../../src/record_handler.php' class='card'>";
                        echo "
                            <div>
                                <ul class='list-item'> ";
                                    echo "<li>".$data[$i]["teachesID"]."</li>";
                                    echo "<li>".$data[$i]["instructorName"]."</li>";
                                    echo "<li>".$data[$i]["email"]."</li>";
                                    echo "<li>".$data[$i]["faculty"]."</li>";
                                    echo "<li>".$data[$i]["academicYear"]."</li>";
                                    echo "<li>".$data[$i]["semester"]."</li>";
                                    echo "<li>".$data[$i]["course"]."</li>";
                                    echo "<li><button class='det' name='submit_button' value='details'>Details</button></li>";
                                    echo "<li><button class='del' name='submit_button' value='update'>Update</button></li>";
                                echo "</ul>
                            </div>
                        ";
                        echo "<input type='text' name='teachesID' class='hidden-input' value='".$data[$i]["teachesID"]."'>";
                    echo "</form>";
                }
            ?>
        </div>
    </body>
</html>