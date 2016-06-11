<?php
require_once ('init.php');

delete_comment_by_id($connection);

function delete_comment_by_id($connection)
{
    $comment_id = mysqli_real_escape_string($connection, htmlspecialchars($_GET['comment_id']));
    delete_comment_by_id_no_reference($connection,$comment_id);
    header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0] . request_get_to_string());
}