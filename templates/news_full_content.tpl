<div class="container">
    <div class="thumbnail col-xs-12 ">
        <img src="{$those_news.image_url}" alt="" class="img-responsive">
        <div class="caption">
            <h3 class="h3 centered"><a href="#">{$those_news.header}</a></h3>
            <div class="justified">
                {$those_news.content}
            </div>
        </div>
        <div>
            <p class="right">{$those_news.publication_date}</p>
        </div>
    </div>
    {if $my_session.superuser==1}
        <div class="col-xs-12">
            <p style="text-align: right">
                <a href="news_edit.php?news_id={$those_news.news_id}" class="btn btn-success">Редактировать</a>
                <a href="del_news.php?news_id={$those_news.news_id}" class="btn btn-danger">Удалить</a>
            </p>
        </div>
    {/if}
</div>
<div class="container">
    <nav>
        <ul class="pager">
            {if $prev_id>0}<li class="previous"><a href="news.php?news_id={$prev_id}"><<< Prev</a> </li>{/if}
            {if $next_id>0}<li class="next"><a href="news.php?news_id={$next_id}">Next >>></i></a> </li>{/if}
        </ul>
    </nav>
</div>
{$comment_list}