install:
	composer install

refresh:
	composer install && composer dump-autoload

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games:
	php ./bin/brain-games