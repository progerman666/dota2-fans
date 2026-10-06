<h1>Свиток новостей</h1>
<p>Всего записей: <?php echo count($news); ?></p>

<div class="scroll">
    <div class="scroll-inner">
        <?php foreach ($news as $item): ?>
            <div class="scroll-entry">
                <h3><a href="/news/<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></h3>
                <p class="date"><?php echo $item['date']; ?></p>
                <p class="desc"><?php echo $item['text']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
