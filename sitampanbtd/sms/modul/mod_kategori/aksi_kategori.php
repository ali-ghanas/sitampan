<?php
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='kategori' AND $act=='hapus'){
	mysql_query("DELETE FROM tkategori WHERE id_kategori='$_GET[id]'");
	header('location:../../master.php?module=kategori');
}

// Input kategori
elseif ($module=='kategori' AND $act=='input'){
	$kategoriSeo = seo_title($_POST['kategori']);
	mysql_query("INSERT INTO tkategori(id_grup,kategori,kategori_seo,aktif,id_user,lastUpdate) 
	VALUES('$_POST[groupId]','$_POST[kategori]','$kategoriSeo','$_POST[aktif]','$_SESSION[idUser]','$_SESSION[idUser]')");
	header('location:../../master.php?module=kategori');
}

// Update kategori
elseif ($module=='kategori' AND $act=='update'){
	$kategoriSeo = seo_title($_POST['kategori']);
	mysql_query("UPDATE tkategori SET id_grup = '$_POST[groupId]', kategori = '$_POST[kategori]', kategori_seo='$kategoriSeo', aktif = '$_POST[aktif]', lastUpdate = '$_SESSION[idUser]' WHERE id_kategori = '$_POST[id]'");
	header('location:../../master.php?module=kategori');
}
?>
