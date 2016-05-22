<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('session_get.php');

$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$new_password_2=$_POST['new_password_2'];
$error_message='';

if (mb_strlen($old_password) < 8)
    $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $old_password))
    $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";
if (mb_strlen($new_password) < 8)
    $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $new_password))
    $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";
if (mb_strlen($new_password_2) < 8)
    $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $new_password_2))
    $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";

if ($new_password!=$new_password_2){
    $error_message.="New passwords are not equal<br>";
}else {
    $query_request = mysqli_query($connection, "SELECT `password` FROM `users` WHERE `login`='$login'");
    $md5_password = mysqli_fetch_array($query_request,MYSQLI_ASSOC)['password'];
    var_dump(mysqli_fetch_array($query_request,MYSQLI_ASSOC));
    echo $md5_password;
    if (md5($old_password) != $md5_password) {
        $error_message .= "Wrong password<br>";

    }
    if (mb_strlen($error_message) != 0)
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=$error_message");
    else {
        $md5_password = md5($new_password);
        $add_query = mysqli_query($connection, "UPDATE `users` SET `password` = $md5_password WHERE `users`.`login`=$login");
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=Password changed.");
    }
}