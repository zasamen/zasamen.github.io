{if $my_session.superuser==1}
    <div class="container">
        <div class="thumbnail col-xs-12 ">
            <img src="{$those_news.image_url}" alt="" class="img-responsive">
            <form action="news_save.php?news_id={$those_news.news_id}&image_url={$those_news.image_url}" method="post" enctype="multipart/form-data" style="width: 100%">
                <label>Изменить изображение</label>
                <input type="file" name="img" value="Choose" accept="image/*" class="btn btn-lg">
                <label>Заголовок</label>
                <input name="header" type="text" class="form-control input-sm " placeholder="Заголовок" value="{$those_news.header}">
                <label>Контент</label>
                <textarea class="" style="width: 100%" name="content" >{$those_news.content}</textarea>
                <input type="submit" value="Изменить">
            </form>
        </div>
    </div>
{else}
    <div class="container">
        <div class="col-xs-4 col-xs-push-4">
            <a href="index.php" class="btn btn-default">Return</a>
        </div>
    </div>
{/if}