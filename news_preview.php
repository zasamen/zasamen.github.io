<?php
$content;
{
    require_once ('session_get.php');
    require_once('mafia_db.php');
    require_once('psmarty.php');
    $query_result = mysqli_query($connection, "SELECT * FROM `news`");
    $news_list = mysqli_fetch_all($query_result);
    $smarty->assign('logged',$logged);
    $smarty->assign('superuser',$superuser);
    $smarty->assign('news_list', $news_list);
    $smarty->assign('news_list_length', count($news_list));
    //$smarty->display('news_preview_content.tpl');
    $content=$smarty->fetch('news_preview_content.tpl');
}