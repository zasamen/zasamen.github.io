<?php

include_once('mafia_db.php');
if(isset($_GET['activation'])
){
    $activation = $_GET['activation'];
    $query_result= mysqli_query($connection,"SELECT `new_password` FROM `users` WHERE `activation` = '$activation'");
    if ($query_result){
        $user=mysqli_fetch_array($query_result);
        if ($user['new_password']!=""){
            $password=$user['new_password'];
            $query_result=mysqli_query($connection,"UPDATE `users` SET `activation` = '', `password` ='$password',`new_password`='' WHERE `activation` LIKE '$activation'");
            echo "Password changed<br>";
        }else{
            $query_result = mysqli_query($connection, "UPDATE `users` SET `Status` = '1',`activation`='' WHERE `activation` = '$activation'");
            echo "Mail is activated<br>";
        }
    }else
        echo "Activation Error<br>";

}
else
    echo "Activation Error<br>";

echo "<a href='index.php'>Mafia</a>";