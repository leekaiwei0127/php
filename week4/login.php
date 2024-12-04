<?php



$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'admin' && $password == '1234') {
    echo "Welcome!";
} else
    echo "Please login again.";


?>

<!DOCTYPE HTML>
<html>

<body>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="usernmae">Username:</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
        <br><br>
        <input type="submit">
    </form>



</body>

</html>