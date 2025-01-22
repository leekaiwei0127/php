<!DOCTYPE HTML>
<?php
include "menu.php";
?>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Update Customer</h1>
        </div>
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT id, username, firstname, lastname,gender,date_of_birth FROM customer WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            // this is the first question mark
            $stmt->bindParam(1, $id);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $name = $row['username'];

            $firstname = $row['firstname'];

            $lastname = $row['lastname'];

            $gender = $row['gender'];

            $DOB = $row['date_of_birth'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>userame</td>
                    <td><input type='text' name='yourname' value="<?php echo $name;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>firstname</td>
                    <td><textarea name='firstname' class='form-control'><?php echo $firstname;  ?></textarea></td>
                </tr>
                <tr>
                    <td>lastname</td>
                    <td><input type='text' name='lastname' value="<?php echo $lastname;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td><input type='text' name='gender' value="<?php echo $gender;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td><input type='date' name='date_of_birth' value="<?php echo $DOB;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>