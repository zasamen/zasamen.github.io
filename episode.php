<?php
require_once ('init.php');

echo set_episode($connection,$my_session);
show_modal();
function set_episode($connection,$my_session)
{

    $smarty = new PSmarty();
    $smarty->assign('navigation', get_navigation($connection, $my_session));
    $episode_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['episode_id']));
    $smarty->assign('title', "Episode" . $episode_id);
    $smarty->assign('content', get_episode_content($connection, $my_session, $episode_id));
    set_modal_or_error($smarty);
    return $smarty->fetch('skeleton.tpl');
}


function get_episode_content($connection,$my_session,$episode_id)
{
    $query_result = get_episode_by_episode_id($connection,$episode_id);
    $episode = mysqli_fetch_array($query_result);
    $smarty = new PSmarty();
    $smarty->assign('episode', $episode);
    set_modal_or_error($smarty);
    $smarty->assign('next_id',get_next_episode_id($connection,$episode['publication_date']));
    $smarty->assign('prev_id',get_prev_episode_id($connection,$episode['publication_date']));
    $smarty->assign('my_session', $my_session);
    return $smarty->fetch("episode_content.tpl");
}


function get_next_episode_id($connection, $publication_date){
    $next_id = mysqli_fetch_array(
        get_next_episode_id_by_publiation_date($connection,$publication_date),
        MYSQLI_ASSOC
    )['episode_id'];
    if ($next_id == null) $next_id = '0';
    return $next_id;
}

function get_prev_episode_id($connection, $publication_date){
    $prev_id = mysqli_fetch_array(
        get_prev_episode_id_by_publication_date($connection,$publication_date),
        MYSQLI_ASSOC
    )['episode_id'];
    if ($prev_id == null) $prev_id = 0;
    return $prev_id;
}