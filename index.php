<?php
    require_once ('init.php');

    $smarty=new PSmarty();
    if(isset($_GET['error_message'])) {
        $smarty->assign('modal_body',$_GET['error_message']);
    }
    $smarty->assign('navigation',get_navigation($connection,$my_session));
    $smarty->assign('title', "Mob");
    $smarty->assign('content', get_news_preview_content($connection,$my_session));
    $smarty->display('skeleton.tpl');
    show_modal();

function get_news_preview_content($connection,$mysession)
{
    $news_list = mysqli_fetch_all(get_all_news_short($connection),MYSQLI_ASSOC);
    $smarty=new PSmarty();
    $smarty->assign('my_session', $mysession);
    $smarty->assign('news_list', $news_list);
    $smarty->assign('news_list_length', count($news_list));
    return $smarty->fetch('news_preview_content.tpl');
}