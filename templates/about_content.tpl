<div class="container">
    <div class="row">
        <div class="col-sm-3 col-xs-8 col-xs-offset-2 col-md-offset-0">
            <img src="img/about/Poster.jpg" alt="" class="img-rounded img-responsive">
        </div>
        <div class="col-sm-9 col-xs-12">
            {foreach $about as $paragraphs}
            <h2 class="centered">{$paragraphs.header}</h2>
            <p>{$paragraphs.content}</p>
            {/foreach}
        </div>
    </div>
</div>
