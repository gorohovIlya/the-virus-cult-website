# Makefile для The Virus Cult Project
# Использование: make <command>

.PHONY: help setup build up down shell test test-unit test-feature test-coverage
.PHONY: migrate fresh seed logs clean core-build core-test docs-build docs-serve

# Переменная для Docker Compose (автоматически переключается на пробел, если дефис не найден)
DOCKER_COMPOSE ?= docker compose

# Colors
GREEN  := \033[0;32m
YELLOW := \033[1;33m
RED    := \033[0;31m
RESET  := \033[0m

## Show help
help:
	@echo ''
	@echo '${GREEN}The Virus Cult Project - Available Commands${RESET}'
	@echo ''
	@grep -E '^##[a-zA-Z_-]+:' $(MAKEFILE_LIST) | \
	sort | awk -F ': ' '{command=$$1; sub(/^##/, "", command); help=$$2; \
	printf "  ${YELLOW}%-20s${RESET} %s\n", command, help}'
	@echo ''

## Setup project (first time)
setup:
	@echo '${GREEN}🚀 Setting up project...${RESET}'
	@cp .env.example .env 2>/dev/null || true
	@cp .env.testing.example .env.testing 2>/dev/null || true
	@make build
	@make core-install
	@$(DOCKER_COMPOSE) exec app composer install
	@$(DOCKER_COMPOSE) exec app php artisan key:generate
	@$(DOCKER_COMPOSE) exec app php artisan migrate
	@echo '${GREEN}✅ Setup complete! Run "make up" to start.${RESET}'

## Build Docker images
build:
	@echo '${GREEN}🐳 Building Docker images...${RESET}'
	@$(DOCKER_COMPOSE) build --no-cache

## Start containers
up:
	@echo '${GREEN}🐳 Starting containers...${RESET}'
	@$(DOCKER_COMPOSE) up -d
	@echo '${GREEN}✅ App: http://localhost${RESET}'
	@echo '${GREEN}✅ Mailpit: http://localhost:8025${RESET}'

## Stop containers
down:
	@echo '${YELLOW}🛑 Stopping containers...${RESET}'
	@$(DOCKER_COMPOSE) down

## Restart containers
restart: down up

## Shell into app container
shell:
	@$(DOCKER_COMPOSE) exec app bash

## Run all tests
test:
	@echo '${GREEN}🧪 Running all tests...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan test

## Run unit tests only
test-unit:
	@echo '${GREEN}🧪 Running unit tests...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan test --testsuite=Unit

## Run feature tests only
test-feature:
	@echo '${GREEN}🧪 Running feature tests...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan test --testsuite=Feature

## Run specific test (make test-filter test=LoginTest)
test-filter:
	@echo '${GREEN}🧪 Running test: $(test)...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan test --filter=$(test)

## Run tests with coverage
test-coverage:
	@echo '${GREEN}📊 Running tests with coverage...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan test --coverage

## Run migrations
migrate:
	@echo '${GREEN}📋 Running migrations...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan migrate

## Fresh migrations
fresh:
	@echo '${YELLOW}🔄 Running fresh migrations...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan migrate:fresh --seed

## Seed database
seed:
	@echo '${GREEN}🌱 Seeding database...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan db:seed

## Show logs
logs:
	@$(DOCKER_COMPOSE) logs -f

## Clean everything (containers, volumes, images)
clean:
	@echo '${RED}⚠️  WARNING: This will remove all containers, volumes, and images!${RESET}'
	@read -p "Are you sure? (y/N) " -n 1 -r; \
	echo ''; \
	if [[ $$REPLY =~ ^[Yy]$$ ]]; then \
		$(DOCKER_COMPOSE) down -v; \
		$(DOCKER_COMPOSE) rm -f; \
		docker system prune -f; \
		echo '${GREEN}✅ Cleanup complete${RESET}'; \
	fi

## Install core package locally
core-install:
	@echo '${GREEN}📦 Installing core package...${RESET}'
	@$(DOCKER_COMPOSE) exec app composer config repositories.core path packages/core
	@$(DOCKER_COMPOSE) exec app composer require the-virus-cult/core:@dev

## Build core package
core-build:
	@echo '${GREEN}🏗️ Building core package...${RESET}'
	@$(DOCKER_COMPOSE) exec core composer install --no-dev --optimize-autoloader

## Test core package
core-test:
	@echo '${GREEN}🧪 Testing core package...${RESET}'
	@$(DOCKER_COMPOSE) exec core phpunit

## Build documentation
docs-build:
	@echo '${GREEN}📚 Building documentation...${RESET}'
	@$(DOCKER_COMPOSE) exec docs mkdocs build

## Serve documentation
docs-serve:
	@echo '${GREEN}📚 Serving documentation at http://localhost:8000${RESET}'
	@$(DOCKER_COMPOSE) exec docs mkdocs serve --dev-addr=0.0.0.0:8000

## Validate architecture (checks dependencies)
validate:
	@echo '${GREEN}🔍 Validating architecture...${RESET}'
	@$(DOCKER_COMPOSE) exec app php artisan architecture:check

## Code style fix
cs-fix:
	@echo '${GREEN}🎨 Fixing code style...${RESET}'
	@$(DOCKER_COMPOSE) exec app ./vendor/bin/pint

## Run static analysis
stan:
	@echo '${GREEN}🔬 Running static analysis...${RESET}'
	@$(DOCKER_COMPOSE) exec app ./vendor/bin/phpstan analyse