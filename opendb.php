<?php
// opens the database connection
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

// assumes there is already a databse in the mysql databse called "cdc"
$dbname = 'cdc';
mysql_select_db($dbname);
?>
