<?php
require 'constants.php';
try{
	$pdo=new PDO("mysql:host=localhost;dbname=flightmanagement","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->query("set names 'UTF8'");
}catch(Exception $e){
	echo $e->getMessage();
}

?>
