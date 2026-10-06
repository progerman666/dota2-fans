<h1>Добро пожаловать на сайт фанатов Dota 2!</h1>
<p>Здесь ты найдёшь информацию о героях и свежие новости из мира Dota 2.</p>

<h2>🔥 Популярные герои</h2>
<div class="hero-grid">
    <?php foreach ($heroes as $hero): ?>
        <div class="hero-card">
            <h3><?php echo $hero['name']; ?></h3>
            <p><strong>Роль:</strong> <?php echo $hero['role']; ?></p>
            <p><strong>Атрибут:</strong> <?php echo $hero['attribute']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<h2>📰 Последние новости</h2>
<ul class="news-list">
    <?php foreach ($news as $item): ?>
        <li>
            <strong><?php echo $item['title']; ?></strong>
            <span class="date">(<?php echo $item['date']; ?>)</span>
        </li>
    <?php endforeach; ?>
</ul>
