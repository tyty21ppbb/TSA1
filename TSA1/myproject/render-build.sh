#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Dynamically generate the .env file on Render using server environment variables
echo "CI_ENVIRONMENT = production" > .env
echo "app.baseURL = 'https://task-for-today.onrender.com/'" >> .env
echo "database.default.hostname = ${DB_HOST}" >> .env
echo "database.default.database = ${DB_NAME}" >> .env
echo "database.default.username = ${DB_USER}" >> .env
echo "database.default.password = ${DB_PASSWORD}" >> .env
echo "database.default.port     = ${DB_PORT}" >> .env
echo "database.default.DBDriver = MySQLi" >> .env

# Ensure writable directories have correct permissions
chmod -R 777 writable