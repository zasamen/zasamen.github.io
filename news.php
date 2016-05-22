<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');
require_once ('navigation.php');
require_once ('show_skeleton_modal.php');
require_once ('comments.php');
$smarty->assign('navigation',$navigation);

$id=$_GET['id'];
$query_result = mysqli_query($connection, "SELECT * FROM `news` WHERE `id`= $id");
$news = mysqli_fetch_array($query_result,MYSQLI_ASSOC);
$publication_date=$news['publication_date'];
$query_result=mysqli_query($connection,"SELECT `id` FROM `news` WHERE `publication_date` >\"$publication_date\" LIMIT 1");
$next_id=mysqli_fetch_array($query_result,MYSQLI_ASSOC)['id'];
if ($next_id==null) {
    $next='disabled';
    $next_id='#';
}else {
    $next='';
}
$query_result=mysqli_query($connection,"SELECT `id` FROM `news` WHERE `publication_date` <\"$publication_date\" ORDER BY `publication_date` DESC LIMIT 1 ");
$prev_id = mysqli_fetch_array($query_result, MYSQLI_ASSOC)['id'];
if ($prev_id==null) {
    $prev='disabled';
    $prev_id='#';
}else {
    $prev = '';
}

$smarty->assign('title', $news['header']);
$sub_smarty=new PSmarty();
$sub_smarty->assign('news',$news);
$sub_smarty->assign('prev_id',$prev_id);
$sub_smarty->assign('next_id',$next_id);
$sub_smarty->assign('next',$next);
$sub_smarty->assign('prev',$prev);
$sub_smarty->assign('comment_list',$comment_list);
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
if(isset($_GET['error_message'])) {
    $smarty->assign('modal_body',$_GET['error_message']);
}

$smarty->assign('content', $sub_smarty->fetch("news_full_content.tpl"));
$smarty->assign('news',$news);
$smarty->display('skeleton.tpl');
if(isset($_GET['error_message'])&&isset($_GET['show_modal'])){
    show_modal();
}