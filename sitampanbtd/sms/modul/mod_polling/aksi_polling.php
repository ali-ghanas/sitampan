<?php
session_start();
include "../../../koneksi/koneksi.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus poling
if ($module=='polling' AND $act=='hapus'){
	mysql_query("DELETE FROM tpolling WHERE id_polling='$_GET[id]'");
	header('location:../../master.php?module=polling');
}

// Input poling
elseif ($module=='polling' AND $act=='input'){
	$tgl = date('Y-m-d');
	mysql_query("INSERT INTO tpolling	(pilihan,
										status,
										rating,
										aktif,
										datetime) 
								VALUES ('$_POST[pilihan]',
										'$_POST[status]',
										'0',
										'$_POST[aktif]',
										'$tgl')");
	header('location:../../master.php?module=polling');
}

// Update poling
elseif ($module=='polling' AND $act=='update'){
	mysql_query("UPDATE tpolling SET pilihan = '$_POST[pilihan]',
									status	= '$_POST[status]',
									aktif	= '$_POST[aktif]'
									WHERE id_polling = '$_POST[id]'");
	header('location:../../master.php?module=polling');
}
?>
