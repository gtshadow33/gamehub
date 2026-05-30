FROM php:8.4-cli

WORKDIR /app

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && rm -rf /var/lib/apt/lists/*

# Copiar proyecto
COPY . .

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# Build frontend (Vite + Tailwind)
RUN npm install
RUN npm run build

# Permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

# ⚠️ IMPORTANTE: limpiar cachés sin tocar DB
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize:clear

EXPOSE 8080

# 🚀 PRODUCCIÓN REAL (NO artisan serve)
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t public"]