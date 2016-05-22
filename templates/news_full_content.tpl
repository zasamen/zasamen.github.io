<div class="container">
    <div class="thumbnail col-xs-12 ">
        <img src="{$news.image_url}" alt="" class="img-responsive">
        <div class="caption">
            <h3 class="h3 centered"><a href="#">{$news.header}</a></h3>
            <div class="justified">
                {$news.content}
            </div>
        </div>
        <div>
            <p class="right">{$news.publication_date}</p>
        </div>
    </div>
    <nav>
        <ul class="pager">
            {if $prev_id>0}<li class="previous {$prev}"><a href="news.php?id={$prev_id}"><<< Prev</a> </li>{/if}
            {if $next_id>0}<li class="next {$next}"><a href="news.php?id={$next_id}">Next >>></i></a> </li>{/if}
        </ul>
    </nav>
</div>
{$comment_list}