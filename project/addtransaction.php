<?php
    if(isset($_POST['Submit'])) {
        $product_id = $_POST['product_id'];
        $t_date = $_POST['t_date'];
        $t_type = $_POST['t_type'];
        $quantity = $_POST['quantity'];
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        $notes = $_POST['notes'];

        include_once("config.php");

        // Start a transaction
        mysqli_begin_transaction($db);

        // Get the current quantity of the product
        $result_product = mysqli_query($db, "SELECT quantity FROM product WHERE product_id = '$product_id'");

        if ($result_product) {
            $row_product = mysqli_fetch_array($result_product);
            $current_quantity = $row_product['quantity'];

            // Calculate the new quantity based on the transaction type and quantity inputted by the user
            if ($t_type == 'inbound') {
                $new_quantity = $current_quantity + $quantity;
            } else if ($t_type == 'outbound') {
                $new_quantity = $current_quantity - $quantity;

                // Check if the product has enough quantity for outbound transaction
                if ($new_quantity < 0) {
                    echo "Error: Not enough quantity for outbound transaction";
                    mysqli_rollback($db); // Rollback the transaction
                    exit();
                }
            } else {
                echo "Error: Invalid transaction type";
                mysqli_rollback($db); // Rollback the transaction
                exit();
            }

            // Update the quantity of the product in the product table
            $result_update_product = mysqli_query($db, "UPDATE product SET quantity = '$new_quantity' WHERE product_id = '$product_id'");

            if (!$result_update_product) {
                echo "Error: " . mysqli_error($db);
                mysqli_rollback($db); // Rollback the transaction
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($db);
            mysqli_rollback($db); // Rollback the transaction
            exit();
        }

        // Insert data into transaction table
        $result_transaction = mysqli_query($db, "INSERT INTO transaction(t_date, transaction_name, user_id)
        VALUES('$t_date', '$t_type', '$user_id')");

        // Get the transaction ID of the newly inserted transaction
        $transaction_id = mysqli_insert_id($db);

        // Insert data into product_trans table
        $result_product_trans = mysqli_query($db, "INSERT INTO product_trans(product_id, transaction_id, quantity, status, notes)
        VALUES('$product_id', '$transaction_id', '$quantity', '$status', '$notes')");

        if ($result_transaction && $result_product_trans && $result_update_product) {
            mysqli_commit($db); // Commit the transaction
            echo '<script>alert("Data entered successfully!"); window.location.href = "transactions.php";</script>';
        } else {
            echo "Error: " . mysqli_error($db);
            mysqli_rollback($db); // Rollback the transaction
        }
    }
?>
<html>
    <head>
        <title>Add Transaction &#124 Warehouse Application</title>
        <link rel="stylesheet" href="stylee.css">
    </head>
    <body>
        
        <br><br>

        <div class="header">
  			<h2>Add Transaction</h2>
		</div>
        <form action="addTransaction.php" method="post" name="form1">
                <div class="col">
                    <label>Product ID</label>
                    <input type="text" name="product_id">
                
                <div class="col">
                    <label>Date</label>
                    <input type="date" name="t_date">
                </div>

                <div class="col">
                    <label>Type</label>
                    <select name="t_type">
                        <option value="inbound">inbound</option>
                        <option value="outbound">outbound</option>
                    </select>
                </div>
                
                <div class="col">
                    <label>Quantity</label>
                    <input type="number" name="quantity">
                </div>

                <div class="col">
                    <label>User ID</label>
                    <input type="number" name="user_id">
                </div>

                <div class="col">
                    <label>Status</label>
                    <select name="status">
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                    <input type="submit" class="btn" name="Submit" value="Add">
                    <a href="transactions.php">Go to Transaction</a>
        </form>
        

    </body>
</html>