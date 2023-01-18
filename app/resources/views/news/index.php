<a href="<?=route('category')?>">Выбрать категорию новостей</a>
<?php foreach($news as $n): ?>
    <div class="news"> 
        <h2><?=$n['title']?></h2>
        <!-- категория отражена для проверки, что она рандомится и есть -->
        <sup>категория <?=$n['category_id']?></sup>
        <p><?=$n['description']?></p>
        <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
        <a href='<?=route('news.show', ['id' => $n['id']])?>'>Подробнее</a>
    </div>
<?php endforeach; ?>


