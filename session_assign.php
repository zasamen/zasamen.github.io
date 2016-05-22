<?php
include_once ('session_get.php');
if ($sub_smarty!=null) {
    $sub_smarty->assign('logged', $logged);
    $sub_smarty->assign('superuser', $superuser);
}
if($smarty!=null) {
    $smarty->assign('logged', $logged);
    $smarty->assign('superuser', $superuser);
}
