<?php
require_once ('init.php');


    $episode_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['episode_id']));
    $image = mysqli_fetch_array(
        get_image_url_from_episodes_by_episode_id($connection, $episode_id),
        MYSQLI_ASSOC
    )['image_url'];
    unlink($image);
    delete_episode_by_episode_id($connection,$episode_id);
    $new_page = explode("?", $_SERVER['HTTP_REFERER'])[0];
    $_SERVER['HTTP_REFERER'] = str_replace("episode", "index", $new_page);
    header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . request_get_to_string());
