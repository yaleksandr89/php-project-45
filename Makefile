install:
	composer install

refresh:
	composer install && composer dump-autoload

validate:
	composer validate

brain-games:
	php ./bin/brain-games