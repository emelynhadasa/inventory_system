<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
            header('location: login.php');
  }

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Inventory &#124 Warehouse Application</title>
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
                            <a href="indexg.php" class="active"><span class="las la-home"></span>
                            <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="productsg.php"><span class="las la-box"></span>
                            <span>Our Products</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="main-content">
            <header>
                <h3>
                    Dashboard for Guest
                </h3>
            </header>
            <br>
            <main>
                <!-- logged in user information -->
				<?php  if (isset($_SESSION['username'])) : ?>
    		    <p class="p">Welcome <strong><?php echo $_SESSION['username']; ?></strong>, this is Warehouse Application.</p>
    		    <p class="p"> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    	        <?php endif ?>

                <?php
                    include_once("config.php");
                ?>
        </div>
    </body>
</html>
