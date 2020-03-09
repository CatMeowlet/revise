<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';

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
    $query_admin = "SELECT * FROM users WHERE type='admin' ORDER BY uid ASC";
    $query_tutor = "SELECT * FROM users WHERE type='tutor' ORDER BY uid ASC";
    $query_parent = "SELECT * FROM users WHERE type='parent' ORDER BY uid ASC";
    $query_req = "SELECT reactivate_request.request_status , reactivate_request.user_id, users.uid, users.fname,  users.lname,users.username, users.email , users.type 
    FROM reactivate_request, users WHERE reactivate_request.user_id = users.uid LIMIT $offset, $no_of_records_per_page";

    $result_admin = mysqli_query($link, $query_admin);
    $result_tutor = mysqli_query($link, $query_tutor);
    $result_parent = mysqli_query($link, $query_parent);

    $result_req = mysqli_query($link, $query_req);