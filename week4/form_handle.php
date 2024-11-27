<?php

if (isset($_POST["name"])) {

    if (empty($_POST["name"])) {
        echo "Please enter your name. <br>";
    }

    if (empty($_POST["email"])) {
        echo "Please enter your email. <br>";
    }
    if (empty($_POST["age"])) {
        echo "Please enter your age. <br>";
    }





    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "is a invalid email address";
    }

    $age = $_POST["age"];
    if ($age < 18) {
        echo "invalid age";
    } else if ($age > 100) {
        echo "invalid age";
    }
}
?>
<!DOCTYPE HTML>
<html>

<body>


    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Age:<input type="text" name="age"><br>
        <input type="submit">
    </form>

</body>

</html>