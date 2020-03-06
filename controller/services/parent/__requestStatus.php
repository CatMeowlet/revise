<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_SESSION['current_auth_id'])) {
    $u_id = $_SESSION['current_auth_id'];
    // PAGINATION
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 5;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM request";
    $result = mysqli_query($link, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    //QUERY
    $query = "SELECT qualified.subject, qualified.days, request.u_req_startTime,request.u_req_endTime,request.status, request.q_id, request.p_id
        FROM qualified, request WHERE qualified.q_id = request.q_id AND request.p_id = '$u_id' LIMIT $offset, $no_of_records_per_page";

    $result = mysqli_query($link, $query);
    console_log($result);
}
