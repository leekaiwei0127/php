<!DOCTYPE HTML>
<?php
include "menu.php";
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}
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
            <h1>Update Product</h1>
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
            $query = "SELECT id, name, description, price,product_cat,promotion_price,manufacture_date,expired_date FROM products WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            // this is the first question mark
            $stmt->bindParam(1, $id);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $f_name = $row['name'];
            $f_description = $row['description'];
            $f_price = $row['price'];
            $f_product_cat = $row['product_cat'];
            $f_promotion_price = $row['promotion_price'];
            $f_manufacture_date = $row['manufacture_date'];
            $f_expired_date = $row['expired_date'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        if ($_POST) {
            $query = "UPDATE products
                  SET name=:name, description=:description, product_cat=:product_cat, price=:price, promotion_price=:promotion_price, manufacture_date=:manufacture_date, expired_date=:expired_date WHERE id = :id";
            // prepare query for excecution
            $stmt = $con->prepare($query);
            // posted values
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $description = htmlspecialchars(strip_tags($_POST['description']));
            $product_cat = htmlspecialchars(strip_tags($_POST['product_cat']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            $promotion_price = htmlspecialchars(strip_tags($_POST['promotion_price']));
            $manufacture_date = htmlspecialchars(strip_tags($_POST['manufacture_date']));
            $expired_date = htmlspecialchars(strip_tags($_POST['expired_date']));


            $stmt = $con->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':product_cat', $product_cat);
            $stmt->bindParam(':promotion_price', $promotion_price);
            $stmt->bindParam(':manufacture_date', $manufacture_date);
            $stmt->bindParam(':expired_date', $expired_date);

            $stmt->execute();
        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' value="<?php echo $f_name;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'><?php echo $f_description;  ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' value="<?php echo $f_price;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Promotion price</td>
                    <td><input type='text' name='promotion_price' value="<?php echo $f_promotion_price;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Product category</td>
                    <td><input type='text' name='product_cat' value="<?php echo $f_product_cat;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>manufacture date</td>
                    <td><input type='text' name='manufacture_date' value="<?php echo $f_manufacture_date;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>expired date</td>
                    <td><input type='text' name='expired_date' value="<?php echo $f_expired_date;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='product_listing.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>