FROM dunglas/frankenphp:php8.4

WORKDIR /app

# system deps
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    && rm -rf /var/lib/apt/lists/*

# copy project
COPY . .

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# vite build
RUN npm install
RUN npm run build

# permissions
RUN chmod -R 775 storage bootstrap/cache

# IMPORTANT: Railway uses PORT
ENV PORT=8080

EXPOSE 8080

# FRANKENPHP RUNNING PROPERLY
CMD ["sh", "-c", "frankenphp run --listen 0.0.0.0:${PORT}"]