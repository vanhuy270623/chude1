<?php
require 'config/constants.php';
//destroy all sessions and redirect user to login page
session_destroy();

header('location: index.php ');
die();
?>