<?php
namespace App;

class Router
{
    private array $routes = [
        '/' => ['HomeController', 'index'],
        '/heroes' => ['HeroesController', 'index'],
        '/news' => ['NewsController', 'index'],
        '/contacts' => ['ContactController', 'index'],
        '/contacts/send' => ['ContactController', 'send'],
    ];

    public function dispatch(string $uri): void
    {
        // Проверяем точное совпадение
        if (isset($this->routes[$uri])) {
            [$controllerName, $method] = $this->routes[$uri];
            $controllerClass = 'App\\Controllers\\' . $controllerName;
            $controller = new $controllerClass();
            $controller->$method();
            return;
        }

        // Динамический маршрут вида /heroes/5
        if (preg_match('#^/heroes/(\d+)$#', $uri, $matches)) {
            $controller = new \App\Controllers\HeroesController();
            $controller->show((int)$matches[1]);
            return;
        }

        // Динамический маршрут вида /news/5
        if (preg_match('#^/news/(\d+)$#', $uri, $matches)) {
            $controller = new \App\Controllers\NewsController();
            $controller->show((int)$matches[1]);
            return;
        }

        http_response_code(404);
        echo "404 - Страница не найдена";
    }
}
