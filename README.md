Yii 2 Advanced Oauth2 Template
===============================

## install

```
cp .evn.dist .env
```

config

```
# ----------------------------------------------------------------
# ====================== Database Config =========================
# ----------------------------------------------------------------

MYSQL_ROOT_PASSWORD=123132123
MYSQL_DATABASE=oauth2
MYSQL_USER=oauth2@MySQL
MYSQL_PASSWORD=123456
MYSQL_PORT=3306

# ----------------------------------------------------------------
# ====================== Auth Client =============================
# ----------------------------------------------------------------
CLIENT_ID=clientId
CLIENT_SECRET=clientSecret
API_URL=http://app-frontend.dev:9091

# ----------------------------------------------------------------
# ====================== Github API Token ========================
# ----------------------------------------------------------------

GITHUB_API_TOKEN=token

```

build & start docker

```
docker-compose up -d
```

check service
```
docker-compose ps

     Name                    Command               State               Ports
----------------------------------------------------------------------------------------
oauth2_backend    nginx -g daemon off;             Up      443/tcp, 0.0.0.0:9091->80/tcp
oauth2_frontend   nginx -g daemon off;             Up      443/tcp, 0.0.0.0:9090->80/tcp
oauth2_mariadb    docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp
oauth2_php        php-fpm                          Up      9000/tcp
oauth2_redis      docker-entrypoint.sh redis ...   Up      6379/tcp
```

ssh to container `oauth2_php`

```
docker exec -it oauth2_php sh

sh install.sh
```
