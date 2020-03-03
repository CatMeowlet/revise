<?php
include_once  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';


	//QUERY
    $query = "SELECT * FROM users ORDER BY uid ASC";
    $result = mysqli_query($link, $query);
