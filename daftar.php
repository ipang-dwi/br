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
	
	$result = $mysqli->query("INSERT INTO `br`.`mobil` (`id_mobil`, `ekspedisi`, `spe`, `jenis`, `nopol`, `supir`, `hp`, `masuk`, `muat`, `keluar`, 	
							`tujuan`, `status`) VALUES (NULL, '".$ekspedisi."', '', '".$jenis."', '".$nopol."', '".$supir."', '".$hp."', 
							'".date('Y-m-d H:i:s')."', '', '', '".$tujuan."', 'belum muat');");
							
	header('Location: mobil.php');
?>