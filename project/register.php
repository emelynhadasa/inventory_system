<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=0.0">
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
  			<h2>Register</h2>
  		</div>
	
  		<form method="post" action="register.php">
  			<?php include('errors.php'); ?>
  			<div class="input-group">
  				<label>Username</label>
  				<input type="text" name="username" value="<?php echo $username; ?>">
  			</div>
  			<div class="input-group">
  	  			<label>Email</label>
  	  			<input type="email" name="email" value="<?php echo $email; ?>">
  			</div>
  			<div class="input-group">
  	  			<label>Password</label>
  	  			<input type="password" name="password_1">
  			</div>
  			<div class="input-group">
  	  			<label>Confirm password</label>
  	  			<input type="password" name="password_2">
  			</div>
  			<div class="input-group">
  	  			<button type="submit" class="btn" name="reg_user">Register</button>
  			</div>
  			<p>Already a member? <a href="login.php">Sign in</a></p>
  		</form>
	</body>
</html>