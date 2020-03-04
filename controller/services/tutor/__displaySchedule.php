<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_SESSION['current_auth_id'])) {
    $u_id = $_SESSION['current_auth_id'];
    //QUERY
    $query = "SELECT * FROM qualified WHERE u_id = '$u_id'  ORDER BY q_id ASC";

    $result = mysqli_query($link, $query);
    console_log($result);
}
