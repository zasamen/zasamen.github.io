<?php
require_once ('init.php');

$smarty=new PSmarty();
$smarty->assign('navigation',get_navigation($connection,$my_session));
$smarty->assign('title', 'News');
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body', $_GET['error_message']);
}
$smarty->assign('content', get_news_content($connection,$my_session));
$smarty->display('skeleton.tpl');
show_modal();

function get_news_content($connection,$my_session)
{
    $news_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['news_id']));
    $those_news = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `news` WHERE `news_id`=$news_id"), MYSQLI_ASSOC);
    $publication_date = $those_news['publication_date'];
    $next_id=get_next_news_id($connection,$publication_date);
    $prev_id=get_prev_news_id($connection,$publication_date);
    $smarty = new PSmarty();
    $smarty->assign('those_news', $those_news);
    $smarty->assign('prev_id', $prev_id);
    $smarty->assign('next_id', $next_id);
    $smarty->assign('my_session', $my_session);
    $smarty->assign('comment_list', get_comments($connection, $my_session));
    return $smarty->fetch("news_full_content.tpl");
}

function get_next_news_id($connection,$publication_date){
    $next_id = mysqli_fetch_array(
       get_next_news_id_by_publication_date($connection,$publication_date), MYSQLI_ASSOC
    )['news_id'];
    if ($next_id == null) $next_id = '0';
    return $next_id;
}

function get_prev_news_id($connection,$publication_date){
    $prev_id = mysqli_fetch_array(
        get_prev_news_id_by_publication_date($connection,$publication_date), MYSQLI_ASSOC
    )['news_id'];
    if ($prev_id == null) $prev_id = 0;
    return $prev_id;
}