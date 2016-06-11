<?php
require_once ('init.php');

function logout($error_message=null,$show_modal=null)
{
    unset($_SESSION['login']);
    unset($_SESSION['logged']);
    unset($_SESSION['superuser']);
    unset($_SESSION['name']);
    unset($_SESSION['surname']);
    if (isset($error_message))
        $_GET['error_message']=$error_message;
    if (isset($show_modal))
        $_GET['show_modal']=$show_modal;
        header('Location: '.$_SERVER['HTTP_REFERER'].request_get_to_string());
}