<?php
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('session_get.php');

$id=$_GET['id'];
$add_query = mysqli_query($connection, "DELETE FROM `image_gallery` WHERE `id` = '$id'");
header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0]);
