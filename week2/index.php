<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: white;
        }

        .redtext {
            color: red;
        }

        .violettext {
            color: violet;
        }

        .bluetext {
            color: blue;
        }
    </style>
</head>

<body>

    <?php
    echo '<p class="redtext">Lee Kai Wei';
    " </p>";
    echo '<p class="violettext">' . date("Y F d ");
    " </p>";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    echo '<p class="bluetext">' . date("g i A ");
    ?>


</body>

</html>