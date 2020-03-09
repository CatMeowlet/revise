<?php
$current_page = "HOME";
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/admin/__usersList.php';
?>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <!-- COL 1 -->
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-dark" id="company_data" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">ADMIN - list</th>
                        </tr>
                        <tr>
                            <th class="text-right">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result_admin)) {
                            if ($row['type'] == "admin") {
                                echo '<tr>
                            <td class="text-right">' . $row["fname"] . '</td>
                            <td class="text-center">' . $row["username"] . '</td>
                            <td class="text-center">' . $row["status"] . '</td>
                            <td class="text-center">Read Only</td>
                            </tr>';
                            }
                        } //end of while
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.COL 1 -->


        <!-- COL 2 -->
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-dark" id="company_data" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">Tutor - list</th>
                        </tr>
                        <tr>
                            <th class="text-right">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result_tutor)) {
                            if ($row['type'] == "tutor" && $row['status'] == "ACTIVE") {
                                echo '
                                <tr>
                                <td class="text-right">' . $row["fname"] . '</td>
                                <td class="text-center">' . $row["username"] . '</td>
                                <td class="text-center">' . $row["status"] . '</td>
                                <!-- <td class="text-center"><a href="http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' . $row["uid"] . '&&type=' . $row["type"] . '">Deactivate</td> -->
                                <td class="text-center">
                                 <button type="button" class="btn btn-danger runDeactivate" id="runDeactivate" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Deactivate</button> 
                                 <button type="button" class="btn btn-danger runConfirm" id="runConfirm" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Delete</button> </td>
                                </tr>
                                ';
                            } else {
                                echo '
                                <tr>
                                <td class="text-right">' . $row["fname"] . '</td>
                                <td class="text-center">' . $row["username"] . '</td>
                                <td class="text-center">' . $row["status"] . '</td>
                                <!-- <td class="text-center"><a href="http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' . $row["uid"] . '&&type=' . $row["type"] . '">Deactivate</td> -->
                                <td class="text-center">
                                 <button type="button" class="btn btn-primary runActivate" id="runActivate" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Activate</button> 
                                 <button type="button" class="btn btn-danger runConfirm" id="runConfirm" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Delete</button> </td>
                                </tr>
                                ';
                            }
                        } //end of while
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.COL 2 -->

        <!-- COL 3 -->
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-dark" id="company_data" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">Parent - list</th>
                        </tr>
                        <tr>
                            <th class="text-right">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result_parent)) {
                            if ($row['type'] == "parent" && $row['status'] == "ACTIVE") {
                                echo '
                                <tr>
                                <td class="text-right">' . $row["fname"] . '</td>
                                <td class="text-center">' . $row["username"] . '</td>
                                <td class="text-center">' . $row["status"] . '</td>
                                <!-- <td class="text-center"><a href="http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' . $row["uid"] . '&&type=' . $row["type"] . '">Deactivate</td> -->
                                <td class="text-center">
                                 <button type="button" class="btn btn-danger runDeactivate" id="runDeactivate" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Deactivate</button> 
                                 <button type="button" class="btn btn-danger runConfirm" id="runConfirm" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Delete</button> </td>
                                </tr>
                                ';
                            } else {
                                echo '
                                <tr>
                                <td class="text-right">' . $row["fname"] . '</td>
                                <td class="text-center">' . $row["username"] . '</td>
                                <td class="text-center">' . $row["status"] . '</td>
                                <!-- <td class="text-center"><a href="http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' . $row["uid"] . '&&type=' . $row["type"] . '">Deactivate</td> -->
                                <td class="text-center">
                                 <button type="button" class="btn btn-primary runActivate" id="runActivate" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Activate</button> 
                                 <button type="button" class="btn btn-danger runConfirm" id="runConfirm" data-id="' . $row["uid"] . ' , ' . $row["type"] . '">Delete</button> </td>
                                </tr>
                                ';
                            }
                        } //end of while
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.COL 3 -->
    </div>
</div>
<?php
include('../../includes/layouts/admin_layout_footer.php');
?>
<!-- runConfirm -->
<script type='text/javascript'>
    $(function() {
        $('.runConfirm').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            var arr = ids.split(' , ');
            console.log(arr);
            // ask user for confirmation
            alertify.confirm('Are you sure you want to continue?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' + arr[0] + '&&type=' + arr[1];
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });

    $(function() {
        $('.runDeactivate').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            var arr = ids.split(' , ');
            console.log(arr);
            // ask user for confirmation
            alertify.confirm('Are you sure you want to continue?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/admin/__usersDeactivate.php?uid=' + arr[0] + '&&type=' + arr[1];
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });

    $(function() {
        $('.runActivate').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            var arr = ids.split(' , ');
            console.log(arr);
            // ask user for confirmation
            alertify.confirm('Are you sure you want to continue?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/admin/__usersActivate.php?uid=' + arr[0] + '&&type=' + arr[1];
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });
</script>