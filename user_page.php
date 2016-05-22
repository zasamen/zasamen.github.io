<?php
include_once('session_get.php');
include_once('psmarty.php');
require_once ('navigation.php');
require_once ('news_preview.php');
require_once ('show_skeleton_modal.php');

if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$smarty->assign('navigation',$navigation);
$smarty->assign('title', "User Page");


$sub_smarty = new PSmarty;
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}elseif (isset($_GET['error_message']))
    $sub_smarty->assign('error_message', $_GET['error_message']);
else
    $sub_smarty->assign('error_message', "");

$smarty->assign('content', $sub_smarty->fetch('templates/user_page.tpl'));


$smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}