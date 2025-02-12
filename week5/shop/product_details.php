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
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Product</h1>
        </div>

        <!-- PHP read one record will be here -->
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

            // this refer to the first question mark
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
        ?>



        <!-- HTML read one record table will be here -->

        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Name</td>
                <td><?php echo $f_name;  ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $f_description;  ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo $f_price;  ?></td>
            </tr>
            <tr>
                <td>Promotion price</td>
                <td><?php echo $f_promotion_price;  ?></td>
            </tr>
            <tr>
                <td>Product category</td>
                <td><?php echo $f_product_cat;  ?></td>
            </tr>
            <tr>
                <td>manufacture date</td>
                <td><?php echo $f_manufacture_date;  ?></td>
            </tr>
            <tr>
                <td>expired date</td>
                <td><?php echo $f_expired_date;  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='product_listing.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>

        </table>


    </div> <!-- end .container -->

</body>

</html>