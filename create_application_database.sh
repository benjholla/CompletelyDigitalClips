#!/bin/bash

clear

# reset any changes in the git repo to head of master and remove untracked files and pull updates from master repo
echo "Resetting source repository..."
git pull https://github.com/benjholla/CompletelyDigitalClips.git master &> /dev/null
git pull origin master
git reset --hard
git clean -x -f

echo "Enter database name (ex: application):"
read DATABASE_NAME

echo "Enter database username (ex: root):"
read DATABASE_USERNAME

echo "Enter database password (ex: cdc):"
read DATABASE_PASSWORD

Q1="CREATE DATABASE IF NOT EXISTS $DATABASE_NAME;"
Q2="GRANT USAGE ON *.* TO \`$DATABASE_USERNAME\`@'0.0.0.0' IDENTIFIED BY '$DATABASE_PASSWORD' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;"
Q3="GRANT ALL PRIVILEGES ON \`$DATABASE_NAME\` . * TO '$DATABASE_USERNAME'@'0.0.0.0';"

sed -i "s/DATABASE_NAME/$DATABASE_NAME/g" Application/create-users.sql
Q4=`cat Application/create-users.sql`

sed -i "s/DATABASE_NAME/$DATABASE_NAME/g" Application/create-clips.sql
Q5=`cat Application/create-clips.sql`

SQL="${Q1}${Q2}${Q3}${Q4}${Q5}"

MYSQL=`which mysql`
$MYSQL -uroot -p -e "$SQL"

echo "Finished."
