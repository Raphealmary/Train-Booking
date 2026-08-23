FROM dunglas/frankenphp:php8.2

RUN install-php-extensions \
    gd \
    pdo_mysql \
    mbstring \
    xml \
    curl \
    zip \
    intl \
    bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

COPY . .

RUN php artisan storage:link || true

RUN npm install && npm run build

COPY Caddyfile /etc/caddy/Caddyfile

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
