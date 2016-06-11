<?php
require_once ('init.php');

$news_id=mysqli_real_escape_string($connection,htmlspecialchars($_GET['news_id']));
$image_url=mysqli_real_escape_string($connection,htmlspecialchars($_GET['image_url']));

$content;$header;$img;


if (isset($_POST['content']))
    $content=mysqli_real_escape_string($connection,htmlspecialchars($_POST['content']));
else
    $content='';
if (isset($_POST['header']))
    $header=mysqli_real_escape_string($connection,htmlspecialchars($_POST['header']));
else
    $header='';
if($_FILES['img']['error'] == UPLOAD_ERR_OK && $_FILES['img']['size'] < 10000000){
    $img = "img/upload/".md5(file_get_contents($_FILES['img']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['img']['name']))[0]);
    rename($_FILES['img']['tmp_name'], $img);

    chmod($img, 0755);
}

if (isset($img)){
    mysqli_query($connection, "UPDATE `news` SET `header`='$header', `content`='$content', `image_url`= '$img' WHERE `news_id`='$news_id'");
    unlink($image_url);
}
mysqli_query($connection, "UPDATE `news` SET `header`='$header', `content`='$content' WHERE `news_id`='$news_id'");

header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0].request_get_to_string());