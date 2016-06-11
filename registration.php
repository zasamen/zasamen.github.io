<?php
require_once ('init.php');

$smarty=new PSmarty();
$smarty->assign('navigation',get_navigation($connection,$my_session));

$smarty->assign('title', "Registration");
if (isset($_GET['error_message']) && isset($_GET['show_modal'])) {
    $smarty->assign('modal_body', $_GET['error_message']);
}
    $smarty->assign('content', get_registration_content($my_session));
$smarty->display('skeleton.tpl');
show_modal();


function get_registration_content($mysession)
{
    $smarty = new PSmarty();
    if (isset($_GET['error_message']))
        $smarty->assign('error_message', $_GET['error_message']);
    else
        $smarty->assign('error_message', "");
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch('registration_content.tpl');
}