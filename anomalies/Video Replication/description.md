# Video Replication

## Background
Currently our load balancer alternates round robin between our video servers.  Videos are uploaded round robin as well, but if a video gets popular one server might get overloaded.  We need a way to replicate the popular videos to the neighboring video servers.  A team of highly skilled math dudes said the optimal threshold to wait to replicate a video is 100 views.  Once a video hits 100 views we want to replicated it within 15 minutes to the neighboring servers.

The devops team whipped up some code to get it done, but cautioned us they were pretty tired from the last crazy stunt management had them working on and the code might not be that secure.

## Challenge
We need to check this code over and get it up and running in the next two hours.