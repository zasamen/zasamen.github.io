<?php
include_once ('session_get.php');
include_once('mafia_db.php');
include_once('psmarty.php');
include_once ('show_skeleton_modal.php');
$error_message = "";

if(isset($_POST['login']) && isset($_POST['pass'])){
    $possible_login = $_POST['login'];
    $possible_pass = $_POST['pass'];
    $query_result = mysqli_query($connection, "SELECT `password`, `status` FROM `users` WHERE `login` LIKE '$possible_login'");

    if(mysqli_num_rows($query_result) == 0){
        $error_message = $error_message . "Wrong login";
    }
    else{
        $rec = mysqli_fetch_array($query_result);

        if(md5($possible_pass) != $rec['password']){
            $error_message = $error_message . "Wrong password";
        }
        else{
            if($rec['status'] != 1){
                $error_message = $error_message . "You're banned or haven't assigned e-mail";
            }else {
                $_SESSION['login'] = $possible_login;
                $_SESSION['logged'] = 1;
            }
        }
    }
}else{
    $error_message.='Empty fields';
}
$get="";
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $get="?id=$id";
}elseif (isset($_GET['number'])){
    $number=$_GET['number'];
    $get="?number=$number";
}
if(mb_strlen($error_message) != 0){
    unset($_SESSION['login']);
    unset($_SESSION['logged']);
    if (mb_strlen($get)==0)$get='?';else $get.='&';
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0].$get."error_message=$error_message&show_modal='1'");
}
else{
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0].$get);
}

