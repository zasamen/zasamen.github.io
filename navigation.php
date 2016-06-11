<?php

function get_navigation($connection,$mysession)
{
    $smarty = new PSmarty();
    $query_result = get_episodes_ids($connection);
    $episode_ids = mysqli_fetch_all($query_result);
    $get = request_get_to_string();
    $smarty->assign('get', $get);
    $smarty->assign('episode_ids', $episode_ids);
    $smarty->assign('my_session', $mysession);
    return $smarty->fetch('navigation.tpl');
}