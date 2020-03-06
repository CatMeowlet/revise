<?php


if (isset($_POST['findTutor'])) {
    $u_id = $_SESSION['current_auth_id'];
    $subject = $_POST['subject'];
    $start_time = $_POST['find_startTime'];
    $end_time = $_POST['find_endTime'];
    
    console_log($start_time.'~'.$end_time);

    //SELECT * FROM `qualified` WHERE DATEPART(hh,q_startTime) >= 6 AND DATEPART(hh,q_endTime) <= 22 AND subject = "English"
    //SELECT * FROM `qualified` WHERE q_startTime >= "12:00" AND q_endTime <= "15:00" AND subject = "English"

    //request
    $query_for_matching ="SELECT * FROM qualified WHERE q_startTime <= '$start_time' AND q_endTime >= '$end_time' AND subject = '$subject' ";
    #$link = mysqli_connect("localhost","root", "", "itutorRevise");
    $result = mysqli_query($link, $query_for_matching);
 }
?>