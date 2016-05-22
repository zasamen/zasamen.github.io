<?php
require_once ('session_get.php');
require_once ('psmarty.php');
require_once ('navigation.php');
require_once ('show_skeleton_modal.php');

$smarty->assign('navigation',$navigation);
$smarty->assign('title', "Backup");

$sub_smarty=new PSmarty();
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])) {
    $smarty->assign('modal_body', $_GET['error_message']);
}elseif(isset($_GET['error_message']))
    $sub_smarty->assign('error_message', $_GET['error_message']);
else
    $sub_smarty->assign('error_message', "");
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
$smarty->assign('content', $sub_smarty->fetch('backup_password.tpl'));
$smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}