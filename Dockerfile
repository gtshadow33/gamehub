FROM php:8.4-apache

WORKDIR /var/www/html

# =========================
# DEPENDENCIAS SISTEMA
# =========================
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# =========================
# APACHE CONFIG (LARAVEL)
# =========================
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# =========================
# PROYECTO
# =========================
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# =========================
# FRONTEND BUILD
# =========================
RUN rm -rf node_modules public/build
RUN npm install
RUN npm run build

# =========================
# PERMISOS LARAVEL
# =========================
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]