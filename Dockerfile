FROM php:8.4-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && rm -rf /var/lib/apt/lists/*

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]