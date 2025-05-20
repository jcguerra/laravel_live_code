FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www

COPY docker/php/entrypoint.sh /entrypoint.sh
COPY docker/php/wait-for-mysql.sh /wait-for-mysql.sh
RUN chmod +x /entrypoint.sh /wait-for-mysql.sh
ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]