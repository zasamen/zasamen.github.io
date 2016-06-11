<?php
require_once ('init.php');

try_to_change_password($connection,$my_session);

function try_to_change_password($connection,$my_session)
{
    $old_password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['old_password']));
    $new_password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['new_password']));
    $new_password_2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['new_password_2']));
    $error_message = check_passwords_regexprs($old_password, $new_password, $new_password_2);
    if (mb_strlen($error_message) != 0) {
        $_GET['error_message'] = $error_message;
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . request_get_to_string());
    } else {
        $login = $my_session['login'];
        $md5_password = mysqli_fetch_array(get_password_by_login($connection, $login), MYSQLI_ASSOC)['password'];
        if (md5($old_password) != $md5_password) {
            $error_message .= "Wrong password<br>";
            $_GET['error_message'] = $error_message;
            header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . request_get_to_string());
        } else {
            $md5_password = md5($new_password);
            if (set_new_password_changed_by_user($connection,$login,$md5_password))
                header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=Password changed.");
            else
                header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=Unknown error.");
        }
    }
}

function check_passwords_regexprs($old_password,$new_password,$new_password_2)
{
    $error_message = '';
    if (mb_strlen($old_password) < 8)
        $error_message = "The length of old password should be at least 8 symbols.<br>";
    if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $old_password))
        $error_message .= "Wrong symbols in old password (only Latin letters and Arab numbers).<br>";
    if (mb_strlen($new_password) < 8)
        $error_message .= "The length of new password should be at least 8 symbols.<br>";
    if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $new_password))
        $error_message .= "Wrong symbols in new password (only Latin letters and Arab numbers).<br>";
    if (mb_strlen($new_password_2) < 8)
        $error_message .= "The length of second new password should be at least 8 symbols.<br>";
    if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $new_password_2))
        $error_message .= "Wrong symbols in second password (only Latin letters and Arab numbers).<br>";
    if ($new_password != $new_password_2) {
        $error_message .= "New passwords are not equal<br>";
    }
    return $error_message;
}