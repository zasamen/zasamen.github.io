<div class="container-fluid">
    {if $my_session.logged==1}<a href="news_add.php" class="btn btn-warning col-xs-2 col-xs-push-5">Add some news</a>{/if}
</div>
<div class="container">
    <div id="grid" class="row masonry" data-columns>
        {foreach $news_list as $news}
            <div class="item">
                <div class="thumbnail ">
                    <a href="news.php?news_id={$news.news_id}">
                        <img src="{$news.image_url}" alt="" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h3><a href="news.php?news_id={$news.news_id}"> {$news.header}</a></h3>
                        {$news.content|truncate:200:"..."}
                        <a href="news.php?news_id={$news.news_id}" class="btn btn-info btn-sm">more </a>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</div>
