<?php
require_once ('init.php');

add_comment($connection,$my_session);

function add_comment($connection, $my_session)
{
    add_comment_to_news_by_user(
        $connection,
        $my_session['login'],
        mysqli_real_escape_string($connection, htmlspecialchars($_GET['news_id'])),
        $comment_text = mysqli_real_escape_string($connection, htmlspecialchars($_POST['comment_text']))
    );
    header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . request_get_to_string());
}