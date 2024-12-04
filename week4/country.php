<?php


if (empty($_GET["country"])) {
    echo "Please select your country" . "</br>";
} else echo $_GET["country"] . "<br>";


if (empty($_GET["year"])) {
    echo "Please select your age: " . "</br>";
} else echo $_GET["year"] . "<br>";
$age = 2024 - $_GET["year"];
echo "Age: " . $age . "</br>";
?>

<?php
if (!isset($_GET["gender"])) {
    echo "Please Select Your Gender";
} else {
    echo $_GET["gender"];
}

?>
<!DOCTYPE HTML>
<html>

<p>

    <body>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
            <label for="country">Choose a country:</label>
            <select name="country" id="country">
                <option value="">select</option>
                <option value="malaysia">malaysia</option>
                <option value="japan">japan</option>
                <option value=" United States">United States</option>
                <option value="Australia">Australia</option>
                <option value="China">China</option>
                <option value="South Africa">South Africa</option>
                <option value="Canada">Canada</option>
                <option value="Germany">Germany</option>
                <option value="Brazil">Brazil</option>
                <option value="Mexico">Mexico</option>

            </select>
            <br><br>

            <label for="day">Date:</label>
            <select name="day" id="day">
                <?php for ($i = 1; $i <= 31; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>

            <label for="month">Month:</label>
            <select name="month" id="month">
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>

            <label for="year">Year:</label>
            <select name="year" id="year">
                <?php for ($i = 2000; $i <= 2024; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
            <br><br>

            Geder:
            <input type="radio" value="Male" name="gender">Male
            <input type="radio" value="Female" name="gender">Female

            <input type="submit">
        </form>
</p>
</body>

</html>