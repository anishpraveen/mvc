<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	
</head>

<body>
	<div class="container" style="padding:10px;">
		<form action="index.php?controller=login&action=check" method="POST">
			<input type="text" name="inputUser" required placeholder="Username">
			<input class="input-group-sm" type="password" required name="inputPassword" placeholder="Password">
			<input type="submit" name="ipSubmit" value="Login" class="btn btn-primary">
			
		</form>

	</div>

</body>

</html>