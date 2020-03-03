<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://localhost/revise/res/css/boostrap/bootstrap.min.css">

	<title>iTutor</title>
</head>

<body>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<header class="card-header">
					<a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
					<h4 class="card-title mt-2">Sign up</h4>
				</header>
				<article class="card-body">
					<form action="../controller/services/users/__register.php" method="POST">
						<div class="form-row">
							<div class="col form-group">
								<label>First name </label>
								<input type="text" class="form-control" placeholder="First Name" name="fname">
							</div> <!-- form-group end.// -->
							<div class="col form-group">
								<label>Last name</label>
								<input type="text" class="form-control" placeholder="Last Name" name="lname">
							</div> <!-- form-group end.// -->
						</div> <!-- form-row end.// -->
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="" name="user">
							<small class="form-text text-muted">Use for login.</small>
							<div class="form-group">
								<label>Email address</label>
								<input type="email" class="form-control" placeholder="" name="email">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div> <!-- form-group end.// -->
							<div class="form-group">
								<label class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="type" value="tutor" checked="true">
									<span class="form-check-label"> Tutor </span>
								</label>
								<label class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="type" value="parent">
									<span class="form-check-label"> Parent</span>
								</label>
							</div> <!-- form-group end.// -->
							<div class="form-row">
								<div class="form-group col-md-12">
									<label>Address</label>
									<input type="text" class="form-control" name="address">
								</div> <!-- form-group end.// -->

							</div> <!-- form-row.// -->
							<div class="form-group">
								<label>Create password</label>
								<input class="form-control" type="password" name="pass">
							</div> <!-- form-group end.// -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="register"> Register </button>
							</div> <!-- form-group// -->
							<small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
					</form>
				</article> <!-- card-body end .// -->
				<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
			</div> <!-- card.// -->
		</div> <!-- col.//-->
	</div> <!-- row.//-->
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://localhost/revise/res/js/jquery-3.2.1.slim.min.js"></script>
<script src="http://localhost/revise/res/js/popper-1.12.9.js"></script>
<script src="http://localhost/revise/res/js/bootstrap.min.js"></script>
</body>

</html>