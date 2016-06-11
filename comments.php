<?php
require_once ('init.php');

function get_comments($connection,$mysession)
{
    $news_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['news_id']));
    $comments = mysqli_fetch_all(get_comments_by_news_id($connection, $news_id));

    $smarty = new PSmarty();
    $smarty->assign('my_session', $mysession);
    $smarty->assign('comments', $comments);
    $smarty->assign('news_id', $news_id);
    return $smarty->fetch('comment.tpl');
}