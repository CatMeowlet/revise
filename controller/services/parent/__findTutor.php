<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
if (isset($_POST['findTutor'])) {

    $subject = $_POST['subject'];
    $start_time = $_POST['find_startTime'];
    $end_time = $_POST['find_endTime'];
    
    console_log($start_time.'~'.$end_time);


    //request
    $query="INSERT INTO ";
 }
?>