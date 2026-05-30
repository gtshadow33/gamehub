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

# 🔥 FORZAR LIMPIEZA TOTAL FRONTEND
RUN rm -rf node_modules public/build

RUN npm install
RUN npm run build

# 🔥 ASEGURAR QUE EXISTE
RUN ls -la public/build

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]