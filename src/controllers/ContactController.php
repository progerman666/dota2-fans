<?php
namespace App\Controllers;

class ContactController
{
    public function index(): void
    {
        $data = [
            'title' => 'Контакты - Dota 2 Fan Site',
        ];
        $this->render('contacts/index', $data);
    }

    public function send(): void
    {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $message = trim($_POST['message'] ?? '');

        $errors = [];
        if ($name === '') {
            $errors[] = 'Укажите имя';
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Укажите корректный email';
        }
        if ($message === '') {
            $errors[] = 'Напишите сообщение';
        }

        if ($errors) {
            $data = [
                'title' => 'Контакты - Dota 2 Fan Site',
                'errors' => $errors,
                'old' => ['name' => $name, 'email' => $email, 'message' => $message],
            ];
            $this->render('contacts/index', $data);
            return;
        }

        $data = [
            'title' => 'Сообщение отправлено - Dota 2 Fan Site',
            'success' => true,
            'name' => $name,
        ];
        $this->render('contacts/success', $data);
    }

    private function render(string $view, array $data): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layout.php';
    }
}
