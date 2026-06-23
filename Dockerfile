
# Instala php y sus extensiones
# Composer
# Permisos


#Instala php con FPM(Fast CGI process Manager[para comunicarse con Nginx])
FROM php:8.3-fpm

# Dependencias del sistema
#Instala herramientas en el contenedor
#git - zip => composer
#lib* => para extensiones de PHP
#nodejs - npm = para vite
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Extensiones PHP (activa módulos)
#pdo_mysql (conn mysql)
#mbstring (manejo de strings)
#gd (manipulación de imágenes)
#bcmath (calculos matemáticos precisos)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer (gestor de dependencias de php [el npm de PHP])
#Copia composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo (donde pondré el código)
WORKDIR /var/www

# Permisos (Usuario del sistema con el que corren Nginx y PHP)
RUN chown -R www-data:www-data /var/www