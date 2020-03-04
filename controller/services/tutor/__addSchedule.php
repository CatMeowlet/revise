<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_POST['createSchedule'], $_SESSION['current_auth_id'])) {

    $u_id = $_SESSION['current_auth_id'];
    console_log($u_id);
    $subject = $_POST['subject'];
    $days = $_POST["day"];
    $start_time = $_POST['create_startTime'];
    $end_time = $_POST['create_endTime'];
    $status = "AVAILABLE";
    console_log($days);
    console_log($start_time . '~' . $end_time);

    // concatenate days
    $comma_separated_days = implode(",", $days);
    console_log($comma_separated_days);


    //request
    $query = "INSERT INTO qualified 
    (u_id,subject,days,q_startTime,q_endTime,status) VALUES
    (?,?,?,?,?,?)";

    $stmt = $link->prepare($query);
    $stmt->bind_param("ssssss", $u_id, $subject, $comma_separated_days, $start_time, $end_time, $status);
    //EXECUTE PREPARED STATEMENT
    $res = $stmt->execute();
    //CLOSE STATEMENT AND CONNECTION
    $stmt->close();
    //CLOSE DB CONNECTION
    mysqli_close($link);
    console_log($res);

    if ($res) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/tutor/index.php?status=successful');
    } else {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/tutor/index.php?status=failed');
    }
}
