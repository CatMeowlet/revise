<?php
$current_page = "HOME";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
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
        <div class="card">
            <div class="card-body">
                <form action="../../controller/services/parent/__findTutor.php" method="POST">
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
                            <input class='form-control mr-4' type='time' name='find_startTime' min="08:00" max="18:00" required>

                            to

                            <input class='form-control ml-4' type='time' name='find_endTime' min="08:00" max="18:00" required>
                        </div>
                        <small>Available time are within 8am to 6pm</small>
                    </div>
                    <div class="form-group">
                        <label for="note">Leave a note/description: </label>
                        <textarea placeholder="Add something you want to say here..." class="form-control" id="note" name="note" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" name="findTutor" value="Find a tutor"></input>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../../includes/layouts/user_layout_footer.php');
?>