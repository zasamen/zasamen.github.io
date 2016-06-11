<?php
 function show_modal ()
 {
     if(isset($_GET['error_message'])&&isset($_GET['show_modal'])) {
         unset($_GET['show_modal']);
         unset($_GET['error_message']);
         echo "<script type='text/javascript'>
$(document).ready(function(){
$('#modal_no_password').modal('show');
});
</script>";
     }

 }

function set_modal_or_error(Smarty $smarty)
{
    if (isset($error_message)) {
        $error_message =$_GET['error_message'];
        if ($_GET['show_modal'])
            $smarty->assign('modal_body', $error_message);
        else {
            unset($_GET['error_message']);
            $smarty->assign('error_message', $error_message);
        }
    } else
        $smarty->assign('error_message', '');

}