<?php
require_once ('session_get.php');
require_once ('mafia_db.php');
require_once ('psmarty.php');

$news_id=$_GET['id'];
$query_result = mysqli_query($connection, "SELECT * FROM `news_comments` WHERE `news_id`='$news_id' ORDER BY `publication_date`");
$comments= mysqli_fetch_all($query_result);

$sub_smarty=new PSmarty();
$sub_smarty->assign('logged',$logged);
$sub_smarty->assign('superuser',$superuser);
$sub_smarty->assign('comments',$comments);
$sub_smarty->assign('news_id',$news_id);
$comment_list=$sub_smarty->fetch('comment.tpl');
