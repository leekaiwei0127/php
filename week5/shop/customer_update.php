<!DOCTYPE HTML>
<?php
include "menu.php";
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<html>

<head>
    <title>PDO - Update Customer - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Update Customer</h1>
        </div>
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        include 'config/database.php';

        try {
            $query = "SELECT id, username, firstname, lastname, gender, date_of_birth, password FROM customer WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $name = $row['username'];
            $frname = $row['firstname'];
            $ltname = $row['lastname'];
            $gd = $row['gender'];
            $dob = $row['date_of_birth'];
            $password = $row['password'];
        } catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <?php
        if ($_POST) {
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $oldPassword) {
                $errors[] = "password does not match.";
            }
            if (!empty($oldPassword)) {
                if (empty($newPassword) || empty($confirmPassword)) {
                    $errors[] = "your new password cannot be empty.";
                }
            }

            if (!empty($newPassword) && !empty($confirmPassword)) {
                if ($newPassword !== $confirmPassword) {
                    $errors[] = "new and confirm password does not match.";
                }
            }

            if (!empty($errors)) {
                echo "<div class='alert alert-danger'><ul>";
                foreach ($errors as $error) {
                    echo "<li>{$error}</li>";
                }
                echo "</ul></div>";
            } else {
                try {
                    $name = htmlspecialchars(strip_tags($_POST['username']));
                    $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
                    $lastname = htmlspecialchars(strip_tags($_POST['lastname']));
                    $gender = htmlspecialchars(strip_tags($_POST['gender']));
                    $DOB = htmlspecialchars(strip_tags($_POST['date_of_birth']));

                    $query = "UPDATE customer SET username=:username, password=:password,firstname=:firstname, lastname=:lastname, gender=:gender, date_of_birth=:date_of_birth WHERE id =:id";

                    $stmt = $con->prepare($query);

                    if (!empty($confirmPassword)) {
                        $stmt->bindParam(':password', $confirmPassword);
                    } else {
                        $stmt->bindParam(':password', $password);
                    }

                    $stmt->bindParam(':username', $name);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':date_of_birth', $DOB);
                    $stmt->bindParam(":id", $id);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was updated.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                    }
                } catch (PDOException $exception) {
                    die('ERROR: ' . $exception->getMessage());
                }
            }
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Username</td>
                    <td><input type='text' name='username' value="<?php echo $name; ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <td><textarea name='firstname' class='form-control'><?php echo $frname; ?></textarea></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><input type='text' name='lastname' value="<?php echo $ltname; ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type='text' name='gender' value="<?php echo $gd; ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type='date' name='date_of_birth' value="<?php echo $dob; ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Old Password</td>
                    <td><input type='password' name='old_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type='password' name='new_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type='password' name='confirm_password' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='customer_listing.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>