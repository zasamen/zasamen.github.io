<?php
function request_get_to_string()
{
    $get_redir="";
    if (count($_GET) > 0) {
        $get_redir .= '?';
        foreach ($_GET as $get_key => $get_value) {
                 $get_redir .= "$get_key" . '=' . "$get_value" . '&';
        }
    }
    return $get_redir;
}
