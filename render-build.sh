#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Generate .env file for CodeIgniter from Render Environment Variables
cat <<EOF > .env
CI_ENVIRONMENT = ${CI_ENVIRONMENT:-development}

database.default.hostname = ${database_default_hostname:-${database.default.hostname}}
database.default.database = ${database_default_database:-${database.default.database}}
database.default.username = ${database_default_username:-${database.default.username}}
database.default.password = ${database_default_password:-${database.default.password}}
database.default.port = ${database_default_port:-${database.default.port}}
database.default.DBDriver = ${database_default_DBDriver:-${database.default.DBDriver}}
EOF

echo ".env file successfully created for CodeIgniter deployment."