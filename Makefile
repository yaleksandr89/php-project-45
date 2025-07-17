install:
	composer install

refresh:
	composer install && composer dump-autoload

brain-games:
	php bin/brain-games.php