{if $my_session.logged==1}
    <div class="container">
        <div class="thumbnail col-xs-12 ">
            <form action="episode_add_.php" method="post" enctype="multipart/form-data" style="width: 100%">
                <label>Название</label>
                <input name="name" type="text" class="form-control input-sm " placeholder="Название" value="">
                <label>Описание</label>
                <textarea class="" style="width: 100%" name="description"></textarea>
                <label>Добавить изображение</label>
                <input type="file" name="img" value="Choose" accept="image/*" class="btn btn-lg">
                <input type="submit" value="Добавить">
            </form>
        </div>
    </div>
{else}
    <div class="container">
        <a href="index.php" class="btn btn-default">Return</a>
    </div>
{/if}