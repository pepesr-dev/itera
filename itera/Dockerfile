# Instala php y sus extensiones
# Composer
# Permisos

#Instala php con FPM(Fast CGI process Manager[para comunicarse con Nginx])
FROM php:8.3-fpm

# Dependencias del sistema
# Se añade libzip-dev para que composer pueda descomprimir paquetes sin fallar
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

# Extensiones PHP (activa módulos)
# Se incluye la extensión 'zip' requerida obligatoriamente por Composer
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer (gestor de dependencias de php)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/src

# Permisos iniciales
RUN chown -R www-data:www-data /var/www

# Copiar el código del proyecto antes de compilar
COPY . /var/www/src

# Instalar dependencias omitiendo scripts problemáticos locales de desarrollo
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Instalar dependencias de Node y compilar Vue
RUN npm install && npm run build

# Permisos finales sobre las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache

# Expone el puerto dinámico de render
EXPOSE 8080

# Ejecuta migraciones y arranca el servidor
CMD php /var/www/src/artisan migrate --force && php /var/www/src/artisan serve --host=0.0.0.0 --port=$PORT
