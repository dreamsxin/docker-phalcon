# Phalcon
#
# VERSION               0.0.1

FROM     ubuntu:14.04
MAINTAINER Dreamsxin "dreamsxin@qq.com"

# make sure the package repository is up to date
RUN apt-get update

RUN apt-get install -y openssh-server
RUN mkdir /var/run/sshd
RUN echo 'root:phalcon' |chpasswd

RUN apt-get install -y apache2 php5 php5-dev php5-pgsql php5-mcrypt php5-imagick re2c
RUN apt-get install -y libqrencode-dev libzbar-dev libpng12-dev

ADD ./cphalcon/ /var/www/cphalcon/
RUN ls /var/www
RUN ls /var/www/cphalcon/ext
RUN  cd /var/www/cphalcon/ext && phpize && ./configure && make && make install
ADD phalcon.ini /etc/php5/mods-available
RUN ln -s /etc/php5/mods-available/phalcon.ini /etc/php5/apache2/conf.d

EXPOSE 80 22
ENTRYPOINT /etc/init.d/apache2 start && /etc/init.d/ssh start && /bin/bash
