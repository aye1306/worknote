<?php 
include('FunctionAll.php');
$func = new function_all();

    $obj = json_decode(file_get_contents('php://input'));   
    $section = $obj->section;
    $result = null;

    if ($section === "login") {
        $user = $obj->user;
        $pass = $obj->pass;

        $result = $func->login($user,$pass);

        echo json_encode($result);

    }else if ($section === "register") {
        $email = htmlentities($obj->email);
        $user = htmlentities($obj->user);
        $pass = htmlentities($obj->pass);
        $nickname = htmlentities($obj->nickname);
        
        $result = $func->register($email,$user,$pass,$nickname);
        echo json_encode($result);
    }else if($section === "worktype"){
        echo json_encode("woww");
    }
