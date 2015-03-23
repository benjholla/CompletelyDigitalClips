#!/bin/bash

clear

echo "Enter database name: "
read DATABASE_NAME

echo "Enter database username: "
read DATABASE_USERNAME

echo "Enter database password: "
read DATABASE_PASSWORD

Q1="CREATE DATABASE IF NOT EXISTS $DATABASE_NAME;"
Q2="GRANT USAGE ON *.* TO \`$DATABASE_USERNAME\`@'0.0.0.0' IDENTIFIED BY '$DATABASE_PASSWORD' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;"
Q3="GRANT ALL PRIVILEGES ON \`$DATABASE_NAME\` . * TO '$DATABASE_USERNAME'@'0.0.0.0';"
Q4=`cat Application/create-users.sql`
Q5=`cat Application/create-clips.sql`

SQL="${Q1}${Q2}${Q3}${Q4}${Q5}"

MYSQL=`which mysql`
$MYSQL -uroot -p -e "$SQL"

echo "Finished."
