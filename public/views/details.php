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
                $sum_totally_disagree = 0;
                $sum_disagree         = 0;
                $sum_neutral          = 0;
                $sum_agree            = 0;
                $sum_totally_agree    = 0;

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
                        echo "<div class='details-question'>" . $details[$i]["question"]      . "</div>";
                        echo "<div class='details-number'>" . $details[$i]["totally_disagree"] . "</div>";
                        echo "<div class='details-number'>" . $details[$i]["disagree"]         . "</div>";
                        echo "<div class='details-number'>" . $details[$i]["neutral"]          . "</div>";
                        echo "<div class='details-number'>" . $details[$i]["agree"]            . "</div>";
                        echo "<div class='details-number'>" . $details[$i]["totally_agree"]    . "</div>";
                        $sum_totally_disagree += $details[$i]["totally_disagree"];
                        $sum_disagree         += $details[$i]["disagree"];
                        $sum_neutral          += $details[$i]["neutral"];
                        $sum_agree            += $details[$i]["agree"];
                        $sum_totally_agree    += $details[$i]["totally_agree"];
                    echo "</div>";
                }

                // Total 
                echo "<div class='details details-attribute'>";
                    echo "<div class='details-question'> စုစုပေါင်း : </div>";
                    echo "<div class='details-number'>" . $sum_totally_disagree . "</div>";
                    echo "<div class='details-number'>" . $sum_disagree         . "</div>";
                    echo "<div class='details-number'>" . $sum_neutral          . "</div>";
                    echo "<div class='details-number'>" . $sum_agree            . "</div>";
                    echo "<div class='details-number'>" . $sum_totally_agree    . "</div>";
                echo "</div>";
            ?>
        </div>
        <div class="comment-wrapper"> 
            <h2 class="comment-header"> မှတ်ချက်များ : </h2>
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