<?php
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/console.php';

if (isset($_POST['register'])) {
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $user = $_POST['user'];
     $email = $_POST['email'];
     $type = $_POST['type'];
     $address = $_POST['address'];
     $pass = $_POST['pass'];
     $status = "ACTIVE"; // default
     //SQL QUERY
     $query = "INSERT INTO users (username,password,fname,lname,email,address,utype,ustatus)
     VALUES (?,?,?,?,?,?,?,?)";

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
     if($res){
          header( "refresh:1; url=$success_url" );
          echo "success::redirecting";
     }else{
          header( "refresh:1; url=$error_url" );
          echo "error::redirecting";
     }
}
