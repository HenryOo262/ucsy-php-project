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
                    <li>Instructor Name</li>
                    <li>Instructor Faculty</li>
                    <li>Academic Year</li>
                    <li>Course</li>
                    <li>Record Details</li>
                    <li>Delete Record</li>
                </div>";
                for($i=0; $i<count($data); $i+=1){
                    echo "<form method='POST' action='../../src/search_handler.php' class='card'>";
                        echo "
                            <div>
                                <ul class='list-item'> ";
                                    for($j=0; $j<count($data[$i]); $j+=1) {
                                        echo "<li>". $data[$i][$j] . "</li>";
                                    }
                                    echo "<li><button class='det' name='submit_button' value='details'>Details</button></li>";
                                    echo "<li><button class='del' name='submit_button' value='delete' onclick='return showConfirmation()'>Delete</button></li>";
                                echo "</ul>
                            </div>
                        ";
                        echo "<input type='text' name='teachesID' value='".$data[$i][0]."'>";
                    echo "</form>";
                }
            ?>
        </div>
    </body>
    <script src="../../assets/javascript/submit-confirmation.js"> </script>
</html>