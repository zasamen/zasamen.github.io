<?php
require_once ('init.php');

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

if (!isset($img)){
    $img="";
}
add_news_by_content_header_img($connection,$content,$header,$img);

header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0].request_get_to_string());
