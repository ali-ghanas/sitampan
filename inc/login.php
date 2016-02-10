<?php
if (empty($perlu)||!isset($perlu)) {
	session_start();
	if (!empty($level)) {
		unset($otentikasi);
		$levelexp=explode(",",$level);
		$jmllevelexp=count($levelexp);
		for ($xx=0;$xx<$jmllevelexp;$xx++) {
			if ($levelexp[$xx]==$_SESSION["penggunalevel"]) { $otentikasi="ok"; }
		}
		if ($otentikasi!="ok") {
			header("location: beranda.php?error=1");
		}
	}
/*
	function cekpengguna($penggunaid,$penggunasandi,$penggunalevel) {
		if (!empty($penggunaid)&&!empty($penggunasandi)&&!empty($penggunalevel)) {
			require_once("inc/connect.php");
			$selectfromtblpengguna = mysql_query("select * from tblpengguna where penggunaid='".$penggunaid."' and penggunasandi='".$penggunasandi."' and penggunalevel='".$penggunalevel."'");
			$selectfromtblpenggunaresult = mysql_fetch_array($selectfromtblpengguna);
			if ($selectfromtblpenggunaresult>0) {
				if (!empty($level)) {
					unset($otentikasi);
					$levelexp=explode(",",$level);
					$jmllevelexp=count($levelexp);
					for ($xx=0;$xx<$jmllevelexp;$xx++) {
						if ($levelexp[$xx]==$_SESSION["penggunalevel"]) { $otentikasi="ok"; }
					}
					if ($otentikasi!="ok") { header("location: beranda.php?error=1"); }
				}
			} else { header("location: index.php?error=1"); }
		} else { header("location: index.php?error=1"); }
	}
	cekpengguna($_SESSION['penggunaid'],$_SESSION['penggunasandi'],$_SESSION['penggunalevel']);
*/
	function ijinkan($eksekusi) {
		$separatorexp=explode(";",$eksekusi);
		$jmlseparatorexp=count($separatorexp);
		for ($xx=0;$xx<$jmlseparatorexp;$xx++) {
			unset($otentikasi);
			$operatorexp=explode("=",$separatorexp[$xx]);
			$levelexp=explode(",",$operatorexp[1]);
			$jmllevelexp=count($levelexp);
			for ($yy=0;$yy<$jmllevelexp;$yy++) {
				if ($levelexp[$yy]==$_SESSION["penggunalevel"]) { $otentikasi="ok"; }
			}
			if ($otentikasi!="ok") {
				$eventexp=explode(",",$operatorexp[0]);
				$jmleventexp=count($eventexp);
				for ($zz=0;$zz<$jmleventexp;$zz++) {
					$event=$eventexp[$zz];
					if (!empty($_POST[$event])) {
						$_POST[$event]=false;
						$pesanpesan="Maaf. Anda tidak memiliki hak akses.";
					}
				}
			}
		}
		return $pesanpesan;
	}
}

/*
if (isset($_SESSION["namtextusername"])) {
	$selectfromtblpengguna=mysql_query("select penggunatingkat from tblpengguna where penggunaid='".$_SESSION["namtextusername"]."' and penggunakatasandi='".$_SESSION["namtextpassword"]."'");
	$selectfromtblpenggunaresult=mysql_num_rows($selectfromtblpengguna);
	if ($selectfromtblpenggunaresult<1) {
		session_unregister("namtextusername");
		session_unregister("namtextpassword");
		session_unregister("namtextlevel");
		session_destroy();
	}
}
*/

?>
