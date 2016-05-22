<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('session_get.php');

$comment_text=$_POST['comment_text'];
$news_id=$_GET['news_id'];
$error_message='';

$add_query = mysqli_query($connection, "INSERT INTO `news_comments`(`login`, `news_id`, `comment`)
VALUES ('$login', '$news_id', '$comment_text')");
header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0]."?id=$news_id");
