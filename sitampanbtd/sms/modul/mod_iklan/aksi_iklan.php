<?php
session_start();
include "../../../koneksi/koneksi.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus Iklan
if ($module=='iklan' AND $act=='hapus'){
	$data = mysql_fetch_array(mysql_query("SELECT gambar FROM tiklan WHERE id_iklan = '$_GET[id]'"));
	$namaFile = $data[gambar];
	if ($data[gambar] == ''){
		mysql_query("DELETE FROM tiklan WHERE id_iklan='$_GET[id]'");
	}
	else{
		$hapusFile = unlink("../../../gambar/advertising/$namaFile");
		if ($hapusFile){
			mysql_query("DELETE FROM tiklan WHERE id_iklan='$_GET[id]'");
		}
	}
	header('location:../../master.php?module=iklan');
}

// Tambah Iklan
elseif ($module=='iklan' AND $act=='input'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];


	// Apabila ada gambar yang diupload
	if (!empty($lokasiFile)){
		move_uploaded_file($lokasiFile, '../../../gambar/advertising/'.$namaFile);
		
		mysql_query("INSERT INTO tiklan(judul,
										url,
										gambar,
										hits,
										tanggalAwal,
										tanggalAkhir,
										aktif,
										jenis_layanan,
										id_user)
								VALUES ('$_POST[judul]',
										'$_POST[url]',
										'$namaFile',
										'0',
										'$_POST[tgl_awal]',
										'$_POST[tgl_akhir]',
										'$_POST[aktif]',
										'$_POST[layanan]',
										'$_SESSION[idUser]')");
		header('location:../../master.php?module=iklan');
	}
	else{
		echo "<script language='javascript'> alert('Isikan semua data, termasuk Gambar'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../../master.php?module=iklan&act=tambahiklan'>";
	}
}

// Update iklan
elseif ($module=='iklan' AND $act=='update'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];

	// Apabila gambar diganti
	if (!empty($lokasiFile)){
		$ambil = mysql_fetch_array(mysql_query("SELECT gambar FROM tiklan WHERE id_iklan = '$_POST[id]'"));
		$gambar = $ambil[gambar];
		$hapusFile = unlink("../../../gambar/advertising/$gambar");
		
		if ($hapusFile){
			move_uploaded_file($lokasiFile, '../../../gambar/advertising/'.$namaFile);
			
			mysql_query("UPDATE tiklan SET 	judul 	= '$_POST[judul]',
											url		= '$_POST[url]',
											gambar	= '$namaFile',
											tanggalAwal = '$_POST[tgl_awal]',
											tanggalAkhir= '$_POST[tgl_akhir]',
											aktif	= '$_POST[aktif]',
											jenis_layanan= '$_POST[layanan]',
											id_user	= '$_SESSION[idUser]'
											WHERE id_iklan = '$_POST[id]'");
		}
	}
	else{
		mysql_query("UPDATE tiklan SET 	judul 	= '$_POST[judul]',
											url		= '$_POST[url]',
											tanggalAwal = '$_POST[tgl_awal]',
											tanggalAkhir= '$_POST[tgl_akhir]',
											aktif	= '$_POST[aktif]',
											jenis_layanan = '$_POST[layanan]',
											id_user	= '$_SESSION[idUser]'
											WHERE id_iklan = '$_POST[id]'");
	}
	header('location:../../master.php?module=iklan');
}
?>
