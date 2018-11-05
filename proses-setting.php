<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$judul = $_POST['judul'];
	$desc = $_POST['desc'];
	$creator = $_POST['creator'];
	
	$uploaddir = 'uploads/slider/';
	$uploadfile1 = $uploaddir . basename($_FILES['slider1']['name']);
	move_uploaded_file($_FILES['slider1']['tmp_name'], $uploadfile1);
	$uploadfile2 = $uploaddir . basename($_FILES['slider2']['name']);
	move_uploaded_file($_FILES['slider2']['tmp_name'], $uploadfile2);
	$uploadfile3 = $uploaddir . basename($_FILES['slider3']['name']);
	move_uploaded_file($_FILES['slider3']['tmp_name'], $uploadfile3);
	
	$result = $mysqli->query("UPDATE `br`.`setting` SET `creator` = '".$creator."', 
						`judul` = '".$judul."', `desc` = '".$desc."', 
						`slider1` = '".$_FILES['slider1']['name']."', 
						`slider2` = '".$_FILES['slider2']['name']."', 
						`slider3` = '".$_FILES['slider3']['name']."' 
						WHERE `setting`.`id_setting` = 1;");
							
	header('Location: setting.php');
?>