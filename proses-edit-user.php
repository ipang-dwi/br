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
	
	$result = $mysqli->query("UPDATE `br`.`user` SET `user` = '".$user."', `pass` = '".hashku(1,$pass)."', `level` = '".$level."', `since` = '".$since."', 
						`foto` = '".$_FILES['foto']['name']."' WHERE `user`.`id` = ".$_GET['id'].";");
						
	header('Location: user.php');
?>