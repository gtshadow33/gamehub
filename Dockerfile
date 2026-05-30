FROM php:8.4-cli

WORKDIR /app

# dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && rm -rf /var/lib/apt/lists/*

# copiar proyecto
COPY . .

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# VITE BUILD
RUN npm install
RUN npm run build

# permisos Laravel
RUN chmod -R 775 storage bootstrap/cache


EXPOSE 8080

# SOLO MIGRATIONS + SERVER (SIN SEED)
CMD ["sh", "-c", " php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]