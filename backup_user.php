<?php
require_once ('init.php');


try_to_backup_user($connection);

function try_to_backup_user($connection){
    $mail=mysqli_real_escape_string($connection,htmlspecialchars($_POST['email']));
    if (mb_strlen($mail) == 0) {
        $error_message = "\'E-mail\' can't be empty.<br>";
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=$error_message");
    }
    elseif (!preg_match("/^\w[\w.-]*@(\w+\.)+\w{2,6}$/", $mail)) {
        $error_message = "Wrong symbols in E-mail (only Latin letters and Arab numbers).<br>";
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=$error_message");
    }
    else{
        send_new_password_to_user($connection,$mail);
    }
}

function send_new_password_to_user($connection,$mail){
    $password=generate_password();
    $md5_pass=md5($password);
    $activation=md5($mail.time());
    add_new_password_to_user($connection,$md5_pass,$activation,$mail);
    include_once("smtp/SendMail.php");
    $link = "http:/mafia.maksim-barouski.ru/activation.php?activation=$activation";
    SendMail($mail, "Password_backup", "For e-mail accept follow this link $link your new password= `$password`");
    file_put_contents('smtp.txt',"For e-mail accept follow this link $link your new password= `$password`");
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Sent.");
}