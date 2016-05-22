<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('navigation.php');
require_once ('show_skeleton_modal.php');

$smarty->assign('navigation',$navigation);

$query_result = mysqli_query($connection, "SELECT * FROM `image_gallery` ORDER BY `publication_date`");
$images = mysqli_fetch_all($query_result,MYSQLI_NUM);
$images_count=count($images);
$carousel_display=($images_count==0)?('display:none;'):'';
$carousel_count=(($carousel_count=($images_count-7))>0)?$carousel_count:0;
$images_display=(($images_count/7)==0)?('display:none'):'';
$smarty->assign('title', "Gallery");

if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$sub_smarty=new PSmarty();
$sub_smarty->assign('images_count',$images_count);
$sub_smarty->assign('carousel_count',$carousel_count);
$sub_smarty->assign('carousel_display',$carousel_display);
$sub_smarty->assign('images_display',$images_display);
$sub_smarty->assign('images',$images);
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
if(isset($_GET['error_message']))
    $sub_smarty->assign('error_message', $_GET['error_message']);
else
    $sub_smarty->assign('error_message', "");
$smarty->assign('content',$sub_smarty->fetch("image_gallery_content.tpl"));
$smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}