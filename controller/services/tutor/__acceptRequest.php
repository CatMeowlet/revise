<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';

if (isset($_POST['acceptRequest'])) {
    $tutor_id = $_SESSION['current_auth_id'];
    $parent_id = $_POST['parent_id'];
    $q_id = $_POST['q_id'];


    //update qualified(tutor)
    $sql = "UPDATE qualified SET p_id = '$parent_id', status = 'ACCEPTED' WHERE u_id = '$tutor_id' AND q_id = '$q_id' ";
    $res_u_qualified = mysqli_query($link, $sql);

    if ($res_u_qualified) {
        $sql_u_request = "UPDATE request SET status='APPROVED' WHERE q_id = '$q_id' AND p_id = '$parent_id' ";
        $res_u_request = mysqli_query($link, $sql_u_request);
        if ($res_u_request) {
            header('location: http://localhost/revise/views/tutor/request.php?update=true');
        } else {

            header('location: http://localhost/revise/views/tutor/request.php?update=failed');
        }
    } else {
        header('location: http://localhost/revise/views/tutor/request.php?update=failed');
    }
}
