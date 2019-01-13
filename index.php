<!DOCTYPE html>
<html lang="en">
<head>
	<title>Community Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<!--custom stylesheet-->
	<link href="css/world.css" rel="stylesheet">
	<!--fontawesome cdn-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12 color-header">
				<h1 class="font-custom text-center">the mall community</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3" id="login-form">
					<form action="login/login.php" method="post">
						<div class="form-group">
				      <input type="email" class="form-control shadow-common" id="email" placeholder="Enter username" name="login_user" required>
				    </div>
				    <div class="form-group">
				      <input type="password" class="form-control shadow-common" id="pwd" placeholder="Enter password" name="login_user_pass" required>
				    </div>
						<div class="text-center form-group">
				    	<button type="submit" class="btn btn-success">LOGIN</button>
						</div>
					</form>
					<div>
						<h5 class="text-center"><a href="#">Forgot Password?</a></h5>
					</div>
			</div>
		</div>

		<div class="row" id="footer">
			<div class="col-md-12">
				<h6>&copy; Xterminators | innogeeks.kiet@gmail.com</h6>
			</div>
		</div>

	</div>
</body>
</html>
