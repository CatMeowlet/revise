<?php

include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/currentAuthInfo.php';

#$target_dir = "http://localhost/revise/res/img/profile"
if (isset($_POST['submit'])) {
    if (!empty($_FILES["image"]["name"])) {
        $curr_id = $_SESSION['current_auth_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $img = $_FILES["image"]["name"];

        //SQL QUERY
        $query = "UPDATE users SET fname = ? , lname = ?, email = ?, address = ?, img = ? WHERE uid = ? ";
        //PROTECT MYSQL INJECTION
        $stmt = $link->prepare($query);
        //BIND PARAM
        $stmt->bind_param("sssssi", $fname, $lname, $email, $address, $img, $curr_id);
        //EXECUTE PREPARED STATEMENT
        $res = $stmt->execute();
        //CLOSE STATEMENT AND CONNECTION
        $stmt->close();
        //CLOSE DB CONNECTION
        mysqli_close($link);

        if ($res) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../../../res/img/profile/" . $_FILES["image"]["name"]);
            header('location: http://localhost/revise/views/tutor/profile.php?update=true');
        } else {
           // header('location: http://localhost/revise/views/tutor/profile.php?update=failed');
        }
    }

    if (empty($_FILES["image"]["name"])) {
        $curr_id = $_SESSION['current_auth_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        //SQL QUERY
        $query = "UPDATE users SET fname = ? , lname = ?, email = ?, address = ? WHERE uid = ? ";
        //PROTECT MYSQL INJECTION
        $stmt = $link->prepare($query);
        //BIND PARAM
        $stmt->bind_param("ssssi", $fname, $lname, $email, $address, $curr_id);
        //EXECUTE PREPARED STATEMENT
        $res = $stmt->execute();
        //CLOSE STATEMENT AND CONNECTION
        $stmt->close();
        //CLOSE DB CONNECTION
        mysqli_close($link);

        if ($res) {
            header('location: http://localhost/revise/views/tutor/profile.php?update=true');
        } else {
            header('location: http://localhost/revise/views/tutor/profile.php?update=failed');
        }
    }
} else {
    header('location: http://localhost/revise/views/tutor/profile.php?update=failed');
}
