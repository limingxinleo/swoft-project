# @description php 7.1 image base on the alpine 3.7 镜像更小，构建完成只有46M
#                       some information
# ------------------------------------------------------------------------------------
# @link https://hub.docker.com/_/alpine/      alpine image
# @link https://hub.docker.com/_/php/         php image
# @link https://github.com/docker-library/php php dockerfiles
# ------------------------------------------------------------------------------------
# @build-example docker build . -f Dockerfile -t swoft/swoft-project:v1.0
# @run-example docker run --rm -d -p 8080:8080 --name swoft-project swoft/swoft-project:1.0
#

FROM swoft/alphp:cli
LABEL maintainer="limx <limingxin@swoft.org>" version="1.0"

# 安装其他依赖
RUN apk add git php7-xml

ADD . /var/www/swoft

WORKDIR /var/www/swoft

# 安装composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --clean-backups

RUN composer install --no-dev \
    && composer dump-autoload -o \
    && composer clearcache

EXPOSE 8080

ENTRYPOINT ["php", "/var/www/swoft/bin/swoft", "start"]