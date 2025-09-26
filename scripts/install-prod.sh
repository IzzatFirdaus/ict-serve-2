#!/bin/bash
# Installation script untuk production server

# Update sistem
sudo apt update && sudo apt upgrade -y

# Install PHP 8.3 dan extensions
sudo apt install -y php8.3-fpm php8.3-mysql php8.3-xml php8.3-mbstring \
    php8.3-curl php8.3-gd php8.3-intl php8.3-zip php8.3-redis php8.3-bcmath

# Install MySQL 8.0
sudo apt install -y mysql-server-8.0

# Install Redis
sudo apt install -y redis-server

# Install Nginx
sudo apt install -y nginx

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js dan npm
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Setup systemd services
sudo systemctl enable php8.3-fpm mysql redis nginx
sudo systemctl start php8.3-fpm mysql redis nginx
