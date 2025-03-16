.PHONY: init migrate seed npm install start stop restart

# Sail compiler
SAIL = ./vendor/bin/sail

# initialization
init:
	@echo "🚀 Initializing the Laravel project..."
	@docker-compose up -d --build
	@$(SAIL) artisan key:generate
	@$(SAIL) artisan migrate --seed
	@$(SAIL) artisan storage:link
	@$(SAIL) artisan cache:clear
	@$(SAIL) artisan config:clear
	@$(SAIL) artisan route:clear
	@$(SAIL) composer install
	@$(SAIL) npm install
	@$(SAIL) npm run dev
	@echo "Laravel project setup completed!"


# сcomposer install
composer-install:
	@echo "Installing Composer dependencies..."
	@docker run --rm \
	  -v $(PWD):/app \
	  -w /app \
	  laravelsail/php82-composer:latest \
	  composer install --ignore-platform-reqs
	@echo "Composer dependencies installed!"

# migration start
migrate:
	@echo "Running migrations..."
	@$(SAIL) artisan migrate
	@echo "Migrations applied successfully!"

# seed start
seed:
	@echo "🚀 Seeding database..."
	@$(SAIL) artisan db:seed
	@echo " Database seeded successfully!"

#  NPM install
npm:
	@echo "Installing NPM dependencies..."
	@$(SAIL) npm install
	@echo "NPM dependencies installed!"

# NPM start
 npm-dev:
	@echo "Running npm dev..."
	@$(SAIL) npm run dev
	@echo "NPM dev started!"

# Project start
start:
	@echo "Starting Laravel Sail..."
	@$(SAIL) up -d
	@echo "Sail started!"

# project stop
stop:
	@echo "Stopping Laravel Sail..."
	@$(SAIL) down
	@echo " Sail stopped!"

# project restart
restart:
	@echo "Restarting Laravel Sail..."
	@$(SAIL) down
	@$(SAIL) up -d
	@echo "Sail restarted!"
