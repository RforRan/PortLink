FROM php:8.2-fpm

# ── System dependencies ───────────────────────────────────────
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# ── PHP extensions ────────────────────────────────────────────
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# ── Composer ──────────────────────────────────────────────────
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ── Working directory ─────────────────────────────────────────
WORKDIR /var/www

# ── Permissions ───────────────────────────────────────────────
RUN chown -R www-data:www-data /var/www

EXPOSE 9000
CMD ["php-fpm"]
