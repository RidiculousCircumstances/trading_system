DC_RUN_ARGS = --rm --user "$(shell id -u):$(shell id -g)"

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install all app dependencies
	docker-compose run $(DC_RUN_ARGS) --no-deps composer composer install --ansi --prefer-dist

up: ## Create and start containers
	APP_UID=$(shell id -u) APP_GID=$(shell id -g) docker-compose up --build web main_queue cron

down: ## Stop containers
	docker-compose down

restart: down up ## Restart all containers

clean: ## Make clean
	-docker-compose run $(DC_RUN_ARGS) --no-deps base_app sh -c "\
		php ./artisan config:clear; php ./artisan route:clear; php ./artisan view:clear; php ./artisan cache:clear file"
	docker-compose down -v # Stops containers and remove named volumes declared in the `volumes` section

web:
	APP_UID=$(shell id -u) APP_GID=$(shell id -g) docker-compose exec web sh

serveo:
	ssh -R socialite-test-1337:80:127.0.0.1:8001 serveo.net


