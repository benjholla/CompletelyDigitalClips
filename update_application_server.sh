#!/bin/bash

# clear the screen
clear

# reset any changes in the git repo to head of master and remove untracked files and pull updates from master repo
echo "Resetting source repository..."
git pull https://github.com/benjholla/CompletelyDigitalClips.git master &> /dev/null
git pull origin master
git reset --hard
git clean -x -f

# copy and replace the file contents of the application source to the webserver directory
# don't replace config.php file
tmpdir=`mktemp -d`

# purge index.html in media directory
sudo rm /var/www/media/index.html

# backup media directory and config.php file
sudo cp -a -n /var/www/media/. $tmpdir/
sudo cp -a -n /var/www/config.php $tmpdir/

# purge www 
sudo rm -rf /var/www/*

# copy update application files to www
sudo cp -a -n Application/. /var/www/

# restore config file
sudo mv $tmpdir/config.php /var/www/config.php

# restore media directory contents
sudo cp -a -n $tmpdir/. /var/www/media/

# reset check permissions
sudo chmod -R 0755 /var/www/media
sudo chown www-data:www-data /var/www/media

# all done
printf "\nFinished.\n"
