<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 reg-form">
            <form action="save_user.php" method="post" class="navbar-form centered">
                <h3>{$error_message}</h3>
                <div class="form-group form-group ">
                    <div class="">
                        <h4>E-mail</h4>
                        <input name="email" type="email" class="form-control input-lg" placeholder="email" maxlength="60">
                    </div>
                    <div class="">
                        <h4>Login</h4>
                        <input name="login" type="text" class="form-control input-lg" placeholder="login" maxlength="60">
                    </div>
                    <div class="">
                        <h4>Password</h4>
                        <input name="password" type="password" class="form-control input-lg" placeholder="password" maxlength="64">
                    </div>
                    <div class="">
                        <h4>First Name</h4>
                        <input name="name" type="text" class="form-control input-lg" placeholder="firstname" maxlength="30">
                    </div>
                    <div class="">
                        <h4>Second Name</h4>
                        <input name="surname" type="text" class="form-control input-lg" placeholder="surname" maxlength="30">
                    </div>
                    <button type="submit" class="btn btn-primary input-lg " data-toggle="tooltip" title="Подтвердить">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>>
</div>
