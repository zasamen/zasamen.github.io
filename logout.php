<?php
include_once ('session_get.php');

unset($_SESSION['login']);
unset($_SESSION['logged']);

header('Location: '.$_SERVER['HTTP_REFERER']);