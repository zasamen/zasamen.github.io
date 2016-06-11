<div class="container">
    <div class="row">
        <div class="centered"><h4>{$error_message}</h4></div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <H2 class="centered"> Change password</H2>
            <form action="change_password.php" method="post" class="navbar-form centered">
                <div class="form-group form-group ">
                    <div class="">
                        <h4>Old password</h4>
                        <input name="old_password" type="password" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <div class="">
                        <h4>New password</h4>
                        <input name="new_password" type="password" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <div class="">
                        <h4>Once more new password</h4>
                        <input name="new_password_2" type="password" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <button type="submit" class="btn btn-primary input-lg " data-toggle="tooltip" title="Изменить">
                        Change password
                    </button>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <H2 class="centered"> Account remove</H2>
            <form action="del_user.php" method="post" class="navbar-form centered">
                <div class="form-group form-group ">
                    <div class="">
                        <h4>password</h4>
                        <input name="password" type="password" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <div class="">
                        <h4>Prove you sober: write "i am SOBER"</h4>
                        <input name="sober" type="text" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <button type="submit" class="btn btn-danger input-lg " data-toggle="tooltip" title="Удалиться">
                        Remove
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
