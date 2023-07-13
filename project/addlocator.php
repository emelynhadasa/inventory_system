<?php
    if(isset($_POST['Submit'])) {
        $product_id = $_POST['product_id'];
        $l_date = $_POST['l_date'];
        $current_loc = $_POST['current_loc'];

        include_once("config.php");

        $result = mysqli_query($db, "INSERT INTO locator(product_id, l_date, current_loc)
        VALUES('$product_id', '$l_date', '$current_loc')");
        $result = true;

        if ($result) {
            echo '<script>alert("Data entered successfully!"); window.location.href = "locator.php";</script>';
        }
    }
?>

<html>
    <head>
        <title>Add Locator &#124 Warehouse Application</title>
        <link rel="stylesheet" href="stylee.css">
    </head>
    <body>
        <br><br>

        <div class="header">
  			<h2>Add Locator</h2>
		</div>
        <form action="addlocator.php" method="post" name="form1">
                <div class="col">
                    <label>Product ID</label>
                    <input type="text" name="product_id">
                </div>
                
                <div class="col">
                    <label>Date</label>
                    <input type="date" name="l_date">
                </div>
                
                <div class="col">
                    <label>Location</label>
                    <input type="text" name="current_loc">
                </div>
                    <input type="submit" class="btn" name="Submit" value="    Add    ">
                    <a href="locator.php">Back to Locator</a>
        </form>
    </body>
</html>