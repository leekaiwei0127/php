<!DOCTYPE HTML>
<html>

<body>

    Welcome <?php echo $_GET["name"]; ?><br>
    Your Email: <?php echo $_GET["email"]; ?><br>
    Your age:<?php echo $_GET["age"]; ?><br>


    <?php

    if (empty($_GET["name"])) {
        echo "Please enter your name.";
    }
    if (empty($_GET["email"])) {
        echo "Please enter your email.";
    }
    if (empty($_GET["age"])) {
        echo "Please enter your age.";
    }
    ?>

</body>

</html>