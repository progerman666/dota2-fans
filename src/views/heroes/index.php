<h1>Герои Dota 2</h1>
<p>Всего героев: <?php echo count($heroes); ?></p>

<form method="get" action="/heroes" class="search-form">
    <input type="text" name="q" placeholder="Поиск героя..." value="<?php echo htmlspecialchars($query ?? ''); ?>">
    <button type="submit">Найти</button>
</form>

<div class="hero-grid">
    <?php foreach ($heroes as $hero): ?>
        <div class="hero-card">
            <a href="/heroes/<?php echo $hero['id']; ?>">
                <img src="/assets/img/<?php echo $hero['image']; ?>" alt="<?php echo $hero['name']; ?>" class="hero-img">
            </a>
            <h3>
                <a href="/heroes/<?php echo $hero['id']; ?>">
                    <?php echo $hero['name']; ?>
                </a>
            </h3>
            <p><strong>Роль:</strong> <?php echo $hero['role']; ?></p>
            <p><strong>Атрибут:</strong> <?php echo $hero['attribute']; ?></p>
            <p class="desc"><?php echo $hero['desc']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
