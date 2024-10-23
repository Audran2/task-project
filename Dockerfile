# Utiliser l'image webdevops/php-nginx
FROM webdevops/php-nginx:8.2

# Définir le répertoire de travail
WORKDIR /usr/share/nginx/html

# Installer les dépendances système nécessaires pour PDO
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copier les fichiers de l'application
COPY . .

COPY .env.example .env

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances de Laravel
RUN composer install --no-interaction --optimize-autoloader

# Assurer que les permissions sont correctement définies
RUN chown -R www-data:www-data /usr/share/nginx/html

# Exposer le port
EXPOSE 80

# Démarrer le service Nginx
CMD ["supervisord", "-n"]
