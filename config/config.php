<?php
require '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('API_KEY', $_ENV['API_KEY']);
define('API_SECRET', $_ENV['API_SECRET']);
define('API_URL', $_ENV['API_URL']);
?>
