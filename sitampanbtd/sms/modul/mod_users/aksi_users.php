<?php
error_reporting(0);
session_start();
include "../../../koneksi/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
	mysql_query("DELETE FROM tuser WHERE Username='$_GET[id]'");
	header('location:../../master.php?module=user');
}

// Input user
elseif ($module=='user' AND $act=='input'){
	$pass = md5($_POST[Password]);
	mysql_query("INSERT INTO tuser(Username,
								   Password,
								   nama_asfa,
								   email_asfa,
								   ponsel,
								   jabatan,
								   level) 
							VALUES('$_POST[Username]',
								   '$pass',
								   '$_POST[Name]',
								   '$_POST[Email]',
								   '$_POST[Ponsel]',
								   '$_POST[Position]',
								   '$_POST[Level]')");
	header('location:../../master.php?module=user');
}

// Update user
elseif ($module=='user' AND $act=='update'){
	if (empty($_POST[Password])) {
		mysql_query("UPDATE tuser SET Username	= '$_POST[Username]',
									nama_asfa	= '$_POST[Name]',
									email_asfa	= '$_POST[Email]',
									ponsel		= '$_POST[Ponsel]',
									jabatan		= '$_POST[Position]',
									level		= '$_POST[Level]'
									WHERE id_user = '$_POST[id]'");
	}
	else{
		$pass = md5($_POST[Password]);
		mysql_query("UPDATE tuser SET Username   = '$_POST[Username]',
                                 Password        = '$pass',
                                 nama_asfa	     = '$_POST[Name]',
                                 email_asfa      = '$_POST[Email]',  
								 ponsel			 = '$_POST[Ponsel]',
								 jabatan		 = '$_POST[Position]',
								 level			 = '$_POST[Level]'
                                 WHERE id_user	 = '$_POST[id]'");
	}
	header('location:../../master.php?module=user');
}

// Ubah Password
elseif ($module=='user' AND $act=='password'){
	$id = $_POST[id_user];
	$passwordLama = md5($_POST[PasswordLama]);
	$passwordBaru = md5($_POST[PasswordBaru]);
	$passwordBaru2 = md5($_POST[PasswordBaru2]);
	
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE id_user = '$id'"));
	if (empty($passwordLama) || empty($passwordBaru) || empty($passwordBaru2)){
		echo "Mohon isikan semua kolom<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
	}
	else{
		if ($passwordLama != $data[Password]){
			echo "Password Lama Anda salah<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		elseif ($passwordBaru != $passwordBaru2){
			echo "Password Baru dan Re-Type Password Baru tidak Cocok<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		else {
			mysql_query("UPDATE tuser SET Password = '$passwordBaru' WHERE id_user = '$id'");
			echo "Password Anda berhasil diubah";
			echo "<meta http-equiv='refresh' content='1 URL=../../master.php?module=user&act=password'>";
		}
	}
}
?>
