<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');

$sub_smarty=new PSmarty();

$query_result = mysqli_query($connection, "SELECT `number` FROM `episodes`");
$episode_numbers = mysqli_fetch_all($query_result);
$get="";
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $get="?id=$id";
}elseif (isset($_GET['number'])){
    $number=$_GET['number'];
    $get="?number=$number";
}
$superuser=($group_id=="2")?"1":"";
$sub_smarty->assign('get',$get);
$sub_smarty->assign('episode_numbers',$episode_numbers);
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
$sub_smarty->assign('name',$name);
$sub_smarty->assign('surname',$surname);
$navigation=$sub_smarty->fetch('navigation.tpl');
