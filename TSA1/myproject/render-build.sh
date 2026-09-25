#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Generate the .env file dynamically from Render Environment Variables
echo "database.default.hostname = ${DB_HOST}" > .env
echo "database.default.database = ${DB_NAME}" >> .env
echo "database.default.username = ${DB_USER}" >> .env
echo "database.default.password = ${DB_PASSWORD}" >> .env
echo "database.default.port     = ${DB_PORT}" >> .env
echo "database.default.DBDriver = MySQLi" >> .env

# Ensure writable directories have correct permissions
chmod -R 777 writable