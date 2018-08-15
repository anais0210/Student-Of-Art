
# Student-Of-Art

1. Installation
	```
	git clone https://github.com/anais0210/Student-Of-Art
	cp .env.dist .env
	adapter les variables d'environnement a vos besoins
	composer install
	php bin/console do:da:cr
	php bin/console do:sc:up --force
	yarn install
	yarn run encore dev --watch
	```

2. Qualité

	```
	vendor/bin/phpcs --standard=vendor/leaphub/phpcs-symfony2-standard/leaphub/phpcs/Symfony2/ --extensions=php src/	
	```

