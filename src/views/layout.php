<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Dota 2 Fan Site'; ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">🎮 Dota 2 Fan Site</div>
        <nav>
            <a href="/">Главная</a>
            <a href="/heroes">Герои</a>
            <a href="/news">Новости</a>
            <a href="/contacts">Контакты</a>
        </nav>
    </header>
    <main>
        <?php require $viewFile; ?>
    </main>
    <footer>
        <p>&copy; 2026 Dota 2 Fan Site. Сделано для обучения PHP.</p>
    </footer>
</body>
</html>
