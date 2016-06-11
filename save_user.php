<?php
require_once ('init.php');

$login=mysqli_real_escape_string($connection,htmlspecialchars($_POST['login']));
$password=mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
$mail=mysqli_real_escape_string($connection,htmlspecialchars($_POST['email']));
$name=mysqli_real_escape_string($connection,htmlspecialchars($_POST['name']));
$surname=mysqli_real_escape_string($connection,htmlspecialchars($_POST['surname']));
$error_message='';

if (mb_strlen($login) == 0)
    $error_message = $error_message . "login can't be empty.<br>";
if (mb_strlen($name) == 0)
    $error_message = $error_message . "name can't be empty.<br>";
if (mb_strlen($surname) == 0)
    $error_message = $error_message . "surname can't be empty.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $login))
    $error_message = $error_message . "There are illegal symbols in login<br>";
if (mb_strlen($password) < 8)
    $error_message = $error_message . "The length of password should be at least 8 symbols.<br>";
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $password))
    $error_message = $error_message . "Wrong symbols in password (only Latin letters and Arab numbers).<br>";
if (mb_strlen($mail) == 0)
    $error_message = $error_message . "E-mail can't be empty.<br>";
if (!preg_match("/^\w[\w.-]*@(\w+\.)+\w{2,6}$/", $mail))
    $error_message = $error_message . "Wrong symbols in E-mail (only Latin letters and Arab numbers).<br>";

if (mysqli_num_rows(mysqli_query($connection,"SELECT id FROM `users` WHERE `login` LIKE '$login' OR `email` LIKE '$mail'")))
    $error_message = $error_message . "User with the same login or e-mail exists.<br>";
if (mb_strlen($error_message) != 0)
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=$error_message");
else{
    $md5_pass = md5($password);
    $activation = md5($mail.time());
    $add_query = mysqli_query($connection, "INSERT INTO `users`(`login`, `password`, `email`, `activation`,`name`,`surname`)VALUES ('$login', '$md5_pass', '$mail', '$activation','$name','$surname')");
    include_once("smtp/SendMail.php");
    $base_url='http://mafia.maksim-barouski.ru/activation.php';
    $to = $mail;
    $subject = "Emmail acception";
    $link = $base_url."?activation=$activation";
    $text = "For e-mail accept follow this link $link";
    SendMail($to, $subject, $text);
    file_put_contents('smtp.txt',$text);
    header('Location: '.explode("?", $_SERVER['HTTP_REFERER'])[0]."?error_message=Accept your e-mail.");
}