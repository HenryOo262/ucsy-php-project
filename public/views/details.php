<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Record Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../../../assets/image/cufavicon.ico">
        <link rel="stylesheet" href="../../../assets/css/styles.css">
        <link rel="stylesheet" href="../../../assets/css/details.css">
    </head>
    <body>
        <div class="details-wrapper">
            <?php
                // Atrribute names
                echo "<div class='details details-attribute'>
                    <div> Question </div>
                    <div> Totally Disagree </div>
                    <div> Disagree </div>
                    <div> Neutral </div>
                    <div> Agree </div>
                    <div> Totally agree </div>
                </div>";

                // Data
                for($i=0; $i<count($data); $i+=1) {
                    echo "<div class='details'>";
                    for($j=0; $j<count($data[$i]); $j+=1) {
                        if($j == 0) {
                            echo "<div class='details-question'>" . $data[$i][$j] . "</div>";
                        }else {
                            echo "<div class='details-number'>" . $data[$i][$j] . "</div>";
                        }
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>