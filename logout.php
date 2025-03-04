<?php
require 'config/database.php';
//destroy all sessions and redirect user to login page
session_destroy();

header('location: index.php' );
?>