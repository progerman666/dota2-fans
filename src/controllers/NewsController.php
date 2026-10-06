<?php
namespace App\Controllers;

use App\Data\News;

class NewsController
{
    public function index(): void
    {
        $data = [
            'title' => 'Новости - Dota 2 Fan Site',
            'news' => News::all(),
        ];
        $this->render('news/index', $data);
    }

    public function show(int $id): void
    {
        $item = News::find($id);

        if (!$item) {
            http_response_code(404);
            echo "Новость не найдена";
            return;
        }

        $data = [
            'title' => $item['title'] . ' - Dota 2 Fan Site',
            'item' => $item,
        ];
        $this->render('news/show', $data);
    }

    private function render(string $view, array $data): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layout.php';
    }
}
