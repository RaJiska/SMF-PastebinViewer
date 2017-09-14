FROM ubuntu:16.04

# Apache
EXPOSE 80

RUN \
    apt-get update && \
        apt-get install -y software-properties-common && \
        LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php && \
        apt-get update && \
    apt-get install -y \
        apache2 \
        libapache2-mod-php5.6 \
        php5.6 \
        php5.6-gd \
        php5.6-curl \
        php5.6-mysql \
        mariadb-server \
        wget \
        curl && \
    apt-get autoremove -y

ADD smf.sql /tmp/smf.sql

RUN \
    service mysql start && \
    mysql -u root -pa -e "CREATE DATABASE smf; GRANT ALL PRIVILEGES ON smf.* TO 'smf'@'localhost' IDENTIFIED BY 'smf'; USE smf; SOURCE /tmp/smf.sql;" && \
    cd /var/www/html && \
    rm index.html && \
    wget https://download.simplemachines.org/index.php/smf_2-0-14_install.tar.gz && \
    tar xvf smf_2-0-14_install.tar.gz && \
    rm smf_2-0-14_install.tar.gz && \
    chown 33:33 -R . && \
    chmod 750 -R . && \
		rm install.php

ADD Settings.php /var/www/html/
ADD startup.sh /tmp/

RUN chmod +x /tmp/startup.sh

CMD ["/tmp/startup.sh"]
