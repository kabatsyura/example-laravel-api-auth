prepare-test:
		php artisan migrate --env testing
		SEEDS_IMPORT=1 php artisan db:seed --env testing

test:
		APP_ENV=testing php artisan test