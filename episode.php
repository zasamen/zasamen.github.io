<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('navigation.php');
require_once ('show_skeleton_modal.php');

$smarty->assign('navigation',$navigation);

$number=$_GET['number'];

$query_result = mysqli_query($connection, "SELECT * FROM `episodes` WHERE `number`= $number");
$episode = mysqli_fetch_array($query_result);

$smarty->assign('title', "Episode".$number);
$sub_smarty=new PSmarty();
include_once ('session_assign.php');
$sub_smarty->assign('episode',$episode);
if(isset($_GET['error_message']))
    $sub_smarty->assign('error_message', $_GET['error_message']);
else
    $sub_smarty->assign('error_message', "");
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
$smarty->assign('content',$sub_smarty->fetch("episode_content.tpl"));
$smarty->assign('episode',$episode);
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}