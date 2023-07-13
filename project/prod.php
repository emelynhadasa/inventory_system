<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Product Details &#124 Warehouse Application</title>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
        <nav class="sidebar">
			<div class="sidebar-brand">
				<table>
                    <tr>
                        <td><h2>WarehouseApp</h2></td>
                    </tr>
                </table>
			</div>
			
			<div class="sidebar-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php"><span class="las la-home"></span>
                            <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="products.php" class="active"><span class="las la-box"></span>
                            <span>Products</span></a>
                        </li>
                        <li>
                            <a href="transactions.php"><span class="las la-clipboard-list"></span>
                            <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="locator.php"><span class="las la-map-pin"></span>
                            <span>Locator</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <nav class="main-content">
            <main>
                <?php
                    include_once("config.php");

                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $result = mysqli_query($db, "SELECT * FROM product WHERE product_id='$id'");
                    } else {
                        $result = mysqli_query($db, "SELECT * FROM product");
                    }
                    $product = mysqli_fetch_array($result);
                ?>

                <header>
                    <h3>
                        Product Details: <?php echo $product['product_name']; ?>
                    </h3>
                    <br>
                </header>
                <br>
                <table class="content-table">
                    <tbody>
                        <tr>
                            <td><strong>Product ID:</strong></td>
                            <td><?php echo $product['product_id']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td><?php echo $product['product_name']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Description:</strong></td>
                            <td><?php echo $product['product_desc']; ?></td>
                        </tr>
                        
                </table>
            </main>
        </nav>
    </body>
</html>