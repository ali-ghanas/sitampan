<?php
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/library.php";
include "../../../fungsi/fungsi_thumb.php";

$module = $_GET[module];
$act	= $_GET[act];

// Hapus download
if ($module=='download' AND $act=='hapus'){
	$data = mysql_fetch_array(mysql_query("SELECT namafile FROM tdownload WHERE id_download = '$_GET[id]'"));
	$namaFile = $data[namafile];
	if ($data[namafile]==''){
		mysql_query("DELETE FROM tdownload WHERE id_download='$_GET[id]'");
	}
	else{
		$hapusFile = unlink("../../../file_downloads/$namaFile");
		if ($hapusFile){
			mysql_query("DELETE FROM tdownload WHERE id_download='$_GET[id]'");
		}
	}
	header('location:../../master.php?module=download');
}

// Input download
elseif ($module=='download' AND $act=='input'){
	$lokasiFile = $_FILES['fupload']['tmp_name'];
	$namaFile   = $_FILES['fupload']['name'];
	$typeFile	= $_FILES['fupload']['type'];
	$sizeFile	= $_FILES['fupload']['size'];

	if (!empty($lokasiFile)){
		move_uploaded_file($lokasiFile, "../../../file_downloads/$namaFile");
		mysql_query("INSERT INTO tdownload( judul,
											namafile,
											type,
											size,
											tgl_posting,
											jam,
											aktif,
											hits,
											id_user,
											lastUpdate) 
									VALUES ('$_POST[judul]',
											'$namaFile',
											'$typeFile',
											'$sizeFile',
											'$tgl_sekarang',
											'$jam_sekarang',
											'$_POST[aktif]',
											'0',
											'$_SESSION[idUser]',
											'$_SESSION[idUser]')");
	}
	header('location:../../master.php?module=download');
}

// Update donwload
elseif ($module=='download' AND $act=='update'){
	$lokasiFile = $_FILES['fupload']['tmp_name'];
	$namaFile   = $_FILES['fupload']['name'];
	$typeFile	= $_FILES['fupload']['type'];
	$sizeFile	= $_FILES['fupload']['size'];
	
	// Jika file upload kosong
	if (empty($lokasiFile)){
		mysql_query("UPDATE tdownload SET judul = '$_POST[judul]', aktif = '$_POST[aktif]' WHERE id_download = '$_POST[id]'");
	}
	else{
		$data = mysql_fetch_array(mysql_query("SELECT namafile FROM tdownload WHERE id_download = '$_POST[id]'"));
		if ($data[namafile]==''){
			mysql_query("UPDATE tdownload SET 	judul     	= '$_POST[judul]',
												namafile	= '$namaFile',
												type		= '$typeFile',
												size		= '$sizeFile',
												aktif		= '$_POST[aktif]',
												lastUpdate	= '$_SESSION[idUser]'
												WHERE id_download = '$_POST[id]'");
		}
		else{
			$file = $data[namafile];
			$hapusFile = unlink("../../../file_downloads/$file");
			if ($hapusFile){
				move_uploaded_file($lokasiFile, "../../../file_downloads/$namaFile");
				mysql_query("UPDATE tdownload SET 	judul     	= '$_POST[judul]',
													namafile	= '$namaFile',
													type		= '$typeFile',
													size		= '$sizeFile',
													aktif		= '$_POST[aktif]',
													lastUpdate	= '$_SESSION[idUser]'
													WHERE id_download = '$_POST[id]'");
			}
		}
	}
	header('location:../../master.php?module=download');
}
?>
