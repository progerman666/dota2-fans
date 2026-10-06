<h1>Контакты</h1>
<p>Свяжитесь с нами, заполнив форму ниже.</p>

<?php if (!empty($errors)): ?>
    <div class="alert alert-error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="/contacts/send" class="contact-form">
    <div>
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
    </div>
    <div>
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" rows="5"><?php echo htmlspecialchars($old['message'] ?? ''); ?></textarea>
    </div>
    <button type="submit">Отправить</button>
</form>
