<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $status = "ACTIVE";

    $query = "SELECT uid, username, type, status FROM users WHERE username = ? AND password = ? AND status = ? ";

    //PROTECT MYSQL INJECTION
    $stmt = $link->prepare($query);
    //ss <- string string
    $stmt->bind_param("sss", $user, $pass, $status);
    //EXECUTE PREPARED STATEMENT
    $stmt->execute();
    //BIND RESULT VARIABLES
    $stmt->bind_result($u_id,$u_name, $u_type, $u_status);
    //STORE RESULT
    $stmt->store_result();
    //FETCH RESULT
    $stmt->fetch();

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
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php');
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
}
