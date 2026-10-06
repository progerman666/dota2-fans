<h1><?php echo $hero['name']; ?></h1>

<div class="hero-detail">
    <img src="/assets/img/<?php echo $hero['image']; ?>" alt="<?php echo $hero['name']; ?>">
    <p><strong>Роль:</strong> <?php echo $hero['role']; ?></p>
    <p><strong>Атрибут:</strong> <?php echo $hero['attribute']; ?></p>
    <p><strong>Описание:</strong> <?php echo $hero['desc']; ?></p>
</div>

<p><a href="/heroes">&larr; Назад к списку героев</a></p>
