#!/usr/bin/env bash

#refresh repositories
echo "apt-get update"
apt-get update > /dev/null

#installation of web server
echo "Installing nginx"
apt-get -y install nginx > /dev/null

#installation of php5
echo "Installing php5-fpm"
apt-get -y install php5-fpm > /dev/null
apt-get -y install php5-cli > /dev/null
apt-get -y install php5-pgsql > /dev/null
apt-get -y install php5-intl > /dev/null
apt-get -y install php5-curl > /dev/null

echo "date.timezone = \"Europe/Zagreb\"" >> /etc/php5/fpm/php.ini
service php5-fpm restart

#repair ubuntu locales (hr_HR.UTF-8), bug in 14.04?
echo "Repair locales -- using hr_HR.UTF-8"
locale-gen hr_HR.UTF-8
dpkg-reconfigure locales


#installation of Postgresql
echo "Installing postgresql"
#add repo
touch /etc/apt/sources.list.d/pgdg.list
echo "deb http://apt.postgresql.org/pub/repos/apt/ trusty-pgdg main" > /etc/apt/sources.list.d/pgdg.list
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add -
apt-get update > /dev/null
#install psql-9.4 from repo
apt-get -y install postgresql-9.4 > /dev/null

#setup cluster #1
#echo "Creating postgres cluster"
#pg_createcluster 9.4 main --start

#installation of composer
echo "Installing composer dependencies"
apt-get -y install curl > /dev/null
echo "Installing composer"
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

#installation of symfony
echo "Installing symfony"
curl -LsS http://symfony.com/installer > symfony.phar
mv symfony.phar /usr/local/bin/symfony
chmod a+x /usr/local/bin/symfony

#copy configuration for nginx
echo "Copying nginx configuration file"
cp /var/www/vagrant/nginx/default /etc/nginx/sites-enabled/default

#restart nginx server if running
echo "Restarting nginx"
nginx -s stop
nginx

