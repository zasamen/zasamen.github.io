<?php
require_once ('init.php');

echo activate_or_password_reset($connection);

function activate_or_password_reset($connection)
{
    $reference = "<a href='index.php'>Mafia</a><br>";
    if (isset($_GET['activation'])) {
        $activation = mysqli_real_escape_string($connection, htmlspecialchars($_GET['activation']));
        $query_result = get_new_password_by_activation($connection, $activation);
        if ($query_result) {
            $user = mysqli_fetch_array($query_result);
            if ($user['new_password'] != "") {
                $password = $user['new_password'];
                if ($query_result = set_new_password($connection, $activation, $password))
                    return $reference . "Password changed<br>";
                else
                    return $reference . "Password not changed<br>";
            } else {
                if (set_user_activated($connection, $activation))
                    return $reference . "Mail is activated<br>";
                else
                    return $reference . "Mail is not activated<br>";
            }
        } else
            return $reference . "Activation Error<br>";

    } else
        return $reference . "Activation Error<br>";
}