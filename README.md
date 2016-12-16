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

## Access url

frontend: http://localhost:9090

backend: http://localhost:9091

## Create new Oauth client

ssh to container
```
docker exec -it oauth2_php sh
```

create auth client user
```
./yii oauth2:client/create --name=doh --userId=1 --redirectUri=http://app-frontend.dev:9091/user/security/auth?
authclient=doh
```

result
```
Client created :
 - id: 04660095397352d5784b3b720c51a7663b7f9b24
 - secret: 1d222367d15f696045047c7ffeb7f2e1611204e8
 - name: doh
 - redirectUri: Array
```
