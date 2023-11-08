FROM ubuntu/apache2:latest
ARG DEBIAN_FRONTEND=noninteractive
WORKDIR /var/omega
RUN apt update
RUN apt -y upgrade
RUN apt install -y sudo acl wget 
RUN apt install -y php libapache2-mod-php php-mysql
RUN apt install -y bc ufw cron php-pear
RUN apt install -y php-dev
RUN pecl channel-update pecl.php.net
RUN rm -rf /var/www/html/index.html
RUN pecl install mongodb

RUN echo "extension=mongodb.so" > /etc/php/8.1/apache2/conf.d/20-mongodb.ini && \
	echo "extension=mongodb.so" > /etc/php/8.1/cli/conf.d/20-mongodb.ini && \
	echo "extension=mongodb.so" > /etc/php/8.1/mods-available/mongodb.ini
RUN apt install -y composer 

COPY ./data/ .
RUN chmod +x ./main.sh
CMD /var/omega/main.sh
