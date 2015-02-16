<?php
  function authenticated_session($username) {
    return sha1(md5($username));
  }
?>
