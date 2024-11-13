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
    $number1 = rand(100, 200);
    $number2 = rand(100, 200);

    echo '<p class="line1">' . $number1 . '</p>';

    echo '<p class="line2">' . $number2 . '</p>';

    echo '<p class="line3">some of both variables: ' . ($number1 + $number2) . '</p>';

    echo '<p class="line4">multiplication of both variables: ' . ($number1 * $number2) . '</p>';
    ?>

</body>

</html>