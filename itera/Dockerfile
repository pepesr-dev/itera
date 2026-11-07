# Instala php y sus extensiones
# Composer
# Permisos

#Instala php con FPM(Fast CGI process Manager[para comunicarse con Nginx])
FROM php:8.3-fpm

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm

# Extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo interno del contenedor
WORKDIR /var/www/src

# Permisos iniciales
RUN chown -R www-data:www-data /var/www

# 🔥 CORRECCIÓN AQUÍ: Copiamos el contenido de tu carpeta local "itera" hacia el contenedor
COPY ./itera /var/www/src

# Instalar dependencias de PHP saltando restricciones
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# Instalar dependencias de Node y compilar Vue
RUN npm install && npm run build

# Permisos finales sobre las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache

# Expone el puerto dinámico de render
EXPOSE 8080

# Ejecuta migraciones y arranca el servidor
CMD php /var/www/src/artisan migrate --force && php /var/www/src/artisan serve --host=0.0.0.0 --port=$PORT
