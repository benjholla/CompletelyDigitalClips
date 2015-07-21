# Scalability Woes

## Background
Wow we are growing so fast!  Our current set up servers can hardly keep up with the load balancers incoming requests.  Fortunately we are also starting to turn a profit and we can afford to buy a new server.  Yay!

## Challenge
Added another video server to the load balancer.  For green team to check this you should add a temporary watermark in the form of an HTML comment to each video server.  For video server 1 add the comment `<!-- VIDEO1 -->`, for video server 2 add the comment `<!-- VIDEO2 -->`, and for video server 3 add the comment `<!-- VIDEO3 -->`.