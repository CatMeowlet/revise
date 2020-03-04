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
    <link rel="stylesheet" href="http://localhost/revise/res/css/alertify.css">
    <title>iTutor</title>
</head>

<body id="auth_body">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="custom-bg">
        <a class="navbar-brand ml-5" href="#"><img src="http://localhost/revise/res/img/logo.png" class="img__logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-2 ml-5" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if( $current_page == "HOME"){echo "active";}else{echo "";} ?>">
                    <a class="nav-link" href="http://localhost/revise/views/admin/index.php"> <span class="custom-text">User</span> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="http://localhost/revise/views/admin/index.php"> <span class="custom-text">Request</span> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link mr-5" href="http://localhost/revise/controller/services/users/__logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="custom-text">Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>