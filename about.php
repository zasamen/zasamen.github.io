<?php
require_once ('init.php');

echo set_about($connection,$my_session);
show_modal();
function set_about($connection,$my_session)
{
    $smarty = new PSmarty();
    set_modal_or_error($smarty);
    $smarty->assign('title', "About");
    $smarty->assign('navigation', get_navigation($connection, $my_session));
    $smarty->assign('content', get_about($connection, $my_session));
    return $smarty->fetch('skeleton.tpl');
}

function get_about($connection,$mysession)
{
    $smarty = new PSmarty();
    set_modal_or_error($smarty);
    $smarty->assign('about',get_about_content($connection));
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch('about_content.tpl');
}