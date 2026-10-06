<?php
namespace App\Controllers;

use App\Data\Heroes;

class HeroesController
{
    public function index(): void
    {
        $data = [
            'title' => 'Герои - Dota 2 Fan Site',
            'heroes' => Heroes::all(),
        ];
        $this->render('heroes/index', $data);
    }

    public function show(int $id): void
    {
        $hero = Heroes::find($id);

        if (!$hero) {
            http_response_code(404);
            echo "Герой не найден";
            return;
        }

        $data = [
            'title' => $hero['name'] . ' - Dota 2 Fan Site',
            'hero' => $hero,
        ];
        $this->render('heroes/show', $data);
    }

    private function render(string $view, array $data): void
    {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layout.php';
    }
}
