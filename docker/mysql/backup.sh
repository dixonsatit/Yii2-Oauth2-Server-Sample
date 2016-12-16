#!/bin/bash
NOW=$(date +"%m-%d-%Y_%H-%M")
FILE="doh-$NOW.sql.gz"
docker exec doh_mariadb sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --databases $MYSQL_DATABASE | gzip ' > './docker/mysql/backup/'$FILE
echo "Backing up data complate > " $FILE
