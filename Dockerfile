FROM php:8.2-cli

WORKDIR /app

# dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    && rm -rf /var/lib/apt/lists/*

# copiar proyecto
COPY . .

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# Vite build
RUN npm install
RUN npm run build

# permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# RAILWAY ENTRYPOINT
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]