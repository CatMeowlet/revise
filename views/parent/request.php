<?php
$current_page = "REQUEST";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/parent/__requestStatus.php';
// DEFAULT
date_default_timezone_set("Asia/Manila");
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="#" method="POST">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="6">Search Result</th>
                            </tr>
                            <tr>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Days</th>
                                <th class="text-center">Starting Time</th>
                                <th class="text-center">End Time</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($result)) {
                                if (mysqli_num_rows($result) != 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($row['status'] == "APPROVED" || $row['status'] == "PENDING") {
                                            echo '<tr>
                                            <td class="text-center">' . $row["subject"] . '</td>
                                            <td class="text-center">' . $row["days"] . '</td>
                                            <td class="text-center">' . $row["u_req_startTime"] . '</td>
                                            <td class="text-center">' . $row["u_req_endTime"] . '</td>
                                            <td class="text-center">' . $row["status"] . '</td>
                                            <td class="text-center"><button type="button" class="btn btn-danger runCancel" id="runCancel" data-id="' . $row["q_id"] . '">Cancel</button> </td>
                                            </tr>';
                                        } else if ($row['status'] == "DECLINE" || $row['status'] == "CANCELLED") {
                                            echo '<tr>
                                            <td class="text-center">' . $row["subject"] . '</td>
                                            <td class="text-center">' . $row["days"] . '</td>
                                            <td class="text-center">' . $row["u_req_startTime"] . '</td>
                                            <td class="text-center">' . $row["u_req_endTime"] . '</td>
                                            <td class="text-center">' . $row["status"] . '</td>
                                            <td class="text-center"><button type="button" class="btn btn-danger runDelete" id="runDelete" data-id="' . $row["q_id"] . '">Remove</button> </td>
                                            </tr>';
                                        }
                                    } // end of while
                                } else {
                                    echo '<tr><td class="text-center" colspan="5"><p> Nothing Found!!</p></td></tr>';
                                }
                            } else {
                                echo '<tr><td class="text-center" colspan="5"><p> Nothing Found!!</p></td></tr>';
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
include('../../includes/layouts/user_layout_footer.php');
?>
<script type='text/javascript'>
    $(function() {
        $('.runCancel').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            // ask user for confirmation
            alertify.confirm('Are you sure you want to cancel?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/parent/__cancelRequest.php?q_id=' + ids;
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });
</script>
<!-- runDelete -->
<script type='text/javascript'>
    $(function() {
        $('.runDelete').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            // ask user for confirmation
            alertify.confirm('Are you sure you want to remove?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/parent/__removeRequest.php?q_id=' + ids;
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });
</script>