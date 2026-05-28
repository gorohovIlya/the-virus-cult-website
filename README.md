# О проекте

Веб-сайт для визуальной новеллы "The Virus Cult". Проект предоставляет:

- Регистрацию и авторизацию с верификацией email
- Систему отзывов и рейтингов
- Скачивание игры для Windows, Linux и Mac
- Интеграцию с DonationAlerts для пожертвований

## Используемые практики open source разработки

- Git и GitHub (совместная работа двух людей в одном репозитории, ветки для добавления новых фич, pull-request'ы)
- Использование [Docker](https://github.com/gorohovIlya/the-virus-cult-website/blob/main/compose.yaml) (через PHP Sail)
- [Тестирование](https://github.com/gorohovIlya/the-virus-cult-website/tree/main/tests)
- [Документация](https://github.com/gorohovIlya/the-virus-cult-website/tree/main/documentation)

## Быстрый старт (Makefile)

### Требования

- Docker & Docker Compose
- Make (Linux/Mac) или WSL2 (Windows)

### Установка

```bash
# Клонирование репозитория
git clone https://github.com/your-username/the-virus-cult.git
cd the-virus-cult

# Установка проекта (первый запуск)
make setup

# Запуск приложения
make up
```

<<<<<<< HEAD
После установки сайт будет доступен по адресу: (http://localhost)

### Команды Makefile

| Команда | Функция |
| ------- | ------- |
| make setup | Полная установка проекта |
| make up | Запуск контейнеров |
| make down | Остановка контейнеров |
| make shell | Вход в контейнер |
| make test | Запуск всех тестов |
| make test-unit | Unit тесты |
| make test-feature | Feature тесты |
| make migrate | Миграции БД|
| make logs | Просмотр логов |
| make clean | Полная очистка |
=======
### Все команды Makefile

| Команда | Функция |
| ------- | ------- |
| `make help` | Показать справочную информацию по всем доступным командам |
| `make setup` | Полная первоначальная установка проекта (сборка, запуск, создание `.env` и установка зависимостей) |
| `make build` | Сборка или пересборка Docker-контейнеров |
| `make up` | Запуск всех контейнеров в фоновом режиме |
| `make down` | Остановка и удаление контейнеров |
| `make shell` | Вход в bash-терминал основного контейнера приложения (`laravel.test`) |
| `make test` | Запуск абсолютно всех тестов проекта |
| `make test-unit` | Запуск только Unit (юнит) тестов |
| `make test-feature` | Запуск только Feature (функциональных) тестов |
| `make test-coverage` | Запуск тестов с генерацией отчета о покрытии кода (HTML-отчет) |
| `make migrate` | Запуск миграций базы данных |
| `make fresh` | Пересоздание базы данных (полный сброс и повторный запуск всех миграций) |
| `make seed` | Наполнение базы данных тестовыми данными (сидами) |
| `make logs` | Просмотр логов всех контейнеров в реальном времени |
| `make clean` | Полная очистка: остановка контейнеров, удаление volumes, очистка кэша и Docker-системы |
| `make core-install` | Локальная установка кастомного пакета `core` в контейнер приложения через Composer |
| `make core-build` | Сборка пакета `core` (установка зависимостей без dev-пакетов и оптимизация автозагрузки) |
| `make core-test` | Запуск PHPUnit тестов изолированно для пакета `core` |
| `make docs-build` | Сборка статического сайта документации с помощью утилиты `mkdocs` |
| `make docs-serve` | Запуск локального веб-сервера документации MkDocs на порту `8000` |
| `make validate` | Проверка и валидация архитектурных границ проекта (контроль зависимостей классов) |

После установки сайт будет доступен по адресу: (http://localhost)

### Подтверждение почты

После того как вы заполнили форму регистрации, перейдите по адресу (http://localhost:8025)
Вы увидите окно Mailpit и письмо. Вам нужно будет нажать на письмо и нажать кнопку Verify Email Address
>>>>>>> feature/docs

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
