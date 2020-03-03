<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php');

if (isset($_SESSION['current_auth_type'])) {
    switch ($_SESSION['current_auth_type']) {
        case "admin":
            include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/layouts/admin_layout_header.php';
            break;
        case "tutor":
            include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/layouts/user_layout_header.php';
            break;
        case "parent":
            include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/layouts/user_layout_header.php';
            break;
        default:
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/revise/views/login.php');
            break;
    }
}
