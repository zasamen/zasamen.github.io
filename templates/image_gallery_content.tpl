<div class="container-fluid">
    <div id="carousel" class="carousel slide hidden-xs hidden-sm" style="{$carousel_display};">
        <!-- Индикаторы слайдов-->
        <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to="0"></li>
            {for $images_counter=1;$images_counter<$carousel_count;$images_counter++}
                <li data-target="#carousel" data-slide-to="{$images_counter}"></li>
            {/for}
        </ol>
        <!-- слайды-->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{$images.0.2}" alt="" class="img-responsive">
                <div class="carousel-caption">
                    <h2>{$images.0.1}</h2>
                </div>
            </div>
            {for $images_counter=1;$images_counter<$carousel_count;$images_counter++}
                <div class="item">
                    <img src="{$images.$images_counter.2}" alt="">
                    <div class="carousel-caption">
                        <h2>{$images.$images_counter.1}</h2>
                    </div>
                </div>
            {/for}
        </div>
        <!-- Стрелки переключения слайдов-->
        <a href="#carousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-shevron-left"></span>
        </a>
        <a href="#carousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-shevron-right"></span>
        </a>
    </div>
</div>
{if $logged==1}
    <div class="container-fluid">
        <div class="col-xs-12 centered" style="margin: auto;border: 1px;">
            <form action="image_save.php" method="post" enctype="multipart/form-data" style="width: 100%">
                <h4>Load new image</h4>
                <input type="file" name="img" value="Choose" accept="image/*" class="btn btn-lg">
                <label>Description:</label>
                <input type="text" name="description" class="col-xs-12 " maxlength="100">
                <input type="submit" name="submit" value="Add" class="btn btn-sm col-xs-12">
            </form>
        </div>
    </div>
{/if}
<div class="container">
    <div id="grid" class="row masonry" data-columns style="{$images_display}">
        {for $images_counter=$carousel_count;$images_counter<$images_count;$images_counter++}
            <div class="item">
                <div class="thumbnail ">
                    <img src="{$images.$images_counter.2}" alt="" class="img-responsive">
                    <div class="caption">
                        <h3>{$images.$images_counter.1}</h3>
                        {if $superuser}<a href="del_image.php?id={$images.$images_counter.0}"><i class="fa fa-close"></i> </a>{/if}
                    </div>
                </div>
            </div>
        {/for}
    </div>
</div>