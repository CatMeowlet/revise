<?php
$current_page = "HOME";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/tutor/__displaySchedule.php';
// DEFAULT
date_default_timezone_set("Asia/Manila");
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="../../controller/services/tutor/__addSchedule.php" method="POST">
                        <div class="form-group">
                            <label for="findsubject">Create a Subject</label>
                            <select class='form-control' name='subject' id="subject" required>
                                <option>Select Subject</option>
                                <option value='English'>English</option>
                                <option value='Filipino'>Filipino</option>
                                <option value='Math'>Math</option>
                                <option value='Science'>Science</option>
                                <option value='Computer'>Computer</option>
                                <option value='History'>History</option>
                            </select>
                        </div>
                        <label for="findsubject">Select Day:</label>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="day[]" id="day" value="M">
                            <label class="form-check-label" for="day"> Monday </label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="day[]" id="day" value="T">
                            <label class="form-check-label" for="day"> Tuesday</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="day[]" id="day" value="W">
                            <label class="form-check-label" for="day"> Wednesday</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="day[]" id="dday" value="TH">
                            <label class="form-check-label" for="day"> Thursday</label>
                        </div>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="day[]" id="day" value="F">
                            <label class="form-check-label" for="day"> Friday</label>
                        </div>

                        <div class="form-group mt-2">
                            <label for="timeschedule">Set the Start Time</label>
                            <div class='form-inline'>
                                <input class='form-control mr-4' type='time' name='create_startTime' min="08:00" max="18:00" required>

                                to

                                <input class='form-control ml-4' type='time' name='create_endTime' min="08:00" max="18:00" required>
                            </div>
                            <small>Available time are within 8am to 6pm</small>
                        </div>
                        <input type="submit" class="btn btn-primary float-right" name="createSchedule" value="Add schedule"></input>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="5">Created Schedule</th>
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
                        if (mysqli_num_rows($result) != 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>
                                <td class="text-right">' . $row["subject"] . '</td>
                                <td class="text-center">' . $row["days"] . '</td>
                                <td class="text-center">' . $row["q_startTime"] . '</td>
                                <td class="text-center">' . $row["q_endTime"] . '</td>
                                <td class="text-center"><button type="button" class="btn btn-danger runDelete" id="runDelete" data-id="' . $row["q_id"] . ' , ' . $row["u_id"] . '">Delete</button> </td>
                                </tr>';
                            }
                        } else {
                            echo '<tr><td class="text-center" colspan="5"><p> Nothing Found!!</p></td></tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('../../includes/layouts/tutor_layout_footer.php');
?>
<!-- runDelete -->
<script type='text/javascript'>
    $(function() {
        $('.runDelete').click(function(event) {
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
                    window.location = 'http://localhost/revise/controller/services/tutor/__scheduleDelete.php?qid=' + arr[0] + '&&uid=' + arr[1];
                    alertify.success('Delete Successful');
                },
                // declined
                function() {
                    alertify.error('Action Canceled');
                }).set('closable', false);
        });
    });
</script>