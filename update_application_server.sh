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
sudo rm /var/www/media/index.html
sudo cp -a -n /var/www/media/. $tmpdir/
sudo cp -a -n /var/www/config.php $tmpdir/
ls -la $tmpdir
sudo find /var/www/ -type f -delete
sudo find /var/www/ -type d -empty -delete
sudo cp -a -n $tmpdir/config.php /var/www/config.php
sudo rm $tmpdir/config.php
sudo cp -a -n Application/. /var/www/
sudo cp -a -n $tmpdir/. /var/www/media/

sudo chmod -R 0755 /var/www/media
sudo chown www-data:www-data /var/www/media

# all done
printf "\nFinished.\n"
