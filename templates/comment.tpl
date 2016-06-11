<div class="container">
    <table class="table table-bordered table-responsive">
        {foreach $comments as $single_comment}
            <tr>
                {if $my_session.superuser or $my_session.login == $single_comment.1}
                    <td style="width: 2%">
                        <a href="del_comment.php?news_id={$news_id}&comment_id={$single_comment.0}">X</a>
                    </td>
                {/if}
                <td style="width: 10%">
                    <h6 class="centered">{$single_comment.1}</h6>
                </td>
                <td style="width: 68%">
                    <p class="justified">{$single_comment.3}</p>
                </td>
                <td style="width: 20%">
                    <p class="right">{$single_comment.4}</p>
                </td>
            </tr>
        {/foreach}
    </table>
    {if $my_session.logged==1}
        <div class="container-fluid ">
            <form action="comment_add.php?news_id={$news_id}" method="post" style="width: 100%">
                <textarea class="" style="width: 100%" name="comment_text"></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
    {/if}
</div>