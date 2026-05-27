# Документация кода (Laravel)

## Общее описание

Данный набор файлов представляет часть функциональности веб-приложения на Laravel для:
- управления пользователями (регистрация, аутентификация);
- написания отзывов с оценками;
- скачивания игровых файлов.

---

## Модели

### Класс `Review` (модель отзыва)

**Пространство имён:** `App\Models`

**Назначение:** хранит отзывы пользователей с оценкой и комментарием.

| Поле | Тип | Описание |
|------|-----|----------|
| `user_id` | integer | ID пользователя, оставившего отзыв |
| `rating` | integer | Оценка от 1 до 5 |
| `comment` | string | Текст отзыва (необязательно) |

#### Методы

| Метод | Возвращает | Описание |
|-------|-------------|----------|
| `user()` | `\Illuminate\Database\Eloquent\Relations\BelongsTo` | Связь "отзыв принадлежит пользователю" |
| `getStarsAttribute()` | string | Аксессор, возвращающий строку из эмодзи в виде звезд, повторённых `rating` раз |

---

### Класс `User` (модель пользователя)

**Пространство имён:** `App\Models`

**Назначение:** расширяет стандартного `Authenticatable` пользователя, добавляя связь с отзывами и среднюю оценку.

| Атрибут (fillable) | Тип | Описание |
|--------------------|-----|----------|
| `name` | string | Имя пользователя |
| `email` | string | Email (уникальный) |
| `password` | string | Хешированный пароль |
| `newsletter` | boolean | Подписка на рассылку |

#### Методы

| Метод | Возвращает | Описание |
|-------|-------------|----------|
| `reviews()` | `HasMany` | Связь "пользователь имеет много отзывов" |
| `getAverageRatingAttribute()` | float (0..5) | Аксессор, возвращающий среднюю оценку пользователя (на основе всех его отзывов) или 0, если отзывов нет |

---

## Контроллеры

### Класс `DownloadController`

**Пространство имён:** `App\Http\Controllers`

**Назначение:** отдаёт файлы игры для разных платформ.

#### Методы

---

##### `downloadGame(string $platform)`

**Описание:**  
Загружает файл игры в зависимости от указанной платформы.

**Параметры:**
- `$platform` (string) – платформа: `windows`, `linux`, `mac`

**Возвращает:** `\Symfony\Component\HttpFoundation\BinaryFileResponse` (ответ с файлом)

**Исключения:**
- `abort(404, 'Platform not found.')` – если платформа не поддерживается
- `abort(404, "File not found...")` – если файл отсутствует в `storage/app/downloads/`

**Особенности:**
- Имя скачиваемого файла преобразуется в `The_Virus_Cult_{$platform}.zip`
- Файлы ищутся в директории: `storage_path('app/downloads/')`

---

### Класс `ReviewController`

**Пространство имён:** `App\Http\Controllers`

**Назначение:** вывод формы отзывов и сохранение нового отзыва.

#### Методы

---

##### `index()`

**Описание:**  
Отображает страницу с отзывами. Показывает последние 10 отзывов (с подгрузкой пользователя). Если пользователь авторизован, дополнительно выбирает его собственный отзыв.

**Возвращает:** `\Illuminate\View\View` (шаблон `feedback`)

**Логика:**
- `$userReview` – отзыв текущего пользователя (или `null`)
- `$reviews` – последние 10 отзывов со связью `user`

---

##### `store(Request $request)`

**Описание:**  
Сохраняет новый отзыв от авторизованного пользователя.

**Параметры:** `$request` с полями `rating` (обяз., 1-5) и `comment` (макс. 2000 симв.)

**Возвращает:** `\Illuminate\Http\RedirectResponse`

**Валидация:**
- `rating` – required, integer, min:1, max:5
- `comment` – nullable, string, max:2000

**Ограничения:**
- Пользователь должен быть авторизован (иначе → `login`)
- Пользователь может оставить только **один** отзыв (проверка `exists()`)

**Действия при успехе:** создаёт запись в `reviews` → редирект на `feedback` с сообщением `success`

---

### Класс `LoginController` (пространство `App\Http\Controllers\Auth`)

**Назначение:** управление аутентификацией пользователя.

#### Методы

##### `create()`

**Описание:**  
Показывает форму авторизации.

**Возвращает:** `\Illuminate\View\View` (шаблон `auth.authorization`)

##### `store(Request $request)`

**Описание:**  
Выполняет вход пользователя.

**Параметры:** 
- `email` (string, required)
- `password` (string, required)
- `remember` (boolean, из `$request->boolean('remember')`)

**Возвращает:** `\Illuminate\Http\RedirectResponse`

**Действия:**
- Валидация полей
- Попытка аутентификации с учётом `remember`
- Регенерация сессии
- Редирект на `intended('/')`

**Исключение:** `ValidationException` – при неверных учётных данных

##### `destroy(Request $request)`

**Описание:**  
Выполняет выход пользователя.

**Действия:**
- `Auth::logout()`
- Инвалидация сессии
- Регенерация CSRF-токена
- Редирект на `/`

---

### Класс `RegisterController` (пространство `App\Http\Controllers\Auth`)

**Назначение:** регистрация новых пользователей.

#### Методы

##### `create()`

**Описание:**  
Показывает форму регистрации.

**Возвращает:** `\Illuminate\View\View` (шаблон `auth.registration`)

##### `store(Request $request)`

**Описание:**  
Регистрирует нового пользователя и автоматически входит в систему.

**Параметры:**
- `name` – required, string, max:255
- `email` – required, email, unique:users
- `password` – required, confirmed, min:8
- `newsletter` – nullable, boolean

**Возвращает:** `\Illuminate\Http\RedirectResponse`

**Действия:**
- Валидация входных данных
- Создание пользователя через `User::create()`
- Генерация события `Registered`
- Автоматический вход (`Auth::login`)
- Редирект на `/register/success`

---

## Примечания по безопасности и архитектуре

- В `DownloadController` отсутствует проверка прав доступа – любой пользователь может скачать файлы.
- В `ReviewController` не используется политика (Policy) для проверки права на создание отзыва.
- Модель `User` использует PHP 8 атрибуты (`#[Fillable]`, `#[Hidden]`) вместо массивов `$fillable` / `$hidden`.
- Валидация и сообщения об ошибках локализованы (используется `__('auth.failed')`).
- Пользователь может оставить только **один** отзыв (система не поддерживает редактирование или удаление).

---

## Зависимости и связи между классами

- `User` имеет связь `hasMany` с `Review`
- `Review` имеет связь `belongsTo` с `User`
- `ReviewController` использует модель `Review` и фасад `Auth`
- `LoginController` и `RegisterController` используют фасад `Auth`
- `RegisterController` также использует событие `Registered` (для верификации email)

---

## Примеры маршрутов (предполагаемые)

| HTTP метод | URI | Контроллер | Метод |
|------------|-----|------------|-------|
| GET | `/feedback` | `ReviewController` | `index` |
| POST | `/feedback` | `ReviewController` | `store` |
| GET | `/login` | `LoginController` | `create` |
| POST | `/login` | `LoginController` | `store` |
| POST | `/logout` | `LoginController` | `destroy` |
| GET | `/register` | `RegisterController` | `create` |
| POST | `/register` | `RegisterController` | `store` |
| GET | `/download/{platform}` | `DownloadController` | `downloadGame` |
