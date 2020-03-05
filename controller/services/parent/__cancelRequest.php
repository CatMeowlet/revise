<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
console_log($_GET['q_id']);

if (isset($_SESSION['current_auth_id'], $_GET['q_id'])) {
    $current_auth_id = $_SESSION['current_auth_id'];
    $q_id = $_GET['q_id'];

    $sql = "DELETE FROM request WHERE q_id = '$q_id' AND p_id = '$current_auth_id' ";
    $result = mysqli_query($link, $sql);

    console_log($sql);
    if ($result) {
        header('location: http://localhost/revise/views/parent/index.php?remove=true');
    } else {
        header('location: http://localhost/revise/views/parent/index.php?remove=false');
    }
}
