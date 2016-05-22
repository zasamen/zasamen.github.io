<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');

$id=$_GET['id'];
$news_id=$_GET['news_id'];
$add_query = mysqli_query($connection, "DELETE FROM `news_comments` WHERE `id` = '$id'");
header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0]."?id=$news_id");
