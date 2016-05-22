<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('session_get.php');

$password=$_POST['password'];
$sober=$_POST['sober'];
$error_message='';

if (mb_strlen($password) < 8)
    $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $password))
    $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";

$query_request = mysqli_query($connection, "SELECT `password` FROM `users` WHERE `login`='$login'");
    $md5_password = mysqli_fetch_array($query_request,MYSQLI_ASSOC)['password'];
    var_dump(mysqli_fetch_array($query_request,MYSQLI_ASSOC));
    echo $md5_password;
    if (md5($password) != $md5_password) {
        $error_message .= "Wrong password<br>";
    }
    if (($sober) != 'i am SOBER') {
        $error_message .= "You are sober<br>";
    }

    if (mb_strlen($error_message) != 0)
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=$error_message");
    else {
        $add_query = mysqli_query($connection, "DELETE FROM `users` WHERE `users`.`login` = '$login'");

        unset($_SESSION['login']);
        unset($_SESSION['logged']);

        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=user removed.");
    }
