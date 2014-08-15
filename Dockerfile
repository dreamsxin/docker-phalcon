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

RUN apt-get install -y apache2 php5 php5-dev php5-pgsql php5-mcrypt php5-imagick
RUN apt-get install -y libqrencode-dev libzbar-dev libpng12-dev

EXPOSE 80 22
CMD ["/usr/sbin/init"]
#EXPOSE 22
#CMD ["/usr/sbin/sshd", "-D"]
#ENTRYPOINT /etc/init.d/httpd start && /etc/init.d/sshd start && /bin/bash
