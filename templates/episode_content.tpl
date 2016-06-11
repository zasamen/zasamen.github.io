<div class="container">
    <div class="row">
        <div class="col-sm-3 col-xs-8 col-xs-offset-2 col-sm-offset-0">
            <img src="{$episode.image_url}" alt="" class="img-rounded img-responsive">
        </div>
        <div class="col-sm-9 col-xs-12">
            <h3>Episode {$episode.number}</h3>
            <h1 class="centered"> {$episode.name}</h1>
            <p align="justify">
                {$episode.description}
            </p>
        </div>
    </div>
    {if $my_session.superuser==1 }
        <div class="col-xs-12">
            <p style="text-align: right">
                <a href="episode_edit.php?episode_id={$episode.episode_id}" class="btn btn-success">Редактировать</a>
                <a href="del_episode.php?episode_id={$episode.episode_id}" class="btn btn-danger">Удалить</a>
            </p>
        </div>
    {/if}
</div>
<div class="container">
    <nav>
        <ul class="pager">
            {if $prev_id>0}<li class="previous"><a href="episode.php?episode_id={$prev_id}"><<< Prev</a> </li>{/if}
            {if $next_id>0}<li class="next "><a href="episode.php?episode_id={$next_id}">Next >>></i></a> </li>{/if}
        </ul>
    </nav>
</div>