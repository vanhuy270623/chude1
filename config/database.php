<?php
require 'constants.php';
session_start();
try{
	$pdo=new PDO("mysql:host=localhost;dbname=flightmanagement","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->query("set names 'UTF8'");
}catch(Exception $e){
	echo $e->getMessage();
}
$diemDi = $_POST['diemDi'] ?? '';
$diemDen = $_POST['diemDen'] ?? '';
$ngayDi = $_POST['ngayDi'] ?? '';
$ngayVe = $_POST['ngayVe'] ?? '';

$sql = "SELECT * FROM chuyenbay WHERE DDi = :diemDi AND DDen = :diemDen";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':diemDi', $diemDi, PDO::PARAM_STR);
$stmt->bindParam(':diemDen', $diemDen, PDO::PARAM_STR);
$stmt->execute();
$flights = $stmt->fetchAll();

$sql = "SELECT DDi FROM `chuyenbay`  GROUP BY DDi";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$LocaltionDi = $stmt->fetchAll();

$sql = "SELECT DDen FROM `chuyenbay`  GROUP BY DDen";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$LocaltionDen = $stmt->fetchAll();

$sql = "SELECT * FROM `hangbay` JOIN chuyenbay on chuyenbay.IDHang=hangbay.IDHang ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$Costf = $stmt->fetchAll();
// var_dump($Costf);

?>
