{if $logged==0}
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 reg-form">
                <form action="backup_user.php" method="post" class="navbar-form centered">
                    <h3>{$error_message}</h3>
                    <div class="form-group form-group ">
                        <div class="">
                            <h4>E-mail</h4>
                            <input name="email" type="email" class="form-control input-lg" placeholder="email" maxlength="100" value="">
                        </div>
                        <button type="submit" class="btn btn-primary input-lg " data-toggle="tooltip" >
                            Send letter
                        </button>
                    </div>
                </form>
            </div>
        </div>>
    </div>
{else}
    <div class="container">
        <a href="index.php" class="btn btn-default">Return</a>
    </div>
{/if}