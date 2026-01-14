#!/bin/bash

# KUS-CMS Setup Script
# This script checks if the database exists, creates it if needed, and imports the SQL file

DB_NAME="kusjanko_dashboard"
DB_USER="kusjanko_admin"
DB_PASS="kusj4nkoll4r"
SQL_FILE="./databasetools/kusjanko_dashboard_2_10_2025.sql"

echo "=== KUS-CMS Database Setup ==="
echo ""

# Check if MySQL is running
if ! pgrep -x "mysqld" > /dev/null; then
    echo "❌ MySQL is not running. Starting MySQL..."
    brew services start mysql
    sleep 3
fi

echo "📊 Checking if database '$DB_NAME' exists..."

# Check if database exists
DB_EXISTS=$(mysql -u root -e "SHOW DATABASES LIKE '$DB_NAME';" | grep "$DB_NAME" > /dev/null; echo "$?")

if [ $DB_EXISTS -eq 0 ]; then
    echo "✅ Database '$DB_NAME' already exists."
    read -p "Do you want to drop and recreate it? (y/N): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        echo "🗑️  Dropping existing database..."
        mysql -u root -e "DROP DATABASE $DB_NAME;"
    else
        echo "ℹ️  Keeping existing database. Exiting..."
        exit 0
    fi
fi

echo "🔨 Creating database '$DB_NAME'..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

echo "👤 Creating/updating user '$DB_USER'..."
mysql -u root -e "CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
mysql -u root -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"

echo "📥 Importing SQL file..."
if [ -f "$SQL_FILE" ]; then
    mysql -u root $DB_NAME < $SQL_FILE
    echo "✅ Database imported successfully!"
else
    echo "❌ SQL file not found: $SQL_FILE"
    exit 1
fi

echo ""
echo "=== Setup Complete! ==="
echo ""
echo "Database: $DB_NAME"
echo "Username: $DB_USER"
echo "Password: $DB_PASS"
echo ""
echo "To start the development server, run:"
echo "  ./start-server.sh"
