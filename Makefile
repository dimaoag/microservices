init: docker-down-clear \
	docker-pull docker-build docker-up \
	api-init frontend-init
up: docker-up
down: docker-down
update: api-composer-update
restart: down up
check: lint analyze
fix: api-lint-fix
lint: api-lint
analyze: api-analyze
validate-schema: api-validate-schema
test: api-test api-fixtures frontend-test
test-unit: api-test-unit
test-functional: api-test-functional api-fixtures
api-check: api-validate-schema api-lint api-analyze api-test
frontend-check: frontend-lint frontend-test

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull --include-deps

docker-build:
	docker-compose build

api-init: api-wait-db

api-composer-install:
	docker-compose run --rm api-php-cli composer install

api-composer-update:
	docker-compose run --rm api-php-cli composer update

api-wait-db:
	docker-compose run --rm api-php-cli wait-for-it api-postgres:5432 -t 30

api-migrations:
	docker-compose run --rm api-php-cli composer app migrations:migrate -- --no-interaction

api-fixtures:
	docker-compose run --rm api-php-cli composer app fixtures:load

api-validate-schema:
	docker-compose run --rm api-php-cli composer app orm:validate-schema

api-lint:
	docker-compose run --rm api-php-cli composer phpcs

api-lint-fix:
	docker-compose run --rm api-php-cli composer phpcbf
	docker-compose run --rm api-php-cli composer psalm -- --alter --issues=MissingReturnType --dry-run

api-analyze:
	docker-compose run --rm api-php-cli composer psalm

api-test:
	docker-compose run --rm api-php-cli composer test

api-test-coverage:
	docker-compose run --rm api-php-cli composer test-coverage

api-test-unit:
	docker-compose run --rm api-php-cli composer test -- --testsuite=unit

api-test-unit-coverage:
	docker-compose run --rm api-php-cli composer test-coverage -- --testsuite=unit

api-test-functional:
	docker-compose run --rm api-php-cli composer test -- --testsuite=functional

api-test-functional-coverage:
	docker-compose run --rm api-php-cli composer test-coverage -- --testsuite=functional

frontend-clear:
	docker run --rm -v ${PWD}/frontend:/app -w /app alpine sh -c 'rm -rf .ready build'

frontend-init: frontend-ready

frontend-test:
	docker-compose run --rm frontend-node-cli yarn test --watchAll=false

frontend-test-watch:
	docker-compose run --rm frontend-node-cli yarn test

frontend-lint:
	docker-compose run --rm frontend-node-cli yarn eslint
	docker-compose run --rm frontend-node-cli yarn stylelint

frontend-eslint-fix:
	docker-compose run --rm frontend-node-cli yarn eslint-fix

frontend-pretty:
	docker-compose run --rm frontend-node-cli yarn prettier

frontend-ready:
	docker run --rm -v ${PWD}/frontend:/app -w /app alpine touch .ready

frontend-yarn-install:
	docker-compose run --rm frontend-node-cli yarn install