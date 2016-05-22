<?php
session_start();

$logged = 1;
if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}
else{
    $login = "";
}
if(!isset($_SESSION['logged']) or empty($_SESSION['logged'])){
    $logged = 0;
}
$group_id="0";
$name="";
$surname="";
if($login != ""){
    include_once('mafia_db.php');
    $query_result = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
    $row = mysqli_fetch_array($query_result);
    $group_id = $row['group_id'];
    $name=$row['name'];
    $surname=$row['surname'];

}
else{
    $group_id= "0";
}