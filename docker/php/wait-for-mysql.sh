#!/bin/bash

# Esperar hasta que MySQL esté listo
until mysqladmin ping -hcit_mysql -ulivecoding -ppassword1234 --silent; do
  echo "⏳ Esperando a que MySQL esté listo..."
  sleep 2
done

echo "✅ MySQL está listo."
