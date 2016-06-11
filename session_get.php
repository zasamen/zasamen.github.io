<?php
require_once ('init.php');

function get_session_started($connection)
{
    session_start();
    $my_session = [];
    $my_session['logged'] = 1;
    if (isset($_SESSION['login'])&&(!empty($_SESSION['logged']))) {
        $login=$_SESSION['login'];
        $my_session['login'] = $login;
        $row = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'"));
        $my_session['superuser'] = ($row['group_id']==2)?1:0;
        $my_session['name']=$row['name'];
        $my_session['surname'] = $row['surname'];
    } else{
        $my_session['logged'] = 0;
        $my_session['login'] = "";
        $my_session['superuser'] =0;
        $my_session['name']='';
        $my_session['surname'] = '';
    }

    return $my_session;
}
$my_session=get_session_started($connection);