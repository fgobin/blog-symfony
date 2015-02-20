#!/usr/bin/env bash

#installation of web server
echo "Installing nginx"
apt-get -y install nginx > /dev/null

#installation of php5
echo "Installing php5-fpm"
apt-get -y install php5-fpm > /dev/null

#copy configuration for nginx
echo "Copying nginx configuration file"
cp /var/www/vagrant/nginx/default /etc/nginx/sites-enabled/default

#restart nginx server if running
echo "Restarting nginx"
nginx -s stop
nginx

