<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';


	//QUERY
    $query_admin = "SELECT * FROM users WHERE type='admin' ORDER BY uid ASC";
    $query_tutor = "SELECT * FROM users WHERE type='tutor' ORDER BY uid ASC";
    $query_parent = "SELECT * FROM users WHERE type='parent' ORDER BY uid ASC";

    $result_admin = mysqli_query($link, $query_admin);
    $result_tutor = mysqli_query($link, $query_tutor);
    $result_parent = mysqli_query($link, $query_parent);