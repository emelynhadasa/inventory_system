<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Transaction &#124 Warehouse Application</title>
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
                            <a href="indexm.php"><span class="las la-home"></span>
                            <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="productsm.php"><span class="las la-box"></span>
                            <span>Products</span></a>
                        </li>
                        <li>
                            <a href="transactionsm.php" class="active"><span class="las la-clipboard-list"></span>
                            <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="locatorm.php"><span class="las la-map-pin"></span>
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
                    $result = mysqli_query($db, "SELECT product_trans.transaction_id, transaction.transaction_name, product_trans.product_id, product_trans.quantity, transaction.t_date, transaction.user_id FROM transaction JOIN product_trans ON transaction.transaction_id = product_trans.transaction_id");
                ?>

                <header>
                    <h3>Transactions</h3>
                    <br>
                </header>
                <br>
                <table class="content-table">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Transaction ID</th>
                            <th>Transaction Name</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Transaction Date</th>
                            <th>User ID</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                            while($transaction = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$transaction['transaction_id']."</td>";
                                echo "<td>".$transaction['transaction_name']."</td>";
                                echo "<td>".$transaction['product_id']."</td>";
                                echo "<td>".$transaction['quantity']."</td>";
                                echo "<td>".$transaction['t_date']."</td>";
                                echo "<td>".$transaction['user_id']."</td>";
                                $no++;
                            }
                        ?>
                    </tbody>    
                </table>
            </main>
        </nav>
    </
