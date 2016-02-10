<?php
error_reporting(0);
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/fungsi_seo.php";
include "../../../fungsi/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus agenda
if ($module=='agenda' AND $act=='hapus'){
	mysql_query("DELETE FROM tagenda WHERE id_agenda='$_GET[id]'");
	header('location:../../master.php?module=agenda');
}

// Input agenda
elseif ($module=='agenda' AND $act=='input'){
	$tema_seo = seo_title($_POST[tema]);

	mysql_query("INSERT INTO tagenda(tema,
									tema_seo,
									aktif,
									isi_agenda,
									tempat,
									pengirim,
									tgl_mulai,
									tgl_selesai,
									tgl_posting,
									jam,
									id_user)
							VALUES(	'$_POST[tema]',
									'$tema_seo',
									'$_POST[aktif]',
									'$_POST[isi_agenda]',
									'$_POST[tempat]',
									'$_POST[pengirim]',
									'$_POST[tgl_mulai]',
									'$_POST[tgl_selesai]',
									'$tgl_sekarang',
									'$_POST[jam]',
									'$_SESSION[idUser]')");
	header('location:../../master.php?module=agenda');
}

// Update agenda
elseif ($module=='agenda' AND $act=='update'){
	$tema_seo = seo_title($_POST['tema']);

  mysql_query("UPDATE agenda SET tema        = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_agenda  = '$_POST[isi_agenda]',
                                 tgl_mulai   = '$mulai',
                                 tgl_selesai = '$selesai',
                                 tempat      = '$_POST[tempat]',  
                                 pengirim    = '$_POST[pengirim]'  
                           WHERE id_agenda   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
