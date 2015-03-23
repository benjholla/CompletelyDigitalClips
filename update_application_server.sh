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
sudo rm -rf /var/www/*
sudo cp -a Application/. /var/www/

# all done
printf "\nFinished.\n"
