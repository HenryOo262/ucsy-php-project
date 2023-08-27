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
                    <div> မေးခွန်း </div>
                    <div> လုံးဝသဘောမတူပါ </div>
                    <div> သဘောမတူပါ </div>
                    <div> ကြားနေ </div>
                    <div> သဘောတူပါသည် </div>
                    <div> လုံးဝသဘောတူပါသည် </div>
                </div>";

                // Details
                for($i=0; $i<count($details); $i+=1) {
                    echo "<div class='details'>";
                    for($j=0; $j<count($details[$i]); $j+=1) {
                        if($j == 0) {
                            echo "<div class='details-question'>" . $details[$i][$j] . "</div>";
                        }else {
                            echo "<div class='details-number'>" . $details[$i][$j] . "</div>";
                        }
                    }
                    echo "</div>";
                }
            ?>
        </div>
        <div class="comment-wrapper"> 
            <h2> Comments : </h2>
            <?php
                for($i=0; $i<count($comment); $i+=1) {
                    echo "<div class='comment'>
                        $comment[$i]
                    </div>";
                }
            ?>
        </div>
    </body>
</html>