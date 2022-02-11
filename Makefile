.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Welcome to IT Support, have you tried turning it off and on again?"

install:
	@composer install

test:
	./vendor/bin/sail artisan test

migrate:
	./vendor/bin/sail artisan migrate

seed:
	./vendor/bin/sail artisan db:seed

fresh:
	./vendor/bin/sail artisan migrate:fresh --seed

analyse:
	./vendor/bin/phpstan analyse --memory-limit=256m

generate:
	./vendor/bin/sail artisan ide-helper:models --write

deptrac:
    ./vendor/bin/sail php ./vendor/bin/deptrac
