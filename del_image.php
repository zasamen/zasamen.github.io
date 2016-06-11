<?php
require_once ('init.php');

delete_image($connection);

function delete_image($connection)
{
    $image_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['image_id']));
    $image = mysqli_fetch_array(get_image_url_from_episodes_by_episode_id($connection,$image_id), MYSQLI_ASSOC)['image_url'];
    unlink($image);
    delete_from_image_gallery_by_image_id($connection,$image_id);
    header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0]);
}