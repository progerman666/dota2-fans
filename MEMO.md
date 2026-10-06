# ============================================
#  ПОЛНАЯ ПАМЯТКА ПО ПРОЕКТУ
#  Dota 2 Fan Site - учебный проект на PHP
# ============================================

## 1. ОБ УЧЕНИКЕ И ЦЕЛИ
- Ученик изучает веб-разработку на PHP с нуля
- Цель: построить многостраничный сайт фанатов Dota 2
- Ученик = "руки" (выполняет команды), Я = "голова" (даю команды и объясняю)
- Все команды выполняются в терминале VS Code (PowerShell)

## 2. ОКРУЖЕНИЕ (уже настроено)
- PHP 8.5.11 (C:\php\php.exe) - работает, все расширения включены
  (curl, mbstring, openssl, pdo_mysql, mysqli, fileinfo, zip)
- Composer 2.10.3 - установлен
- VS Code - редактор

## 3. ПРОЕКТ
- Путь: C:\php-projects\dota2-fans
- Запуск: php -S localhost:8000 -t public
- Сайт: http://localhost:8000

## 4. АРХИТЕКТУРА (MVC)
- Фронт-контроллер: public/index.php (единая точка входа)
- Роутер: src/Router.php (по URL вызывает нужный контроллер)
- Контроллеры: src/controllers/ (обрабатывают запросы)
- Представления: src/views/ (HTML-шаблоны)
- Данные: src/data/ (Heroes.php, News.php)
- Макет: src/views/layout.php (общий каркас: шапка, меню, подвал)

## 5. СТРУКТУРА ФАЙЛОВ
dota2-fans/
├── composer.json
├── public/index.php          <- фронт-контроллер
├── src/
│   ├── Router.php            <- роутер
│   ├── controllers/
│   │   ├── HomeController.php
│   │   └── HeroesController.php
│   ├── data/
│   │   ├── Heroes.php        <- 5 героев (id, name, role, attribute, desc)
│   │   └── News.php          <- 3 новости (id, title, date, text)
│   └── views/
│       ├── layout.php
│       ├── home/index.php
│       └── heroes/
│           ├── index.php     <- список героев
│           └── show.php      <- страница одного героя
└── assets/css/style.css

## 6. МАРШРУТЫ (Router.php)
- /            -> HomeController@index (главная)
- /heroes      -> HeroesController@index (список героев)
- /heroes/{id} -> HeroesController@show (страница героя)
- /news        -> NewsController@index (новости) - ЕЩЁ НЕ СДЕЛАНО

## 7. СТАТУС РАБОТ
- [x] День 1: структура, роутер, макет, главная страница - РАБОТАЕТ
- [x] День 2 (частично): HeroesController создан, роутер обновлён
- [ ] День 2 (проверить): страницы /heroes и /heroes/2
- [ ] День 3: раздел Новости (NewsController, /news, /news/{id})
- [ ] День 4: поиск, контакты, форма обратной связи
- [ ] День 5: стилизация, адаптивность

## 8. ГЛАВНЫЕ ПРОБЛЕМЫ И РЕШЕНИЯ (ВАЖНО!)
### Проблема 1: BOM-символы
- При создании PHP-файлов через PowerShell добавляются невидимые символы BOM
- Симптом: "Namespace declaration statement has to be the very first statement"
- Решение: после создания файлов выполнять скрипт убирания BOM

### Проблема 2: Сервер блокирует терминал
- php -S занимает терминал
- Решение: открывать 2-й терминал (кнопка +) для команд

### Проблема 3: Файлы не создавались
- Раньше файлы создавались вручную -> ошибки
- Решение: создавать файлы командами Set-Content, а не вручную

## 9. ПОЛЕЗНЫЕ КОМАНДЫ
# Запуск сервера
cd C:\php-projects\dota2-fans
php -S localhost:8000 -t public

# Убрать BOM из всех PHP-файлов
Get-ChildItem -Recurse -Filter *.php | ForEach-Object {
    $content = [System.IO.File]::ReadAllText($_.FullName)
    $content = $content.TrimStart([char]0xFEFF)
    [System.IO.File]::WriteAllText($_.FullName, $content, (New-Object System.Text.UTF8Encoding($false)))
}

# Посмотреть структуру
Get-ChildItem -Recurse -File | Select-Object FullName, Length

## 10. СЛЕДУЮЩИЙ ШАГ (после перезапуска)
1. Проверить /heroes и /heroes/2 (должны работать)
2. Создать NewsController (аналогично HeroesController)
3. Создать представления news/index.php и news/show.php
4. Добавить маршруты /news и /news/{id} в Router.php
5. Обновить меню в layout.php (ссылка на новости уже есть)
6. Убрать BOM, перезапустить сервер, проверить
