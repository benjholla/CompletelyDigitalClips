#!/bin/bash

# clear the screen
clear

# reset any changes in the git repo to head of master and remove untracked files and pull updates from master repo
echo "Resetting source repository..."
git reset --hard
git clean -x -f
git pull https://github.com/benjholla/CompletelyDigitalClips.git master &> /dev/null
git pull origin master

# copy and replace the file contents of the application source to the webserver directory
# don't replace config.php file
sudo find /var/www/ -type f -not -name 'config.php' -delete
sudo find /var/www/ -type d -empty -delete
sudo cp -a -n Application/. /var/www/

sudo chmod -R 0755 /var/www/media
sudo chown www-data:www-data /var/www/media

# all done
printf "\nFinished.\n"
