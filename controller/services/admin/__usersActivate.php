<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';

console_log($_SESSION['current_auth_type']);
console_log($_GET['uid']);
if (isset($_SESSION['current_auth_type'], $_GET['uid'])) {
    $id = $_GET['uid'];
    $type = $_GET['type'];

    //QUERY
    if ($type == "admin") {
        header('location: http://localhost/revise/views/admin/index.php?error=true');
    } else {
        $query = "UPDATE users SET status ='ACTIVE' WHERE uid = '$id' AND type='$type' ";
        $result = mysqli_query($link, $query);
        if ($result) {
            $query2 = "UPDATE reactivate_request SET request_status = 'CONFIRMED' where user_id ='$id' ";
            $result2 = mysqli_query($link, $query2);
            if ($result2) {
                header('location: http://localhost/revise/views/admin/index.php?update=true');
            } else {
                header('location: http://localhost/revise/views/admin/index.ph?update=false');
            }
        } else
            header('location: http://localhost/revise/views/admin/index.ph?update=false');
    }
}
