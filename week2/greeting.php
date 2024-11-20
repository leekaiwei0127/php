<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php

    $hour = rand(0, 23);

    echo "hour: $hour\n";

    if ($hour >= 5 && $hour <= 11) {
        echo "Good morning!";
    } elseif ($hour >= 12 && $hour <= 17) {
        echo "Good afternoon!";
    } elseif ($hour >= 18 && $hour <= 21) {
        echo "Good evening!";
    } else {
        echo "Good night!";
    }
    ?>

</body>

</html>