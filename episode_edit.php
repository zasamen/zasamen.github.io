<?php
require_once ('init.php');

$smarty=new PSmarty();
$smarty->assign('navigation',get_navigation($connection,$my_session));
$smarty->assign('title', 'Episodes');
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$smarty->assign('content', get_form_for_editing_episodes($connection,$my_session));
$smarty->display('skeleton.tpl');
show_modal();

function get_form_for_editing_episodes($connection, $mysession)
{
    $smarty = new PSmarty();
    $episode_id=$_GET['episode_id'];
    $episode=mysqli_fetch_array(get_episode_by_episode_id($connection,$episode_id));
    $smarty->assign('episode',$episode);
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch("episode_edit.tpl");
}
