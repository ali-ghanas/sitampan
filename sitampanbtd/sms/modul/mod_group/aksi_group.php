<?php
session_start();
include "../../../fungsi/fungsi_seo.php";
include "../../../koneksi/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Group
if ($module=='group' AND $act=='hapus'){
	mysql_query("DELETE FROM tgrup WHERE id_grup='$_GET[id]'");
	header('location:../../master.php?module=group');
}

// Input Group
elseif ($module=='group' AND $act=='input'){
	$groupSeo 	= seo_title($_POST['group']);
	$groupName 	= $_POST['group'];
	$idUser		= $_SESSION['idUser'];
	$masuk = mysql_query("INSERT INTO tgrup(grup,grup_seo,id_user,lastUpdate) VALUES('$groupName','$groupSeo','$idUser','$idUser')");
	header('location:../../master.php?module=group');
}

// Update Group
elseif ($module=='group' AND $act=='update'){
	$groupSeo = seo_title($_POST['group']);
	mysql_query("UPDATE tgrup SET grup = '$_POST[group]', grup_seo='$groupSeo', lastUpdate='$_SESSION[idUser]' WHERE id_grup = '$_POST[id]'");
	header('location:../../master.php?module=group');
}
?>
