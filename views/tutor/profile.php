<?php
$current_page = "PROFILE";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/currentAuthInfo.php';
console_log($img);
?>

<div class="container mt-5">
    <form method="POST" enctype="multipart/form-data" action="../../controller/services/tutor/__updateProfile.php">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= nl2br($img_loc); ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6><br>Change Photo.</h6>
                            <input type="file" name="image"class="text-center center-block file-upload">
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <!--left /col-3-->

            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <br>
                                <form class="form" method="post" action="../controller/profile-edit-process.php" id="registrationForm">
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h4>First name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="fname" id="first_name" placeholder="first name" title="enter your first name if any." style="font-weight:bold; font-size: 14px;" value="<?= $fname; ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h4>Last name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="lname" id="last_name" placeholder="last name" title="enter your last name if any." style="font-weight:bold; font-size: 14px;" value="<?= $lname; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." style="font-weight:bold; font-size: 14px;" value="<?= $email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="location">
                                                <h4>Address</h4>
                                            </label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="somewhere" title="enter a location" style="font-weight:bold; font-size: 14px;" value="<?= $address; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit" name="submit"><i class="fas fa-save" name="btnSave"></i>&nbsp Save</button>
                                            <button class="btn btn-lg btn-danger" type="reset"><i class="fas fa-undo"></i>&nbsp Reset</button>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div>
                            <!--/tab-pane-->

                        </div>
                        <!--/tab-content-->
                    </div>
                </div>
            </div>
            <!--/col-9-->
        </div>
    </form>
</div>
<!--/row-->
<?php
include('../../includes/layouts/tutor_layout_footer.php');
?>