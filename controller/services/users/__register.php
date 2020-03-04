<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';

if (isset($_POST['register'])) {
     $fname = trim($_POST['fname']);
     $lname = trim($_POST['lname']);
     $user = trim($_POST['user']);
     $email = trim($_POST['email']);
     $type = $_POST['type'];
     $address = trim($_POST['address']);
     $pass = trim($_POST['pass']);
     $status = "ACTIVE"; // default
     console_log("check" . $fname . "space");
     //SQL QUERY
     $query = "INSERT INTO users (username,password,fname,lname,email,address,type,status)
     VALUES (?,?,?,?,?,?,?,?)";

     // if no space
     if (!empty($fname) && !empty($lname)  && !empty($user)  && !empty($email)  && !empty($address)  && !empty($pass)) {
          //PROTECT MYSQL INJECTION
          $stmt = $link->prepare($query);
          //BIND PARAM
          $stmt->bind_param("ssssssss", $user, $pass, $fname, $lname, $email, $address, $type, $status);
          //EXECUTE PREPARED STATEMENT
          $res = $stmt->execute();
          //CLOSE STATEMENT AND CONNECTION
          $stmt->close();
          //CLOSE DB CONNECTION
          mysqli_close($link);

          console_log($res);
          $success_url = "http://localhost/revise/views/login.php";
          $error_url = "http://localhost/revise/views/register.php";
          if ($res) {
               header("refresh:1; url=$success_url");
               echo "success::redirecting";
          } else {
               header("refresh:1; url=$error_url");
               echo "error::redirecting";
          }
     } else {
          $error_url_space = "http://localhost/revise/views/register.php?empty=true";
          header("refresh:1; url=$error_url_space");
          echo "error::redirecting";
     }
}
