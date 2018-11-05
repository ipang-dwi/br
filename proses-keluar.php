<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$result = $mysqli->query("UPDATE `br`.`mobil` SET `keluar` = '".date('Y-m-d H:i:s')."', `status` = 'keluar' 
						WHERE `mobil`.`id_mobil` = ".$_GET['id'].";");
							
	header('Location: keluar.php');
?>