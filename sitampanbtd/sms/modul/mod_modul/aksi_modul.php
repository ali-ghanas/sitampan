<?php
session_start();
include "../../../koneksi/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus modul
if ($module=='modul' AND $act=='hapus'){
	mysql_query("DELETE FROM tmodule WHERE IdModule='$_GET[id]'");
	header('location:../../master.php?module=modul');
}

// Input modul
elseif ($module=='modul' AND $act=='input'){
	// Cari angka urutan terakhir
	$u = mysql_query("SELECT Sort FROM tmodule ORDER by Sort DESC");
	$d = mysql_fetch_array($u);
	$sort = $d[Sort]+1;

	// Input data modul
	mysql_query("INSERT INTO tmodule(ModuleName,
									Link,
									Publish,
									Active,
									Status,
									Sort) 
							VALUES(	'$_POST[ModuleName]',
									'$_POST[Link]',
									'$_POST[Publish]',
									'$_POST[Active]',
									'$_POST[Status]',
									'$sort')");
	header('location:../../master.php?module=modul');
}

// Update modul
elseif ($module=='modul' AND $act=='update'){
	mysql_query("UPDATE tmodule SET ModuleName = '$_POST[ModuleName]',
									Link       = '$_POST[Link]',
									Publish    = '$_POST[Publish]',
									Active     = '$_POST[Active]',
									Status     = '$_POST[Status]',
									Sort	   = '$_POST[Sort]'  
									WHERE IdModule   = '$_POST[id]'");
	header('location:../../master.php?module=modul');
}
?>
