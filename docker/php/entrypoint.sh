#!/bin/bash

# Asignar permisos adecuados
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Instalar dependencias si no están
if [ ! -d "vendor" ]; then
  echo "Instalando dependencias..."
  composer install
fi

# Generar la APP_KEY si no existe
if [ ! -f ".env" ]; then
  echo "Falta el archivo .env. Abortando..."
  exit 1
fi

if ! grep -q "^APP_KEY=base64" .env; then
  echo "Generando APP_KEY..."
  php artisan key:generate
fi


# Esperar MySQL
/wait-for-mysql.sh

# Migraciones y cachés
echo "Ejecutando migraciones y limpiando cachés..."
php artisan migrate:fresh --seed
php artisan config:clear
php artisan config:cache

# Iniciar el servicio
exec "$@"
