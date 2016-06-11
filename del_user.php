<?php
require_once ('init.php');
delete_from_news_by_news_id($connection,$my_session);

function delete_user_by_himself($connection,$my_session)
{
    $password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
    $sober = mysqli_real_escape_string($connection, htmlspecialchars($_POST['sober']));
    $error_message = '';

    if (mb_strlen($password) < 8)
        $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
    if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $password))
        $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";

    $login = $my_session['login'];
    $query_request = get_password_from_users_by_login($connection,$login);
    $md5_password = mysqli_fetch_array($query_request, MYSQLI_ASSOC)['password'];
    var_dump(mysqli_fetch_array($query_request, MYSQLI_ASSOC));
    echo $md5_password;
    if (md5($password) != $md5_password) {
        $error_message .= "Wrong password<br>";
    }
    if (($sober) != 'i am SOBER') {
        $error_message .= "You are not sober<br>";
    }

    if (mb_strlen($error_message) != 0)
        header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . "?error_message=$error_message");
    else {
        $login = $my_session['login'];
        $add_query = delete_from_users_by_login($connection,$login);
        if ($add_query) {
            logout('user removed');
        }
    }
}