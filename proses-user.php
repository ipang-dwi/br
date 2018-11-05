<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$level = $_POST['level'];
	$since = date("Y-m-d",strtotime($_POST['since']));
	
	$uploaddir = 'uploads/';
	$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
	move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
	
	$result = $mysqli->query("INSERT INTO `br`.`user` (`id`, `user`, `pass`, `level`, `since`, `foto`) 
						VALUES (NULL, '".$user."', '".hashku(1,$pass)."', '".$level."', 
						'".$since."', '".$_FILES['foto']['name']."');");
							
	header('Location: user.php');
?>