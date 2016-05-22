<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('navigation.php');
require_once ('show_skeleton_modal.php');

$smarty->assign('navigation',$navigation);
$smarty->assign('title', "About");

if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}

$query_result = mysqli_query($connection, "SELECT * FROM `one_image_content` WHERE `header`='about'");
$about = mysqli_fetch_array($query_result);

$sub_smarty=new PSmarty();
$sub_smarty->assign('about',$about);
if(isset($_GET['error_message']))
    $sub_smarty->assign('error_message', $_GET['error_message']);
else
    $sub_smarty->assign('error_message', "");
$smarty->assign('content',$sub_smarty->fetch("about_content.tpl"));
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
$smarty->display('skeleton.tpl');

if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}