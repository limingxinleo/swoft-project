#!/usr/bin/env bash
basepath=$(cd `dirname $0`; pwd)
docker pull registry.cn-shanghai.aliyuncs.com/limingxinleo/swoft-project:latest
docker run --rm -i -v $basepath/.env:/opt/www/.env \
--entrypoint php registry.cn-shanghai.aliyuncs.com/limingxinleo/swoft-project:latest \
/opt/www/bin/swoft app:init
