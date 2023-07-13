<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Locator &#124 Warehouse Application</title>
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
                            <a href="transactionsm.php"><span class="las la-clipboard-list"></span>
                            <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="locatorm.php" class="active"><span class="las la-map-pin"></span>
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
                    $result = mysqli_query($db, "SELECT * FROM locator");
                ?>

                <header>
                    <h3>
                        Locator
                    </h3>
                    <br>
                </header>
                <br>
                <table class="content-table">
                    <thead>
                        <tr style="text-align: center;">
                            <th>ID</th>
                            <th>Product ID</th>
                            <th>Date</th>
                            <th>Location</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;//untuk berurutan walau delete 
                            while($locator = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$locator['product_id']."</td>";
                                echo "<td>".$locator['l_date']."</td>";
                                echo "<td>".$locator['current_loc']."</td>";
                                $no++;
                            }
                        ?>
                    </tbody>    
                </table>
            </main>
        </nav>
    </body>
</html>