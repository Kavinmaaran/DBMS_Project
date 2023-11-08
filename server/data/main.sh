#! /bin/bash

file="/home/CEO"

mkdir /var/www/omega  
cp -r /var/omega/website/. /var/www/omega/.
cp -r /var/omega/omegaconfig.json /var/www  

sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/8.1/apache2/php.ini
rm -rf ${file}/.git
cp /var/omega/omegaquiz.local.conf /etc/apache2/sites-available/omegaquiz.local.conf
cd /etc/apache2/sites-available
a2ensite omegaquiz.local.conf
echo "Options +Indexes" >> /var/www/omega/Statistics/.htaccess
sudo a2enmod rewrite
service apache2 reload 
/usr/sbin/apache2ctl -D FOREGROUND
