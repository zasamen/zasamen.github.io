<?php
require_once ('init.php');

$error_message = "";
unset($_GET['error_message']);unset($_GET['show_modal']);
if(isset($_POST['login']) && isset($_POST['pass'])){
    $possible_login = mysqli_real_escape_string($connection,htmlspecialchars($_POST['login']));
    $possible_pass = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
    $query_result =get_password_and_status_from_users_by_login($connection,$possible_login);

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
                $error_message = $error_message . "You're haven't assigned e-mail";
            }else {
                $_SESSION['login'] = $possible_login;
                $_SESSION['logged'] = 1;

            }
        }
    }
}else{
    $error_message.='Empty fields';
}
if(mb_strlen($error_message) != 0) logout($error_message,1);
else header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0].request_get_to_string());

