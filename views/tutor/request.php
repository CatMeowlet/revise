<?php
$current_page = "REQUEST";

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/tutor/__requestStatus.php';
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
                                <th class="text-center" colspan="7">All Request</th>
                            </tr>
                            <tr>
                                <th class="text-center">Parent Name</th>
                                <th class="text-center">Requested Subject</th>
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
                                        echo '<tr>
                                    <td class="text-center">' . $row["fname"] . '  '  . $row["lname"] . '</td>
                                    <td class="text-center">' . $row["subject"] . '</td>
                                    <td class="text-center">' . $row["days"] . '</td>
                                    <td class="text-center">' . $row["u_req_startTime"] . '</td>
                                    <td class="text-center">' . $row["u_req_endTime"] . '</td>
                                    <td class="text-center">' . $row["status"] . '</td>
                                    </tr>';
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
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('../../includes/layouts/tutor_layout_footer.php');
?>