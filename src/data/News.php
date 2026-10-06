<?php
namespace App\Data;

class News
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Вышел новый патч 7.38', 'date' => '2026-01-05', 'text' => 'В новом патче изменён баланс героев и добавлены новые предметы.'],
            ['id' => 2, 'title' => 'The International 2026 анонсирован', 'date' => '2026-01-03', 'text' => 'Организаторы объявили даты главного турнира года.'],
            ['id' => 3, 'title' => 'Обновление героев', 'date' => '2025-12-28', 'text' => 'Разработчики представили ребаланс нескольких популярных героев.'],
        ];
    }

    public static function find(int $id): ?array
    {
        foreach (self::all() as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }

    public static function latest(int $limit = 3): array
    {
        return array_slice(self::all(), 0, $limit);
    }
}
