FROM dunglas/frankenphp:php8.2

# Install PHP extensions
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

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Install PHP dependencies first
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# Copy application
COPY . .

# Install frontend dependencies
RUN npm ci

# Build Vite
RUN npm run build

# Create Laravel storage link if possible
RUN php artisan storage:link || true

# Permissions
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

# Railway provides PORT at runtime
EXPOSE 8080

# Start FrankenPHP
CMD ["sh", "-c", "frankenphp run --config /etc/caddy/Caddyfile"]
