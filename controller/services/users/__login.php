<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $status = "ACTIVE";

    $query = "SELECT uid, username, type, status FROM users WHERE username = ? AND password = ?";

    //PROTECT MYSQL INJECTION
    $stmt = $link->prepare($query);
    //ss <- string string
    $stmt->bind_param("ss", $user, $pass);
    //EXECUTE PREPARED STATEMENT
    $res = $stmt->execute();
    //BIND RESULT VARIABLES
    $stmt->bind_result($u_id, $u_name, $u_type, $u_status);
    //STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();


    if ($res) {
        console_log($res);
        if ($u_status == "ACTIVE") {
            console_log($u_status);
            switch ($u_type) {
                case "admin":
                    header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/admin/index.php');
                    break;
                case "tutor":
                    header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/tutor/index.php');
                    break;
                case "parent":
                    header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/parent/index.php');
                    break;
                default:
                    header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php?err=credentials');
                    break;
            }

            // SESSION
            $_SESSION['current_auth_id'] = $u_id;
            $_SESSION['current_auth_name'] = $u_name;
            $_SESSION['current_auth_type'] = $u_type;

            //CLOSE STATEMENT AND CONNECTION
            $stmt->close();
            //CLOSE DB CONNECTION
            mysqli_close($link);
        } elseif ($u_status == "DEACTIVE") {
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/reactivate_request.php?username=' . $user);
        } else {
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php?err=credentials');
        }
    } else {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php?err=credentials');
    }
}
