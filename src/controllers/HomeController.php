<?php
namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        $data = [
            'title' => 'Главная - Dota 2 Fan Site',
            'heroes' => \App\Data\Heroes::all(),
            'news' => \App\Data\News::latest(3),
        ];
        $this->render('home/index', $data);
    }

    private function render(string $view, array $data): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layout.php';
    }
}
