<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$spe = $_POST['spe'];
	
	$result = $mysqli->query("UPDATE `br`.`mobil` SET `spe` = '".$spe."', `muat` = '".date('Y-m-d H:i:s')."', `status` = 'proses muat' 
						WHERE `mobil`.`id_mobil` = ".$_GET['id'].";");
							
	header('Location: muat.php');
?>