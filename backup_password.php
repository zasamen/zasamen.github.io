<?php
require_once ('init.php');

echo get_password_backup_page($connection,$my_session);
show_modal();

function get_password_backup_page($connection,$my_session){
    $smarty=new PSmarty();
    $smarty->assign('navigation',get_navigation($connection,$my_session));
    $smarty->assign('title', "Backup");
    $smarty->assign('content', get_backup_password_content($my_session));
    set_modal_or_error($smarty);
    return $smarty->fetch('skeleton.tpl');
}

function get_backup_password_content($mysession)
{
    $smarty = new PSmarty();
    set_modal_or_error($smarty);
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch('backup_password_content.tpl');
}