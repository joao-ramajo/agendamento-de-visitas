FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip zip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# copia somente composer.json do backend
COPY backend/composer.json backend/composer.lock ./

RUN composer install --no-dev --optimize-autoloader

# agora copia o resto do backend
COPY backend/ .

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
