<?php
$current_page = "HOME";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/parent/__findTutor.php';
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="findsubject">Find a Subject</label>
                            <select class='form-control' name='subject' id="findsubject" required>
                                <option>Select Subject</option>
                                <option value='English'>English</option>
                                <option value='Filipino'>Filipino</option>
                                <option value='Math'>Math</option>
                                <option value='Science'>Science</option>
                                <option value='Computer'>Computer</option>
                                <option value='History'>History</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="timeschedule">Select a time Schedule</label>
                            <div class='form-inline'>
                                <input class='form-control mr-4' type='time' id="find_startTime" name='find_startTime' min="08:00" max="18:00" required>

                                to

                                <input class='form-control ml-4' type='time' id="find_endTime" name='find_endTime' min="08:00" max="18:00" required>
                            </div>
                            <small>Available time are within 8am to 6pm</small>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" name="findTutor" value="Find a tutor"></input>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <form action="#" method="POST">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th class="text-center" colspan="5">Search Result</th>
                            </tr>
                            <tr>
                                <th class="text-right">Subject</th>
                                <th class="text-center">Days</th>
                                <th class="text-center">Starting Time</th>
                                <th class="text-center">End Time</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($result)) {
                                if (mysqli_num_rows($result) != 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>
                                    <td class="text-right"><input type="hidden" id="subject" value="' . $row["subject"] . '" >' . $row["subject"] . '</td>
                                    <td class="text-center">' . $row["days"] . '</td>
                                    <td class="text-center">' . $row["q_startTime"] . '</td>
                                    <td class="text-center">' . $row["q_endTime"] . '</td>
                                    <td class="text-center">
                                     <button type="button" class="btn btn-danger runRequest" id="runRequest" data-id="' . $row["q_id"] . ' ">
                                     Request</button> </td>
                                    </tr>';
                                    }
                                } else {
                                    echo '<tr><td class="text-center" colspan="5"><p> Nothing Found!!</p></td></tr>';
                                }
                            } else {
                                echo '<tr><td class="text-center" colspan="5"><p> Nothing Found!!</p></td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('../../includes/layouts/user_layout_footer.php');
?>
<!-- runConfirm -->
<script type='text/javascript'>
    $(function() {
        $('.runRequest').click(function(event) {
            // get the id you want to act on
            var ids = $(this).data("id");
            // ask user for confirmation
            alertify.confirm('Are you sure you want to send a request?',
                // accepted
                function() {
                    // go to the processing page
                    // window.location = '/itutor/accept.php?rid=' + theId;
                    window.location = 'http://localhost/revise/controller/services/parent/__sendRequest.php?q_id=' + ids;
                    alertify.success('Send was Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });
</script>