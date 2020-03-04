<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_SESSION['current_auth_id'])) {
    $u_id = $_SESSION['current_auth_id'];
    //QUERY
    $query = "SELECT users.uid, users.fname,users.lname, request.q_id, request.u_req_startTime,
    request.u_req_endTime, request.status, qualified.subject, qualified.days 
    FROM users, request, qualified WHERE users.uid = request.p_id AND qualified.q_id = request.q_id AND qualified.u_id = '$u_id'";
    $result = mysqli_query($link, $query);
    console_log($result);
}
