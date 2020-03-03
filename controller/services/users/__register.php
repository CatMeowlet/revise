<?php
     include $_SERVER['DOCUMENT_ROOT'].'/revise/includes/utility/session.php';
     include $_SERVER['DOCUMENT_ROOT'].'/revise/includes/utility/console.php';
     include '../../models/User.php';

     if(isset($_POST['register'])){
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $user = $_POST['user'];
          $email = $_POST['email'];
          $type = $_POST['type'];
          $address = $_POST['address'];
          $pass = $_POST['pass'];

         
     }    
?>