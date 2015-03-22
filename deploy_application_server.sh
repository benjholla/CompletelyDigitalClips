#!/bin/bash

# clear the screen
clear

# reset any changes in the git repo to head of master and remove untracked files
echo "Resetting source repository..."
git reset --hard
git clean -x -f

# set the application server host name in the configuration template file
printf "\nType the host name of this application server (ex: video1, video2, etc.) followed by [ENTER]:"

read APPLICATION_HOSTNAME

sed -i "s/APPLICATION_HOSTNAME/\$APPLICATION_HOSTNAME = \"$APPLICATION_HOSTNAME\";/g" config_template

# set the database host name in the configuration template file
printf "\nType the host name of the database server (ex: database) followed by [ENTER]:"

read DATABASE_HOSTNAME

sed -i "s/DATABASE_HOSTNAME/\$DATABASE_HOSTNAME = \"$DATABASE_HOSTNAME\";/g" config_template

# set the database username in the configuration template file
printf "\nType the username of the database SQL account to connect the application server to (ex: root) followed by [ENTER]:"

read DATABASE_USERNAME

sed -i "s/DATABASE_USERNAME/\$DATABASE_USERNAME = \"$DATABASE_USERNAME\";/g" config_template

# set the database password in the configuration template file
printf "\nType the password of the database account to connect the application server to (ex: cdc) followed by [ENTER]:"

read DATABASE_PASSWORD

sed -i "s/DATABASE_PASSWORD/\$DATABASE_PASSWORD = \"$DATABASE_PASSWORD\";/g" config_template

rm Application/config.php
mv config_template Application/config.php
