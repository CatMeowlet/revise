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
        $query = "DELETE FROM users WHERE uid = '$id' ";
        $result = mysqli_query($link, $query);
        if ($result) {
            header('location: http://localhost/revise/views/admin/index.php?remove=true');
        } else
            header('location: http://localhost/revise/views/admin/index.ph?remove=false');
    }
}
