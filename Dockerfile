FROM dunglas/frankenphp:php8.2

# PHP extensions required by Laravel and your packages
RUN install-php-extensions \
    gd \
    pdo_mysql \
    mbstring \
    xml \
    curl \
    zip \
    intl \
    bcmath

# Install Node.js 22 + npm
RUN apt-get update \
    && apt-get install -y ca-certificates curl \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && node --version \
    && npm --version \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# PHP dependencies
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# Application
COPY . .

# Frontend
RUN npm ci
RUN npm run build

# Laravel Caddy configuration
COPY Caddyfile /etc/caddy/Caddyfile

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
