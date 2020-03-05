<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';


if (isset($_SESSION['current_auth_id'], $_GET['qid'], $_GET['uid'])) {
    $q_id = $_GET['qid'];
    $u_id = $_GET['uid'];

    $sql = "DELETE FROM qualified WHERE q_id = '$q_id' AND u_id = '$u_id' ";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header('location: http://localhost/revise/views/tutor/index.php?remove=true');
    } else
        header('location: http://localhost/revise/views/tutor/index.ph?remove=false');
}
