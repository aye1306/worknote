<?php 
include('FunctionAll.php');
$func = new function_all();

    $section = $_POST['section'];
    $result = null;
    if ($section === "login") {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $result = $func->login($user,$pass);

        echo json_encode($result);

    }else if ($section === "register") {
        $email = htmlentities($_POST['email']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $nickname = htmlentities($_POST['nickname']);
        
        $result = $func->register($email,$user,$pass,$nickname);
        echo json_encode($result);;
    }
