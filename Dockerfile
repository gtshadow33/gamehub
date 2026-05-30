FROM dunglas/frankenphp:php8.4

WORKDIR /app

# dependencias sistema
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    && rm -rf /var/lib/apt/lists/*

# copiar proyecto
COPY . .

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# VITE BUILD (IMPORTANTE)
RUN npm install
RUN npm run build

# permisos Laravel (MUY IMPORTANTE en Railway)
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# ❌ NO usar artisan serve con FrankenPHP
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]