<?php
// opens the database connection
$conn = mysql_connect($DATABASE_HOSTNAME, $DATABASE_USERNAME, $DATABASE_PASSWORD) or die ('Error connecting to mysql');

// assumes there is already a databse in the mysql databse called "cdc"
$DATABASE_NAME = 'cdc';
mysql_select_db($DATABASE_NAME);
?>
