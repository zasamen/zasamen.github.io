{if $my_session.superuser==1}
    <div class="container">
        <div class="thumbnail col-xs-12 ">
            <img src="{$episode.image_url}" alt="" class="img-responsive">
            <form action="episode_save.php?episode_id={$episode.episode_id}&image_url={$episode.image_url}" method="post" enctype="multipart/form-data" style="width: 100%">
                <label>Изменить изображение</label>
                <input type="file" name="img" value="Choose" accept="image/*" class="btn btn-lg">
                <label>Название</label>
                <input name="name" type="text" class="form-control input-sm " placeholder="Заголовок" value="{$episode.name}">
                <label>Описание</label>
                <textarea class="" style="width: 100%" name="description" >{$episode.description}</textarea>
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