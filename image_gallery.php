<?php
require_once ('init.php');

$smarty=new PSmarty();
$smarty->assign('navigation',get_navigation($connection,$my_session));
$smarty->assign('title', "Gallery");
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}
$smarty->assign('content',get_image_gallery_content($connection,$my_session));
$smarty->display('skeleton.tpl');
show_modal();

function get_image_gallery_content($connection,$my_session)
{
    $images = mysqli_fetch_all(get_images_from_gallery_order_by_publication_date($connection), MYSQLI_NUM);

    $images_count = count($images);
    $images_shower = [];
    $images_shower['images_count'] = $images_count;
    if ($my_session['superuser']==0) {
        $images_shower['carousel_count'] = ($images_count == 0) ? 0 : (($images_count > 7) ? 7 : $images_count);
        $images_shower['carousel_display'] = ($images_count == 0) ? 0 : 1;
        $images_shower['images_display'] = (($images_count / 7) == 0) ? 0 : 1;
    }else{
        $images_shower['carousel_count'] = 0;
        $images_shower['carousel_display'] = 0;
        $images_shower['images_display'] = $images_count>0?1:0;
    }
    $smarty = new PSmarty();
    $smarty->assign('images_shower',$images_shower );
    $smarty->assign('images', $images);
    $smarty->assign('my_session', $my_session);
    if (isset($_GET['error_message']))
        $smarty->assign('error_message', $_GET['error_message']);
    else
        $smarty->assign('error_message', "");
    return $smarty->fetch('image_gallery_content.tpl');
}