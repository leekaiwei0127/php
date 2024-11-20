<!DOCTYPE html>
<html>

<head>
    <style>
        .line1 {
            color: green;
            font-style: italic;
        }

        .line2 {
            color: blue;
            font-style: italic;
        }

        .line3 {
            color: red;
            font-weight: bold;
        }

        .line4 {
            color: black;
            font-weight: bold;
            font-style: italic;
        }
    </style>
</head>

<body>

    <?php

    $num1 = rand(1, 100);
    $num2 = rand(1, 100);


    echo "Number 1: $num1<br>";
    echo "Number 2: $num2<br>";


    if ($num1 > $num2) {
        echo "<strong style='font-size: 24px;'>$num1</strong> is the bigger number!";
    } elseif ($num2 > $num1) {
        echo "<strong style='font-size: 24px;'>$num2</strong> is the bigger number!";
    } else {
        echo "Both numbers are equal: $num1";
    }
    ?>

</body>

</html>