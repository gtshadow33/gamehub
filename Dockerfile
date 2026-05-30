FROM dunglas/frankenphp:php8.4

WORKDIR /app

# dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    && rm -rf /var/lib/apt/lists/*

# copiar proyecto
COPY . .

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# node (si usas Vite)
RUN apt-get update && apt-get install -y nodejs npm
RUN npm install && npm run build

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]