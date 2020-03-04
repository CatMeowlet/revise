<?php

include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';

if (isset($_GET['q_id'])) {
    $u_id = $_SESSION['current_auth_id'];
    $q_id = $_GET['q_id'];
    $status = "PENDING";
    $query = "SELECT q_startTime , q_endTime FROM qualified WHERE q_id = ? LIMIT 1";
    //PROTECT MYSQL INJECTION
    $stmt = $link->prepare($query);
    //ss <- strxng string
    $stmt->bind_param("i", $q_id);
    //EXECUTE PREPARED STATEMENT
    console_log($query);
    $stmt->execute();
    //BIND RESULT VARIABLES
    $stmt->bind_result($q_startTime, $q_endTime);
    //STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();

    if (isset($q_startTime)) {
        $query_req = "INSERT INTO request (q_id, p_id, u_req_startTime,u_req_endTime, status)
        VALUES ('$q_id','$u_id','$q_startTime','$q_endTime','$status')";
        $req_result = mysqli_query($link, $query_req);

        if ($req_result) {
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/parent/index.php?send=true');
        } else {
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/parent/index.php?send=false');
        }
    } else {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/parent/index.php?send=false');
    }
}
