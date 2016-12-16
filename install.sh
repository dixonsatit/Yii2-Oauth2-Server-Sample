#!/usr/bin/env php
composer config -g github-oauth.github.com $GITHUB_API_TOKEN
composer install

echo "RUN:  Migration initialization data."
php yii migrate/up --migrationPath=@yii/rbac/migrations --interactive=0
php yii migrate/up --migrationPath=@yii/log/migrations --interactive=0
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations --interactive=0
echo "RUN:  Create default user."
php yii user/create dixonsatit@gmail.com dixon 123132123@dOh
echo "RUN:  Add default role for user."
php yii rbac-init/init
