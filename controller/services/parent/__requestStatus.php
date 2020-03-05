<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_SESSION['current_auth_id'])) {
    $u_id = $_SESSION['current_auth_id'];
    //QUERY

        //QUERY
        $query = "SELECT qualified.subject, qualified.days, request.u_req_startTime,request.u_req_endTime,request.status, request.q_id, request.p_id
        FROM qualified, request WHERE qualified.q_id = request.q_id AND request.p_id = '$u_id'";
   
    $result = mysqli_query($link, $query);
    console_log($result);



}
