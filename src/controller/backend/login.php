<?php

    session_start();
    require "../../helper/helper.php";
    require "../../model/user.php";

    if(isset($_POST["user"]) && isset($_POST['password']) && strlen($_POST["user"]) && strlen($_POST['password'])) {

       $user_name =  $_POST["user"];
       $password =  md5($_POST["password"]);
       $userClass = new User($pdo);
       $data_user = $userClass->getUser($user_name, $password);

       $_SESSION['use_data'] = $data_user;

       if(!empty($data_user)) {
           header('Location: /addmin/dashboard');
       } else {
           $_SESSION['error_msg'] = "User name hoặc password không đúng.";
           header('Location: /auth/login');
       }
    } else {;
        $_SESSION['error_msg'] = "Vui lòng nhập user và password.";
        header('Location: /auth/login');
    }



?>