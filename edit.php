<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$ekspedisi = $_POST['ekspedisi'];
	$jenis = $_POST['jenis'];
	$nopol = $_POST['nopol'];
	$supir = $_POST['supir'];
	$hp = $_POST['hp'];
	$tujuan = $_POST['tujuan'];
	
	$result = $mysqli->query("UPDATE `br`.`mobil` SET `ekspedisi` = '".$ekspedisi."', `jenis` = '".$jenis."', `nopol` = '".$nopol."', 
						`supir` = '".$supir."', `hp` = '".$hp."', `tujuan` = '".$tujuan."' WHERE `mobil`.`id_mobil` = ".$_GET['id'].";");
							
	header('Location: mobil.php');
?>