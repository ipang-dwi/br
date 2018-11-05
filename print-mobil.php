<?php
session_start();
include 'dbconf.php';
if (!isset($_SESSION['login']))
	header('Location: login-ui.php');

$result = $mysqli->query("select * from mobil where id_mobil = ".$_GET['id']."");
if($result->num_rows != 0){
	while ($row = $result->fetch_assoc()) {
		$id = $row['id_mobil'];
		$ekspedisi = $row['ekspedisi'];
		$nopol = $row['nopol'];
		$supir = $row['supir'];
		$hp = $row['hp'];
		$jenis = $row['jenis'];
		$tujuan = $row['tujuan'];
	}
}
require_once('tcpdf/tcpdf.php');
 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Brian');
$pdf->SetTitle('Report Daftar Mobil');
$pdf->SetSubject('Mobil No. ');
$pdf->SetKeywords('laporan, report, trucking, monitoring');
 
$pdf->AddPage(); 
 
$html = '<p align="center"><b>'.$_SESSION['desc'].'<br>REPORT DAFTAR MOBIL No.'.$id.'</b><hr></p>
		<table border="0" cellpadding="2">
		<tr>
		<td width="20"></td>
		<td width="100">Nomer Daftar</td>
		<td width="20"> : </td>
		<td>'.$id.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Nama Ekspedisi</td>
		<td width="20"> : </td>
		<td>'.$ekspedisi.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Nomer Polisi</td>
		<td width="20"> : </td>
		<td>'.$nopol.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Jenis Mobil</td>
		<td width="20"> : </td>
		<td>'.$jenis.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Nama Supir</td>
		<td width="20"> : </td>
		<td>'.$supir.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Nomer HP</td>
		<td width="20"> : </td>
		<td>'.$hp.'</td>
		</tr>
		<tr>
		<td width="20"></td>
		<td width="100">Tujuan</td>
		<td width="20"> : </td>
		<td>'.$tujuan.'</td>
		</tr>
		</table></br><hr>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
 
// reset pointer to the last page
$pdf->lastPage();
 
$pdf->Output('report-daftar-mobil-'.$_GET['id'].'.pdf', 'I');
 
?>