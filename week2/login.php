<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <?php

    define("USERNAME", "admin");
    define("PASSWORD", "1234");


    $inputUsername = "admin";
    $inputPassword = "1234";


    if ($inputUsername === USERNAME) {
        if ($inputPassword === PASSWORD) {
            echo "Login successful!";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
    ?>

</body>

</html>