<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Inventory &#124 Warehouse Application</title>
		<link rel="stylesheet" href="styleweb.css">
	</head>
	<body>
		<table>
			<tr>
				<th><img src="image/wh.png" width="210px"></th>
			</tr>
		</table>
		
		<div class="header">
  			<h2>Login</h2>
		</div>
	 
  		<form method="post" action="login.php">
  			<?php include('errors.php'); ?>
  			<div class="input-group">
  				<label>Username</label>
  				<input type="text" name="username">
  			</div>
  			<div class="input-group">
  				<label>Password</label>
  				<input type="password" name="password">
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="login_user">Login</button>
  			</div>
  				<p>Not yet a member? <a href="register.php">Sign up</a></p>
  		</form>
	</body>
</html>