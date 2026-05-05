#!/bin/bash
set -e

# Записываем переменные из Render в .env
php artisan config:clear
php artisan migrate --force

apache2-foreground