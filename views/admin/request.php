<?php
$current_page = "REQUEST";
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/admin/__usersList.php';
?>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="#">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="5">All Request</th>
                            </tr>
                            <tr>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($result_req)) {
                                if (mysqli_num_rows($result_req) != 0) {
                                    while ($row = mysqli_fetch_array($result_req)) {
                                        if ($row['request_status'] == "PENDING") {
                                            echo '
                                            <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                                            <tr>
                                                 <td class="text-center">' . $row["fname"] . '  '  . $row["lname"] . '</td>
                                                 <td class="text-center">' . $row["username"] . '</td>
                                                 <td class="text-center">' . $row["type"] . '</td>
                                                 <td class="text-center">' . $row["request_status"] . '</td>
                                                 <td class="text-center">    <button type="button" class="btn btn-primary runActivate" id="runActivate" data-id="' . $row["user_id"] . ' , ' . $row["type"] . '">Activate</button> </td>
                                            </tr>';
                                        }
                                    }
                                } else {
                                    echo '<tr><td class="text-center" colspan="7"><p> Nothing Found!!</p></td></tr>';
                                }
                            } else {
                                echo '<tr><td class="text-center" colspan="7"><p> Nothing Found!!</p></td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                            <a href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>" class="page-link">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                            <a href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?> " class="page-link">Next</a>
                        </li>
                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('../../includes/layouts/admin_layout_footer.php');
?>
<!-- runConfirm -->
<script type='text/javascript'>
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