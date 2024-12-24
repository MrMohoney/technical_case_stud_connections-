FROM php:8.2-fpm

ARG TIMEZONE
ENV TIMEZONE=${TIMEZONE:-Europe/Berlin}

# Instalar dependencias y configuraciones PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev \
    libonig-dev \
    libxslt1-dev \
    acl \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install pdo pdo_mysql zip xsl gd intl opcache exif mbstring dom \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Xdebug
RUN pecl install xdebug

# Instalar Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony \
    && ln -s /usr/local/bin/symfony /usr/bin/sf

# Configurar la zona horaria
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n' "$TIMEZONE" > /usr/local/etc/php/conf.d/tzone.ini

# Limpiar archivos residuales
RUN rm -rf /root/.bashrc

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
