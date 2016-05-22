<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('password_gen.php');
$mail=$_POST['email'];
$error_message='';

if (mb_strlen($mail) == 0)
    $error_message = $error_message . "\'E-mail\' can't be empty.<br>";
elseif (!preg_match("/^\w[\w.-]*@(\w+\.)+\w{2,6}$/", $mail))
    $error_message = $error_message . "Wrong symbols in E-mail (only Latin letters and Arab numbers).<br>";
elseif (mb_strlen($error_message) != 0)
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
else{
    $password=generatePassword();
    $md5_pass=md5($password);
    $activation=md5($mail.time());
    echo mysqli_query($connection, "UPDATE `users` SET `new_password` = '$md5_pass',`activation`='$activation'  WHERE `email` = '$mail'");
    include_once("smtp/SendMail.php");
    $base_url='http:/mafia.maksim-barouski.ru/activation.php';
    $to = $mail;
    $subject = "Password_backup";
    $link = $base_url."?activation=$activation";
    $text = "For e-mail accept follow this link $link your new password= `$password`";
    SendMail($to, $subject, $text);
    file_put_contents('smtp.txt',$text);
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Sent.");
}