<div class="container-fluid myclass">
    <div class="navbar navbar-inverse navbar-static-top ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Open navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/Logo.jpg" class="img img-responsive"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="responsive-menu">
                <ul class="nav navbar-nav">
                    {if $my_session.superuser==1}<li><a href="" style="color=red">DON</a> </li>{/if}
                    <li><a href="image_gallery.php">Image gallery</a> </li>
                    {if $my_session.logged==1}<li><a href="user_page.php" style="">Welcome, {$my_session.name} {$my_session.surname}</a> </li>{/if}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Episodes ></a>
                        <ul class="dropdown-menu">
                            {foreach $episode_ids as $episode_id}
                                <li><a href="episode.php?episode_id={$episode_id.0}">Episode{$episode_id.0}> </a> </li>
                            {/foreach}
                            {if $my_session.logged==1}
                                <li><a href="episode_add.php">Add episodes</a></li>
                            {/if}
                        </ul>
                    </li>
                </ul>
                <form action="login.php{$get}" method="post" class="navbar-form navbar-right">
                    {if !$my_session.logged==1}
                        <div class="form-group form-group-sm " style="">
                            <input name="login" type="text" class="form-control input-sm " placeholder="login" value="">
                        </div>
                        <div class="form-group" style="">
                            <input name="pass" type="password" class="form-control input-sm" placeholder="password" value="">
                        </div>
                        <button type="submit" class="btn btn-primary input-sm " style="" data-toggle="tooltip" title="Войти">
                            Sign in
                        </button>

                        <a href="registration.php" class="btn btn-success input-sm" style="">
                            Sign up
                        </a>
                    {else}
                        <a href="logout_.php" class="btn btn-warning input-sm " style="">
                            Log out
                        </a>
                    {/if}
                </form>
            </div>
        </div>
    </div>
</div>