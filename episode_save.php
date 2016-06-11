<?php
require_once ('init.php');

$episode_id=mysqli_real_escape_string($connection,htmlspecialchars($_GET['episode_id']));
$image_url=mysqli_real_escape_string($connection,htmlspecialchars($_GET['image_url']));

$description;$name;$img;


if (isset($_POST['description']))
    $description=mysqli_real_escape_string($connection,htmlspecialchars($_POST['description']));
else
    $description='';
if (isset($_POST['name']))
    $name=mysqli_real_escape_string($connection,htmlspecialchars($_POST['name']));
else
    $header='';
if($_FILES['img']['error'] == UPLOAD_ERR_OK && $_FILES['img']['size'] < 10000000){
    $img = "img/upload/".md5(file_get_contents($_FILES['img']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['img']['name']))[0]);
    rename($_FILES['img']['tmp_name'], $img);

    chmod($img, 0755);
}

if (isset($img)){
    update_episode_with_image($connection,$episode_id,$name,$description,$img);
    unlink($image_url);
}
update_episode_without_image($connection,$episode_id,$name,$description);

header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0].request_get_to_string());