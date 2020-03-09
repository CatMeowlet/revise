<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';


if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $status = 'PENDING';
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass' AND status ='DEACTIVE' ";
    $res = mysqli_query($link, $query);
    // check if user exist
    if (mysqli_num_rows($res) == 1) {
        while ($row = mysqli_fetch_array($res)) {
            $user_id = $row['uid'];
        }
        //check if user already sent req
        $checkDuplicate = "SELECT * FROM reactivate_request WHERE user_id = '$user_id' AND request_status = '$status' ";
        $res_count = mysqli_query($link, $checkDuplicate);
        console_log($res_count);
        if (mysqli_num_rows($res_count) == 0) {
            $sql_insert = "INSERT INTO reactivate_request (user_id,request_status) VALUES ('$user_id','$status') ";
            $res_insert = mysqli_query($link,$sql_insert);
           
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php?m=success');
        }else{
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php?m=duplicate');
        }
    }else{
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/reactivate_request.php?username='.$user);
    }

}
