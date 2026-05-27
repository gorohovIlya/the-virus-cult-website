# Makefile для The Virus Cult Project
# Команды: make help, make setup, make start, make stop, etc.

.PHONY: help setup start stop restart shell test migrate fresh seed logs ps clean

# Colors for output
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
RESET  := $(shell tput -Txterm sgr0)

TARGET_MAX_CHAR_NUM := 20

## Показать помощь
help:
	@echo ''
	@echo '${GREEN}Available commands for The Virus Cult Project:${RESET}'
	@echo ''
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")-1); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} ${WHITE}%s${RESET}\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)
	@echo ''

## 🚀 Установка проекта (первый запуск)
setup: check-dependencies
	@echo '${GREEN}🚀 Starting setup...${RESET}'
	@echo '${YELLOW}📋 Copying environment files...${RESET}'
	@cp .env.example .env || true
	@cp .env.testing.example .env.testing || true
	@echo '${YELLOW}🐳 Starting Docker containers...${RESET}'
	@docker-compose up -d --build
	@echo '${YELLOW}⏳ Waiting for MySQL to be ready...${RESET}'
	@sleep 10
	@echo '${YELLOW}📦 Installing Composer dependencies...${RESET}'
	@docker-compose exec app composer install
	@echo '${YELLOW}🔑 Generating application key...${RESET}'
	@docker-compose exec app php artisan key:generate
	@echo '${YELLOW}🔑 Generating testing key...${RESET}'
	@docker-compose exec app php artisan key:generate --env=testing
	@echo '${YELLOW}📊 Running migrations...${RESET}'
	@docker-compose exec app php artisan migrate
	@echo '${YELLOW}📊 Running testing migrations...${RESET}'
	@docker-compose exec app php artisan migrate --env=testing
	@echo '${YELLOW}🌱 Seeding database...${RESET}'
	@docker-compose exec app php artisan db:seed
	@echo '${YELLOW}🔗 Creating storage link...${RESET}'
	@docker-compose exec app php artisan storage:link
	@echo '${GREEN}✅ Setup complete! Run "make start" to launch the application.${RESET}'

## 🐳 Запустить контейнеры
start:
	@echo '${GREEN}🐳 Starting Docker containers...${RESET}'
	@docker-compose up -d
	@echo '${GREEN}✅ Application is running at http://localhost${RESET}'
	@echo '${GREEN}   Mailpit UI: http://localhost:8025${RESET}'

## 🛑 Остановить контейнеры
stop:
	@echo '${YELLOW}🛑 Stopping Docker containers...${RESET}'
	@docker-compose down

## 🔄 Перезапустить контейнеры
restart: stop start

## 🐚 Войти в контейнер приложения
shell:
	@docker-compose exec app bash

## 🧪 Запустить тесты
test:
	@echo '${GREEN}🧪 Running tests...${RESET}'
	@docker-compose exec app php artisan test

## 🧪 Запустить unit тесты
test-unit:
	@echo '${GREEN}🧪 Running unit tests...${RESET}'
	@docker-compose exec app php artisan test --testsuite=Unit

## 🧪 Запустить feature тесты
test-feature:
	@echo '${GREEN}🧪 Running feature tests...${RESET}'
	@docker-compose exec app php artisan test --testsuite=Feature

## 🧪 Запустить конкретный тест (make test-filter test=LoginTest)
test-filter:
	@echo '${GREEN}🧪 Running test: $(test)...${RESET}'
	@docker-compose exec app php artisan test --filter=$(test)

## 📊 Запустить тесты с покрытием
test-coverage:
	@echo '${GREEN}📊 Running tests with coverage...${RESET}'
	@docker-compose exec app php artisan test --coverage

## 📦 Установить composer зависимости
composer-install:
	@echo '${GREEN}📦 Installing Composer dependencies...${RESET}'
	@docker-compose exec app composer install

## 📦 Обновить composer зависимости
composer-update:
	@echo '${GREEN}📦 Updating Composer dependencies...${RESET}'
	@docker-compose exec app composer update

## 📋 Выполнить миграции
migrate:
	@echo '${GREEN}📋 Running migrations...${RESET}'
	@docker-compose exec app php artisan migrate

## 🔄 Откатить миграции
migrate-rollback:
	@echo '${YELLOW}🔄 Rolling back migrations...${RESET}'
	@docker-compose exec app php artisan migrate:rollback

## 🔄 Обновить миграции (fresh)
migrate-fresh:
	@echo '${YELLOW}🔄 Fresh migrations...${RESET}'
	@docker-compose exec app php artisan migrate:fresh

## 🌱 Заполнить базу данных тестовыми данными
seed:
	@echo '${GREEN}🌱 Seeding database...${RESET}'
	@docker-compose exec app php artisan db:seed

## 🗑️ Очистить кэш
cache-clear:
	@echo '${GREEN}🗑️ Clearing cache...${RESET}'
	@docker-compose exec app php artisan cache:clear
	@docker-compose exec app php artisan config:clear
	@docker-compose exec app php artisan route:clear
	@docker-compose exec app php artisan view:clear

## 🔗 Показать логи контейнеров
logs:
	@docker-compose logs -f

## 🔗 Показать логи приложения
logs-app:
	@docker-compose exec app tail -f storage/logs/laravel.log

## 🐚 Войти в MySQL контейнер
mysql:
	@docker-compose exec mysql mysql -u sail -ppassword

## 💾 Создать дамп базы данных
db-dump:
	@echo '${GREEN}💾 Creating database dump...${RESET}'
	@docker-compose exec mysql mysqldump -u sail -ppassword laravel > dump_$$(date +%Y%m%d_%H%M%S).sql

## 🧹 Полная очистка (удалить контейнеры, volumes, images)
clean:
	@echo '${RED}⚠️  WARNING: This will remove all containers, volumes, and images!${RESET}'
	@read -p "Are you sure? (y/N) " -n 1 -r; \
	echo ''; \
	if [[ $$REPLY =~ ^[Yy]$$ ]]; then \
		echo '${YELLOW}🧹 Cleaning up...${RESET}'; \
		docker-compose down -v; \
		docker-compose rm -f; \
		echo '${GREEN}✅ Cleanup complete${RESET}'; \
	else \
		echo '${YELLOW}Cancelled${RESET}'; \
	fi

## 🏗️ Пересобрать контейнеры
rebuild:
	@echo '${YELLOW}🏗️ Rebuilding containers...${RESET}'
	@docker-compose up -d --build --force-recreate

## 📊 Статус контейнеров
ps:
	@docker-compose ps

## ✅ Проверка зависимостей
check-dependencies:
	@command -v docker >/dev/null 2>&1 || { echo >&2 "${RED}❌ Docker is required but not installed.${RESET}"; exit 1; }
	@command -v docker-compose >/dev/null 2>&1 || { echo >&2 "${RED}❌ Docker Compose is required but not installed.${RESET}"; exit 1; }
	@echo '${GREEN}✅ Docker and Docker Compose are installed${RESET}'

## 🎨 Установка npm зависимостей (если есть фронтенд)
npm-install:
	@echo '${GREEN}📦 Installing npm dependencies...${RESET}'
	@docker-compose exec app npm install

## 🎨 Собрать фронтенд assets
npm-build:
	@echo '${GREEN}🎨 Building assets...${RESET}'
	@docker-compose exec app npm run build

## 🎨 Запустить dev сервер для фронтенда
npm-dev:
	@echo '${GREEN}🎨 Starting dev server...${RESET}'
	@docker-compose exec app npm run dev