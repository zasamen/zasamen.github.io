<?php
require_once ('init.php');

$smarty=new PSmarty();
$smarty->assign('navigation',get_navigation($connection,$my_session));
$smarty->assign('title', 'News');
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$smarty->assign('content', get_form_for_editing_news($connection,$my_session));
$smarty->display('skeleton.tpl');
show_modal();

function get_form_for_editing_news($connection, $mysession)
{
    $smarty = new PSmarty();
    $news_id=$_GET['news_id'];
    $those_news=mysqli_fetch_array(get_news_by_news_id($connection,$news_id));
    $smarty->assign('those_news',$those_news);
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch("news_edit.tpl");
}
