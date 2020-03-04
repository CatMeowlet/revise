<?php

include_once "session.php";

if (isset($_SESSION['current_auth_id'])) {
    $id = $_SESSION['current_auth_id'];
    $sql = "SELECT * FROM users WHERE uid = ? ";

    // $res = mysqli_query($link, $id);
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    //EXECUTE
    $stmt->execute();
    //BIND
    $stmt->bind_result($id, $username, $password, $fname, $lname, $email, $address,$type, $status, $img);
    //STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();

    $img_loc = "http://localhost/revise/res/img/profile/".$img;
} else {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php');
}
