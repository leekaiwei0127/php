<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php
    $number = rand(1, 100);

    echo "The number is: $number\n";

    if ($number % 2 == 0) {
        echo "Even\n";
    } else {
        echo "Odd\n";
    }
    ?>

</body>

</html>