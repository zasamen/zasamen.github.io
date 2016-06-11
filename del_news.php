<?php
require_once ('init.php');

delete_news($connection);

function delete_news($connection)
{
    $news_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['news_id']));
    $image = mysqli_fetch_array(get_image_url_from_news_by_news_id($connection,$news_id), MYSQLI_ASSOC)['image_url'];
    unlink($image);
    delete_from_news_by_news_id($connection,$news_id);
    $new_page = explode("?", $_SERVER['HTTP_REFERER'])[0];
    $_SERVER['HTTP_REFERER'] = str_replace("episode", "index", $new_page);
    header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0]);
}