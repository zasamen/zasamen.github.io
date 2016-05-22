<?php
    require_once ('session_get.php');
    require_once ('psmarty.php');
    require_once ('navigation.php');
    require_once ('news_preview.php');
    require_once ('show_skeleton_modal.php');

    if(isset($_GET['error_message'])) {
        $smarty->assign('modal_body',$_GET['error_message']);
    }
    $smarty->assign('navigation',$navigation);
    $smarty->assign('title', "Mob");
    $smarty->assign('content', $content);
    $smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    echo 'show';
    show_modal();
}
echo $_SERVER['REQEST_URI'];