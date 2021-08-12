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
        $result = $func->getwork_type();
        echo json_encode($result);

    }else if ($section === "addwork") {

        $subject = htmlentities($obj->subject);
        $workname = htmlentities($obj->workname);
        $deadline = htmlentities($obj->deadline);
        $time = htmlentities($obj->time);
        $desc = htmlentities($obj->desc);
        $w_type = htmlentities($obj->w_type);
        $text = str_replace("\n","<br>","$desc");
        $user_id =  htmlentities($obj->user_id);

        $today = date('Y-m-d');
        //แปลงวันที่เป็นจำนวนเลข 
        list($yearToday, $monthToday, $dayToday) = explode("-", $today);
        list($year, $month, $day) = explode("-", $deadline);

        $todayNumber = $yearToday.$monthToday.$dayToday;
        $deadlineNumber = $year.$month.$day;

        $finalDeadline = $deadline." ".$time;

        if ($deadlineNumber < $todayNumber) {
            echo "lastdate";
        }else{
            $result = $func->addwork($subject,$workname,$finalDeadline,$w_type, $text, $user_id);
            echo json_encode($result);
        }
    }else if ($section == "querySizeWork") {
        $result = $func->getSizework($obj->user_id);
        echo json_encode($result);
    }
