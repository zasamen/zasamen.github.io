<div class="container-fluid">
    {if $logged==1}<a href="add_news.php" class="btn btn-warning col-xs-2 col-xs-push-5">Add some news</a>{/if}
</div>
<div class="container">
    <div id="grid" class="row masonry" data-columns>
        {for $news_counter=$news_list_length-1;$news_counter>=0;$news_counter--}
            <div class="item">
                <div class="thumbnail ">
                    <img src="{$news_list.$news_counter.3}" alt="" class="img-responsive">
                    <div class="caption">
                        <h3><a href="news.php?id={$news_list.$news_counter.0}"> {$news_list.$news_counter.1}</a></h3>
                        {$news_list.$news_counter.2|truncate:200:"..."}
                        <!--{substr($news_list.$news_counter.2,0,200)}...-->
                        <a href="news.php?id={$news_list.$news_counter.0}" class="btn btn-info btn-sm">more</i> </a>
                    </div>
                </div>
            </div>
        {/for}
    </div>
</div>