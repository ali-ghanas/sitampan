<?php
error_reporting(0);
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/library.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus Link
if ($module=='link' AND $act=='hapus'){
	$data = mysql_fetch_array(mysql_query("SELECT gambar FROM tlink WHERE id_link = '$_GET[id]'"));
	$namaFile = $data[gambar];
	if ($data[gambar] == ''){
		mysql_query("DELETE FROM tlink WHERE id_link='$_GET[id]'");
	}
	else{
		$hapusFile = unlink("../../../gambar/links/$namaFile");
		if ($hapusFile){
			mysql_query("DELETE FROM tlink WHERE id_link='$_GET[id]'");
		}
	}
	header('location:../../master.php?module=link');
}

// Tambah Iklan
elseif ($module=='link' AND $act=='input'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];


	// Apabila ada gambar yang diupload
	if (!empty($lokasiFile)){
		move_uploaded_file($lokasiFile, '../../../gambar/links/'.$namaFile);
		
		mysql_query("INSERT INTO tlink(nama,
										url,
										aktif,
										gambar,
										tanggal,
										jam,
										id_user)
								VALUES ('$_POST[nama]',
										'$_POST[url]',
										'$_POST[aktif]',
										'$namaFile',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$_SESSION[idUser]')");
		header('location:../../master.php?module=link');
	}
	else{
		echo "<script language='javascript'> alert('Isikan semua data, termasuk Gambar'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../../master.php?module=link&act=tambahlink'>";
	}
}

// Update link
elseif ($module=='link' AND $act=='update'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];

	// Apabila gambar diganti
	if (!empty($lokasiFile)){
		$ambil = mysql_fetch_array(mysql_query("SELECT gambar FROM tlink WHERE id_link = '$_POST[id]'"));
		$gambar = $ambil[gambar];
		$hapusFile = unlink("../../../gambar/links/$gambar");
		
		if ($hapusFile){
			move_uploaded_file($lokasiFile, '../../../gambar/links/'.$namaFile);
			
			mysql_query("UPDATE tlink SET 	nama	= '$_POST[nama]',
											url		= '$_POST[url]',
											aktif	= '$_POST[aktif]',
											gambar	= '$namaFile',
											id_user	= '$_SESSION[idUser]'
											WHERE id_link = '$_POST[id]'");
		}
	}
	else{
		mysql_query("UPDATE tlink SET 	nama	= '$_POST[nama]',
											url		= '$_POST[url]',
											aktif	= '$_POST[aktif]',
											id_user	= '$_SESSION[idUser]'
											WHERE id_link = '$_POST[id]'");
	}
	header('location:../../master.php?module=link');
}
?>
