    <div class="news"> 
        <h2><?=$news['title']?></h2>
        <p><?=$news['text']?></p>
        <div><strong><?=$news['author']?> (<?=$news['created_at']?>)</strong></div>
        <a href='<?=route('news')?>'>Ко всем новостям</a>
    </div>
