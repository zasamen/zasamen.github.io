<?php

function get_connection()
{
    if (!isset($connection)) {
        $connection = mysqli_connect("mafia.maksim-barouski.ru", "046482121_mafia", "zzzzzzzz");
        $db = mysqli_select_db($connection, "maksim-borovski0_mafia");
        mysqli_query($connection, "SET NAMES 'utf8' ");
        if (!$connection || !$db) {
            exit();
        }
    }
    return $connection;
}
$connection=get_connection();