<?php
require_once ('init.php');

$description;$name;$img;

if (isset($_POST['name']))
    $name=mysqli_real_escape_string($connection,htmlspecialchars($_POST['name']));
else
    $name='';
if (isset($_POST['description']))
    $description=mysqli_real_escape_string($connection,htmlspecialchars($_POST['description']));
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
add_new_episode_by_everything($connection,$name,$description,$img);

header('Location: ' . explode("?", $_SERVER['HTTP_REFERER'])[0].request_get_to_string());
