<?php
// clear session
setcookie("PHPSESSID", "", time()-3600);
header('Location: /index.php');
?>
