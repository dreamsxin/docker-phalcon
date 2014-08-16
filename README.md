docker-phalcon
==============

Install
-------
```shell
sudo apt-get install docker.io
sudo ln -sf /usr/bin/docker.io /usr/local/bin/docker
sudo sed -i '$acomplete -F _docker docker' /etc/bash_completion.d/docker.io
```

下载构建
```shell
git clone https://github.com/dreamsxin/docker-phalcon.git
cd docker-phalcon
sudo docker build -t="dreamsxin/phalcon:v1.0" .
sudo docker run -ti -p 8080:80 dreamsxin/phalcon:v1.0 -v
```
或者直接从Docker Hub下载镜像
```shell
sudo docker pull dreamsxin/phalcon
sudo docker run -tiP dreamsxin/phalcon:v1.0
```
