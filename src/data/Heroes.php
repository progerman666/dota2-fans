<?php
namespace App\Data;

class Heroes
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'name' => 'Anti-Mage', 'image' => 'anti-mage.png', 'role' => 'Керри', 'attribute' => 'Ловкость', 'desc' => 'Маг-отступник, уничтожающий магию.'],
            ['id' => 2, 'name' => 'Pudge', 'image' => 'pudge.png', 'role' => 'Танк', 'attribute' => 'Сила', 'desc' => 'Мясник, ловящий врагов крюком.'],
            ['id' => 3, 'name' => 'Invoker', 'image' => 'invoker.png', 'role' => 'Мидер', 'attribute' => 'Интеллект', 'desc' => 'Волшебник с 10 заклинаниями.'],
            ['id' => 4, 'name' => 'Crystal Maiden', 'image' => 'crystal-maiden.png', 'role' => 'Саппорт', 'attribute' => 'Интеллект', 'desc' => 'Ледяная дева, замедляющая врагов.'],
            ['id' => 5, 'name' => 'Phantom Assassin', 'image' => 'phantom-assassin.png', 'role' => 'Керри', 'attribute' => 'Ловкость', 'desc' => 'Убийца с критическими ударами.'],
        ];
    }

    public static function find(int $id): ?array
    {
        foreach (self::all() as $hero) {
            if ($hero['id'] === $id) {
                return $hero;
            }
        }
        return null;
    }

    public static function search(string $query): array
    {
        $query = mb_strtolower(trim($query));
        if ($query === '') {
            return self::all();
        }
        return array_filter(self::all(), function ($hero) use ($query) {
            return mb_strpos(mb_strtolower($hero['name']), $query) !== false
                || mb_strpos(mb_strtolower($hero['role']), $query) !== false
                || mb_strpos(mb_strtolower($hero['attribute']), $query) !== false;
        });
    }
}
