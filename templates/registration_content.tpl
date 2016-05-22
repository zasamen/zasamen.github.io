<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 reg-form">
            <form action="save_user.php" method="post" class="navbar-form centered">
                <h3>{$error_message}</h3>
                <div class="form-group form-group ">
                    <div class="">
                        <h4>E-mail</h4>
                        <input name="email" type="email" class="form-control input-lg" placeholder="email" value="">
                    </div>
                    <div class="">
                        <h4>Login</h4>
                        <input name="login" type="text" class="form-control input-lg" placeholder="login" value="">
                    </div>
                    <div class="">
                        <h4>Password</h4>
                        <input name="password" type="password" class="form-control input-lg" placeholder="password" value="">
                    </div>
                    <div class="">
                        <h4>First Name</h4>
                        <input name="name" type="text" class="form-control input-lg" placeholder="firstname" value="">
                    </div>
                    <div class="">
                        <h4>Second Name</h4>
                        <input name="surname" type="text" class="form-control input-lg" placeholder="surname" value="">
                    </div>
                    <button type="submit" class="btn btn-primary input-lg " data-toggle="tooltip" title="Недоступно">
                        <i class="fa fa-sign-in"></i> Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>>
</div>
