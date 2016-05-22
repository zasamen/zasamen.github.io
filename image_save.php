<?php
include_once("session_get.php");
include_once("mafia_db.php");

$img;
if (isset($_POST['description']))
    $description=$_POST['description'];
else
    $description='';

if($_FILES['img'][error] == UPLOAD_ERR_OK && $_FILES['img'][size] < 10000000){
    $img = "img/upload/".md5(file_get_contents($_FILES['img']['tmp_name'])).".".(array_reverse(explode(".", $_FILES['img']['name']))[0]);
    rename($_FILES['img']['tmp_name'], $img);

    chmod($img, 0755);
}

if (isset($img)){
    mysqli_query($connection, "INSERT INTO `image_gallery`(`description`, `image_url`) VALUES ('$description', '$img')");
}
header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]);