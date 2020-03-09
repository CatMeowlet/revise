<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';


	//QUERY
    $query_admin = "SELECT * FROM users WHERE type='admin' ORDER BY uid ASC";
    $query_tutor = "SELECT * FROM users WHERE type='tutor' ORDER BY uid ASC";
    $query_parent = "SELECT * FROM users WHERE type='parent' ORDER BY uid ASC";
    $query_req = "SELECT reactivate_request.request_status , reactivate_request.user_id, users.uid, users.fname,  users.lname,users.username, users.email , users.type 
    FROM reactivate_request, users WHERE reactivate_request.user_id = users.uid";

    $result_admin = mysqli_query($link, $query_admin);
    $result_tutor = mysqli_query($link, $query_tutor);
    $result_parent = mysqli_query($link, $query_parent);

    $result_req = mysqli_query($link, $query_req);