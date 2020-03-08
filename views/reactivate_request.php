<?php 
$username = "";
if(isset($_GET['username']))
	$username = $_GET['username'];

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://localhost/revise/res/css/boostrap/bootstrap.min.css">

	<link rel="stylesheet" href="http://localhost/revise/res/css/custom.css">
	<link rel="stylesheet" href="http://localhost/revise/res/css/fontawesome/all.css">
	<title>iTutor</title>
</head>

<body>
	<div class="container my-5">
		<div class="row justify-content-center ">
			<div class="col-md-6">
				<div class="card mt-5">
					<article class="card-body">
						<h4 class="card-title text-center mb-4 mt-1">Request For Re-Activation</h4>
						<p class="text-center"><small>It appears you are not active for a while....</small></p>
						
						<hr>
						<form action="../controller/services/users/__reactivateRequest.php" method="POST">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input name="user" class="form-control" placeholder="Username" type="text" value="<?=$username?>" readonly>
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input name="pass" class="form-control" placeholder="**********" type="password" required>
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<button id="login" type="submit" name="login" class="btn btn-primary btn-block"> Send a Request! </button>
							</div> <!-- form-group// -->
						</form>
					</article>

				</div> <!-- card.// -->
			</div>
		</div><!-- row.// -->
	</div><!-- container.// -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="http://localhost/revise/res/js/jquery-3.2.1.slim.min.js"></script>
	<script src="http://localhost/revise/res/js/popper-1.12.9.js"></script>
	<script src="http://localhost/revise/res/js/bootstrap.min.js"></script>
	<script defer src="http://localhost/revise/res/js/all.js"></script> 
</body>

</html>