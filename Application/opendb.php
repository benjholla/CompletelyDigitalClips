<?php
// opens the database connection
$conn = mysql_connect($DATABASE_HOSTNAME, $DATABASE_USERNAME, $DATABASE_PASSWORD) or die ('Error connecting to mysql');

// connects to the specific database on the MySQL server
mysql_select_db($DATABASE_NAME);
?>
