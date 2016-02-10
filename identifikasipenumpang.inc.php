<?php
$level="1,2,3";
include("inc/login.php");
include("dependencies.php");
$filefetcher="identifikasipenumpang.inc.php";
$filefetchercarriersaring=
"namtextsaringpenumpangnama='+document.getElementById('namtextsaringpenumpangnama').value+'&".
"namtextsaringpenumpangjeniskelamin='+document.getElementById('namtextsaringpenumpangjeniskelamin').value+'&".
"namtextsaringpenumpangpasporno='+document.getElementById('namtextsaringpenumpangpasporno').value+'&".
"namtextsaringpenumpangwaktulahirtanggal='+document.getElementById('namtextsaringpenumpangwaktulahirtanggal').value+'&".
"namtextsaringpenumpangwaktulahirbulan='+document.getElementById('namtextsaringpenumpangwaktulahirbulan').value+'&".
"namtextsaringpenumpangwaktulahirtahun='+document.getElementById('namtextsaringpenumpangwaktulahirtahun').value+'&".
"namtextsaringpenumpangkebangsaan='+document.getElementById('namtextsaringpenumpangkebangsaan').value+'&".
"namtextsaringpenumpangatensistatus='+document.getElementById('namtextsaringpenumpangatensistatus').value+'&".
"namtexttampilan='+document.getElementById('namtexttampilan').value+'";
$filefetchercarrierbuat=
"ffswbuatcase=saatproses&".
"namsubmitbuatdatapribadipenumpang=ok&".
"namtextbuatpenumpangnama='+document.getElementById('namtextbuatpenumpangnama').value+'&".
"namtextbuatpenumpangjeniskelamin='+document.getElementById('namtextbuatpenumpangjeniskelamin').value+'&".
"namtextbuatpenumpangtempatlahir='+document.getElementById('namtextbuatpenumpangtempatlahir').value+'&".
"namtextbuatpenumpangwaktulahirtanggal='+document.getElementById('namtextbuatpenumpangwaktulahirtanggal').value+'&".
"namtextbuatpenumpangwaktulahirbulan='+document.getElementById('namtextbuatpenumpangwaktulahirbulan').value+'&".
"namtextbuatpenumpangwaktulahirtahun='+document.getElementById('namtextbuatpenumpangwaktulahirtahun').value+'&".
"namtextbuatpenumpangagama='+document.getElementById('namtextbuatpenumpangagama').value+'&".
"namtextbuatpenumpangalamatjalan='+encodeURI(document.getElementById('namtextbuatpenumpangalamatjalan').value)+'&".
"namtextbuatpenumpangalamatkota='+document.getElementById('namtextbuatpenumpangalamatkota').value+'&".
"namtextbuatpenumpangalamatkodepos='+document.getElementById('namtextbuatpenumpangalamatkodepos').value+'&".
"namtextbuatpenumpangalamatnotel='+document.getElementById('namtextbuatpenumpangalamatnotel').value+'&".
"namtextbuatpenumpangatensistatus='+document.getElementById('namtextbuatpenumpangatensistatus').value+'&".
"namtextbuatpenumpangatensiketerangan='+encodeURI(document.getElementById('namtextbuatpenumpangatensiketerangan').value)+'&".
"namtextbuatpenumpangpasporno='+document.getElementById('namtextbuatpenumpangpasporno').value+'&".
"namtextbuatpenumpangpasporpoi='+document.getElementById('namtextbuatpenumpangpasporpoi').value+'&".
"namtextbuatpenumpangpaspordoitanggal='+document.getElementById('namtextbuatpenumpangpaspordoitanggal').value+'&".
"namtextbuatpenumpangpaspordoibulan='+document.getElementById('namtextbuatpenumpangpaspordoibulan').value+'&".
"namtextbuatpenumpangpaspordoitahun='+document.getElementById('namtextbuatpenumpangpaspordoitahun').value+'&".
"namtextbuatpenumpangkebangsaan='+document.getElementById('namtextbuatpenumpangkebangsaan').value+'&".
"namtextbuatpenumpangciriciri='+encodeURI(document.getElementById('namtextbuatpenumpangciriciri').value)+'&".
"namtexttmplokasifotobinary1='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttmplokasifotobinary1').value+'&".
"namtexttmplokasifotobinary2='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttmplokasifotobinary2').value+'&".
"namtexttypefoto='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttypefoto').value+'&".
"namtexttmplokasifotopasporbinary1='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttmplokasifotopasporbinary1').value+'&".
"namtexttmplokasifotopasporbinary2='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttmplokasifotopasporbinary2').value+'&".
"namtexttypefotopaspor='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttypefotopaspor').value+'";
$filefetchercarrierubah=
"ffswubahcase=saatproses&".
"namsubmitubahdatapribadipenumpang=ok&".
"namtextubahpenumpangnama='+document.getElementById('namtextubahpenumpangnama').value+'&".
"namtextubahpenumpangjeniskelamin='+document.getElementById('namtextubahpenumpangjeniskelamin').value+'&".
"namtextubahpenumpangtempatlahir='+document.getElementById('namtextubahpenumpangtempatlahir').value+'&".
"namtextubahpenumpangwaktulahirtanggal='+document.getElementById('namtextubahpenumpangwaktulahirtanggal').value+'&".
"namtextubahpenumpangwaktulahirbulan='+document.getElementById('namtextubahpenumpangwaktulahirbulan').value+'&".
"namtextubahpenumpangwaktulahirtahun='+document.getElementById('namtextubahpenumpangwaktulahirtahun').value+'&".
"namtextubahpenumpangagama='+document.getElementById('namtextubahpenumpangagama').value+'&".
"namtextubahpenumpangalamatjalan='+encodeURI(document.getElementById('namtextubahpenumpangalamatjalan').value)+'&".
"namtextubahpenumpangalamatkota='+document.getElementById('namtextubahpenumpangalamatkota').value+'&".
"namtextubahpenumpangalamatkodepos='+document.getElementById('namtextubahpenumpangalamatkodepos').value+'&".
"namtextubahpenumpangalamatnotel='+document.getElementById('namtextubahpenumpangalamatnotel').value+'&".
"namtextubahpenumpangatensistatus='+document.getElementById('namtextubahpenumpangatensistatus').value+'&".
"namtextubahpenumpangatensiketerangan='+encodeURI(document.getElementById('namtextubahpenumpangatensiketerangan').value)+'&".
"namtextubahpenumpangpasporno='+document.getElementById('namtextubahpenumpangpasporno').value+'&".
"namtextubahpenumpangpasporpoi='+document.getElementById('namtextubahpenumpangpasporpoi').value+'&".
"namtextubahpenumpangpaspordoitanggal='+document.getElementById('namtextubahpenumpangpaspordoitanggal').value+'&".
"namtextubahpenumpangpaspordoibulan='+document.getElementById('namtextubahpenumpangpaspordoibulan').value+'&".
"namtextubahpenumpangpaspordoitahun='+document.getElementById('namtextubahpenumpangpaspordoitahun').value+'&".
"namtextubahpenumpangkebangsaan='+document.getElementById('namtextubahpenumpangkebangsaan').value+'&".
"namtextubahpenumpangciriciri='+encodeURI(document.getElementById('namtextubahpenumpangciriciri').value)+'&".
"namtexttmplokasifotobinary1='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttmplokasifotobinary1').value+'&".
"namtexttmplokasifotobinary2='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttmplokasifotobinary2').value+'&".
"namtexttypefoto='+document.getElementById('namiframefoto').contentWindow.document.getElementById('namtexttypefoto').value+'&".
"namtexttmplokasifotopasporbinary1='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttmplokasifotopasporbinary1').value+'&".
"namtexttmplokasifotopasporbinary2='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttmplokasifotopasporbinary2').value+'&".
"namtexttypefotopaspor='+document.getElementById('namiframefotopaspor').contentWindow.document.getElementById('namtexttypefotopaspor').value+'";
$loadingtime=0;
$pesanpesan=ijinkan(
	"namsubmitbuatdatapribadipenumpang=1,2;".
	"namsubmitubahdatapribadipenumpang=1,2;".
	"tandahapus=1"
);
?>

<?php
$nambiggie[text]="Identifikasi Penumpang";
$nambiggie[slices]="slices/foridentifikasipenumpang.jpg";
?>

<?php
if ($_POST["namsubmitbuatdatapribadipenumpang"]=="ok") {
	sleep($loadingtime);
	if (!empty($_POST["namtextbuatpenumpangnama"])&&!empty($_POST["namtextbuatpenumpangjeniskelamin"])) {
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Data Penumpang: Buat Baru","RUN","1","","");
		$buatpenumpangid=funtheid("pnp");
		$buatpenumpangnama=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangnama"]))); $buatpenumpangnama=ucwords($buatpenumpangnama);
		$buatpenumpangjeniskelamin=$_POST["namtextbuatpenumpangjeniskelamin"];
		$buatpenumpangtempatlahir=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangtempatlahir"]))); $buatpenumpangtempatlahir=ucwords($buatpenumpangtempatlahir);
		$buatpenumpangwaktulahirtahun=$_POST["namtextbuatpenumpangwaktulahirtahun"];
		$buatpenumpangwaktulahirbulan=$_POST["namtextbuatpenumpangwaktulahirbulan"];
		$buatpenumpangwaktulahirtanggal=$_POST["namtextbuatpenumpangwaktulahirtanggal"];
		$buatpenumpangwaktulahir=$buatpenumpangwaktulahirtahun."-".$buatpenumpangwaktulahirbulan."-".$buatpenumpangwaktulahirtanggal;
		$buatpenumpangagama=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangagama"]))); $buatpenumpangagama=ucwords($buatpenumpangagama);
		$buatpenumpangalamatjalan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangalamatjalan"]))); $buatpenumpangalamatjalan=ucwords($buatpenumpangalamatjalan);
		$buatpenumpangalamatkota=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangalamatkota"]))); $buatpenumpangalamatkota=ucwords($buatpenumpangalamatkota);
		$buatpenumpangalamatkodepos=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangalamatkodepos"])));
		$buatpenumpangalamatnotel=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangalamatnotel"])));
		$buatpenumpangatensistatus=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangatensistatus"])));
		$buatpenumpangatensiketerangan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangatensiketerangan"]))); $buatpenumpangatensiketerangan=ucwords($buatpenumpangatensiketerangan);
		
		$buatpenumpangpasporno=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangpasporno"])));
		$buatpenumpangpasporpoi=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangpasporpoi"])));
		$buatpenumpangpaspordoitahun=$_POST["namtextbuatpenumpangpaspordoitahun"];
		$buatpenumpangpaspordoibulan=$_POST["namtextbuatpenumpangpaspordoibulan"];
		$buatpenumpangpaspordoitanggal=$_POST["namtextbuatpenumpangpaspordoitanggal"];
		$buatpenumpangpaspordoi=$buatpenumpangpaspordoitahun."-".$buatpenumpangpaspordoibulan."-".$buatpenumpangpaspordoitanggal;
		$buatpenumpangkebangsaan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangkebangsaan"])));
		$buatpenumpangciriciri=trim(strip_tags(funbuangkarakteraneh($_POST["namtextbuatpenumpangciriciri"]))); $buatpenumpangciriciri=ucwords($buatpenumpangciriciri);
		
		$proses=$_POST["proses"];
		switch($proses) {
			case "buatdata":
				$insertintotblpenumpangprofil=mysql_query("insert into tblpenumpangprofil (
					penumpangid,
					penumpangnama,
					penumpangjeniskelamin,
					penumpangtempatlahir,
					penumpangwaktulahir,
					penumpangagama,
					penumpangalamatjalan,
					penumpangalamatkota,
					penumpangalamatkodepos,
					penumpangalamatnotel,
					penumpangatensistatus,
					penumpangatensiketerangan,
					penumpangpasporno,
					penumpangpasporpoi,
					penumpangpaspordoi,
					penumpangkebangsaan,
					penumpangciriciri
					) values (
						'".$buatpenumpangid."',
						'".$buatpenumpangnama."',
						'".$buatpenumpangjeniskelamin."',
						'".$buatpenumpangtempatlahir."',
						'".$buatpenumpangwaktulahir."',
						'".$buatpenumpangagama."',
						'".$buatpenumpangalamatjalan."',
						'".$buatpenumpangalamatkota."',
						'".$buatpenumpangalamatkodepos."',
						'".$buatpenumpangalamatnotel."',
						'".$buatpenumpangatensistatus."',
						'".$buatpenumpangatensiketerangan."'
						'".$buatpenumpangpasporno."',
						'".$buatpenumpangpasporpoi."',
						'".$buatpenumpangpaspordoi."',
						'".$buatpenumpangkebangsaan."',
						'".$buatpenumpangciriciri."'
					)
				");
		
				if (!empty($_POST["namtexttmplokasifotobinary1"])) {
					$buatpenumpangfotobinary1=funinsertimgtomysql($_POST["namtexttmplokasifotobinary1"]);
					$buatpenumpangfotobinary2=funinsertimgtomysql($_POST["namtexttmplokasifotobinary2"]);
					$insertintotblpenumpangfoto=mysql_query("insert into tblpenumpangfoto (
						fotoid,
						fotobinary1,
						fotobinary2,
						fotobinarytype
						) values (
							'".$buatpenumpangid."',
							'".$buatpenumpangfotobinary1."',
							'".$buatpenumpangfotobinary2."',
							'".$_POST["namtexttypefoto"]."'
						)
					");
					unlink($_POST["namtexttmplokasifotobinary1"]); unlink($_POST["namtexttmplokasifotobinary2"]);
					if ($insertintotblpenumpangfoto) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblpenumpangfoto",$buatpenumpangid); }
				}
				
				if (!empty($_POST["namtexttmplokasifotopasporbinary1"])) {
					$buatpenumpangfotopasporbinary1=funinsertimgtomysql($_POST["namtexttmplokasifotopasporbinary1"]);
					$buatpenumpangfotopasporbinary2=funinsertimgtomysql($_POST["namtexttmplokasifotopasporbinary2"]);
					$insertintotblpenumpangfotopaspor=mysql_query("insert into tblpenumpangfotopaspor (
						fotoid,
						fotopasporbinary1,
						fotopasporbinary2,
						fotopasportype
						) values (
							'".$buatpenumpangid."',
							'".$buatpenumpangfotopasporbinary1."',
							'".$buatpenumpangfotopasporbinary2."',
							'".$_POST["namtexttypefotopaspor"]."'
						)
					");
					unlink($_POST["namtexttmplokasifotopasporbinary1"]); unlink($_POST["namtexttmplokasifotopasporbinary2"]);
					if ($insertintotblpenumpangfotopaspor) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblpenumpangfotopaspor",$buatpenumpangid); }
				}
				
				if ($insertintotblpenumpangprofil) {
					$pesanpesan=$statusdb[22];
					funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblpenumpangprofil",$buatpenumpangid);
				}
				else { $pesanpesan=$statusdb[32]; }
			break;
		}
	}
	else { $pesanpesan=$statusdb[322]; }
}
?>

<?php
if ($_POST["namsubmitubahdatapribadipenumpang"]=="ok") {
	sleep($loadingtime);
	if (!empty($_POST["namtextubahpenumpangnama"])&&!empty($_POST["namtextubahpenumpangjeniskelamin"])) {
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Data Penumpang: Ubah Data","RUN","1","","");
		$ubahpenumpangnama=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangnama"]))); $ubahpenumpangnama=ucwords($ubahpenumpangnama);
		$ubahpenumpangjeniskelamin=$_POST["namtextubahpenumpangjeniskelamin"];
		$ubahpenumpangtempatlahir=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangtempatlahir"]))); $ubahpenumpangtempatlahir=ucwords($ubahpenumpangtempatlahir);
		$ubahpenumpangwaktulahirtahun=$_POST["namtextubahpenumpangwaktulahirtahun"];
		$ubahpenumpangwaktulahirbulan=$_POST["namtextubahpenumpangwaktulahirbulan"];
		$ubahpenumpangwaktulahirtanggal=$_POST["namtextubahpenumpangwaktulahirtanggal"];
		$ubahpenumpangwaktulahir=$ubahpenumpangwaktulahirtahun."-".$ubahpenumpangwaktulahirbulan."-".$ubahpenumpangwaktulahirtanggal;
		$ubahpenumpangagama=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangagama"]))); $ubahpenumpangagama=ucwords($ubahpenumpangagama);
		$ubahpenumpangalamatjalan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangalamatjalan"]))); $ubahpenumpangalamatjalan=ucwords($ubahpenumpangalamatjalan);
		$ubahpenumpangalamatkota=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangalamatkota"]))); $ubahpenumpangalamatkota=ucwords($ubahpenumpangalamatkota);
		$ubahpenumpangalamatkodepos=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangalamatkodepos"])));
		$ubahpenumpangalamatnotel=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangalamatnotel"])));
		$ubahpenumpangatensistatus=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangatensistatus"])));
		$ubahpenumpangatensiketerangan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangatensiketerangan"]))); $ubahpenumpangatensiketerangan=ucwords($ubahpenumpangatensiketerangan);
		
		$ubahpenumpangpasporno=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangpasporno"])));
		$ubahpenumpangpasporpoi=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangpasporpoi"])));
		$ubahpenumpangpaspordoitahun=$_POST["namtextubahpenumpangpaspordoitahun"];
		$ubahpenumpangpaspordoibulan=$_POST["namtextubahpenumpangpaspordoibulan"];
		$ubahpenumpangpaspordoitanggal=$_POST["namtextubahpenumpangpaspordoitanggal"];
		$ubahpenumpangpaspordoi=$ubahpenumpangpaspordoitahun."-".$ubahpenumpangpaspordoibulan."-".$ubahpenumpangpaspordoitanggal;
		$ubahpenumpangkebangsaan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangkebangsaan"])));
		$ubahpenumpangciriciri=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangciriciri"]))); $ubahpenumpangciriciri=ucwords($ubahpenumpangciriciri);

		$proses=$_POST["proses"];
		switch($proses) {
			case "ubahdata":
				$updatetblpenumpangprofil=mysql_query("update tblpenumpangprofil set
					penumpangnama='".$ubahpenumpangnama."',
					penumpangjeniskelamin='".$ubahpenumpangjeniskelamin."',
					penumpangtempatlahir='".$ubahpenumpangtempatlahir."',
					penumpangwaktulahir='".$ubahpenumpangwaktulahir."',
					penumpangagama='".$ubahpenumpangagama."',
					penumpangalamatjalan='".$ubahpenumpangalamatjalan."',
					penumpangalamatkota='".$ubahpenumpangalamatkota."',
					penumpangalamatkodepos='".$ubahpenumpangalamatkodepos."',
					penumpangalamatnotel='".$ubahpenumpangalamatnotel."',
					penumpangatensistatus='".$ubahpenumpangatensistatus."',
					penumpangatensiketerangan='".$ubahpenumpangatensiketerangan."',
					penumpangpasporno='".$ubahpenumpangpasporno."',
					penumpangpasporpoi='".$ubahpenumpangpasporpoi."',
					penumpangpaspordoi='".$ubahpenumpangpaspordoi."',
					penumpangkebangsaan='".$ubahpenumpangkebangsaan."',
					penumpangciriciri='".$ubahpenumpangciriciri."'
					where penumpangid='".$linubahdatapribadipenumpang."'
				");
				if ($updatetblpenumpangprofil) {
					$pesanpesan=$statusdb[22];
					funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBUPD","1","tblpenumpangprofil",$linubahdatapribadipenumpang);
				}
				else { $pesanpesan=$statusdb[32]; }

				if (file_exists($_POST["namtexttmplokasifotobinary1"])) {
					$ubahpenumpangfotobinary1=funinsertimgtomysql($_POST["namtexttmplokasifotobinary1"]);
					$ubahpenumpangfotobinary2=funinsertimgtomysql($_POST["namtexttmplokasifotobinary2"]);
					$deletefromtblpenumpangfoto=mysql_query("delete from tblpenumpangfoto where fotoid='".$linubahdatapribadipenumpang."'");
					$insertintotblpenumpangfoto=mysql_query("insert into tblpenumpangfoto (
						fotoid,
						fotobinary1,
						fotobinary2,
						fotobinarytype
						) values (
							'".$linubahdatapribadipenumpang."',
							'".$ubahpenumpangfotobinary1."',
							'".$ubahpenumpangfotobinary2."',
							'".$_POST["namtexttypefoto"]."'
						)
					");
					unlink($_POST["namtexttmplokasifotobinary1"]); unlink($_POST["namtexttmplokasifotobinary2"]);
					if ($insertintotblpenumpangfoto) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblpenumpangfoto",$linubahdatapribadipenumpang); }
				}
				
				if (file_exists($_POST["namtexttmplokasifotobinary1"])||file_exists($_POST["namtexttmplokasifotopasporbinary1"])) {
					$ubahpenumpangfotopasporbinary1=funinsertimgtomysql($_POST["namtexttmplokasifotopasporbinary1"]);
					$ubahpenumpangfotopasporbinary2=funinsertimgtomysql($_POST["namtexttmplokasifotopasporbinary2"]);
					$deletefromtblpenumpangfotopaspor=mysql_query("delete from tblpenumpangfotopaspor where fotoid='".$linubahdatapribadipenumpang."'");
					$insertintotblpenumpangfotopaspor=mysql_query("insert into tblpenumpangfotopaspor (
						fotoid,
						fotopasporbinary1,
						fotopasporbinary2,
						fotopasportype
						) values (
							'".$linubahdatapribadipenumpang."',
							'".$ubahpenumpangfotopasporbinary1."',
							'".$ubahpenumpangfotopasporbinary2."',
							'".$_POST["namtexttypefotopaspor"]."'
						)
					");
					unlink($_POST["namtexttmplokasifotopasporbinary1"]); unlink($_POST["namtexttmplokasifotopasporbinary2"]);
					if ($insertintotblpenumpangfotopaspor) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblpenumpangfotopaspor",$linubahdatapribadipenumpang); }
				}
			break;
		}
	}
	else { $pesanpesan=$statusdb[322]; }
}
?>

<?php
if ($_POST["tandahapus"]==1) {
	funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Data Pengguna: Hapus","RUN","1","","");
	$deletefromtblpenumpangprofil=mysql_query("delete from tblpenumpangprofil where penumpangid='".$linhapusdatapribadipenumpang."' limit 1");
	if ($deletefromtblpenumpangprofil) {
		$pesanpesan=$statusdb[23];
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBDEL","1","tblpenumpangprofil",$linhapusdatapribadipenumpang);
	}
	else { $pesanpesan=$statusdb[33]; }

	$deletefromtblpenumpangprofil=mysql_query("delete from tblpenumpangfoto where fotoid='".$linhapusdatapribadipenumpang."'");
	if ($deletefromtblpenumpangprofil) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBDEL","1","tblpenumpangfoto",$linhapusdatapribadipenumpang); }
}
?>

<?php
if ($changesort=="ok") {
	if (empty($sortlist)) { $sortlist="asc"; }
	else if ($sortlist=="asc") { $sortlist="desc"; }
	else { $sortlist="asc"; }
}

if (empty($orderlist)) { $sortlist="desc"; $orderlist="penumpangid"; }
elseif ($orderlist!=$oldorderlist&&isset($oldorderlist)) { $sortlist="asc"; $oldorderlist=$orderlist; $orderlist=$orderlist; }

if (!empty($namtextsaringpenumpangwaktulahirtanggal)||
!empty($namtextsaringpenumpangwaktulahirbulan)||
!empty($namtextsaringpenumpangwaktulahirtahun)) {
	if (empty($namtextsaringpenumpangwaktulahirtahun)) { $namtextsaringpenumpangwaktulahirtahunresult="%-"; $thnhub=""; }
	else { $namtextsaringpenumpangwaktulahirtahunresult=$namtextsaringpenumpangwaktulahirtahun; $thnhub="-"; }
	if (empty($namtextsaringpenumpangwaktulahirbulan)) { $namtextsaringpenumpangwaktulahirbulanresult="%"; }
	else { $namtextsaringpenumpangwaktulahirbulanresult=$namtextsaringpenumpangwaktulahirbulan; }
	if (empty($namtextsaringpenumpangwaktulahirtanggal)) { $namtextsaringpenumpangwaktulahirtanggalresult="-%"; $tglhub=""; }
	else { $namtextsaringpenumpangwaktulahirtanggalresult=$namtextsaringpenumpangwaktulahirtanggal; $tglhub="-"; }
	$namtextsaringpenumpangwaktulahir=$namtextsaringpenumpangwaktulahirtahunresult.$thnhub.$namtextsaringpenumpangwaktulahirbulanresult.$tglhub.$namtextsaringpenumpangwaktulahirtanggalresult;
}

$av=array(
	$namtextsaringpenumpangnama,
	$namtextsaringpenumpangjeniskelamin,
	$namtextsaringpenumpangpasporno,
	$namtextsaringpenumpangwaktulahir,
	$namtextsaringpenumpangkebangsaan,
	$namtextsaringpenumpangatensistatus
	);
$at=array(
	"penumpangnama",
	"penumpangjeniskelamin",
	"penumpangpasporno",
	"penumpangwaktulahir",
	"penumpangkebangsaan",
	"penumpangatensistatus"
	);
$tname="tblpenumpangprofil";
$order=$orderlist." ".$sortlist;
$group="";
$carrier="namtextsaringpenumpangnama=".$namtextsaringpenumpangnama."&".
	"namtextsaringpenumpangjeniskelamin=".$namtextsaringpenumpangjeniskelamin."&".
	"namtextsaringpenumpangpasporno=".$namtextsaringpenumpangpasporno."&".
	"namtextsaringpenumpangwaktulahirtanggal=".$namtextsaringpenumpangwaktulahirtanggal."&".
	"namtextsaringpenumpangwaktulahirbulan=".$namtextsaringpenumpangwaktulahirbulan."&".
	"namtextsaringpenumpangwaktulahirtahun=".$namtextsaringpenumpangwaktulahirtahun."&".
	"namtextsaringpenumpangkebangsaan=".$namtextsaringpenumpangkebangsaan."&".
	"namtextsaringpenumpangatensistatus=".$namtextsaringpenumpangatensistatus."&".
	"namtexttampilan=".$namtexttampilan;
$carriersort="page=".$page."&limitawal=".$limitawal."&limit=".$limit;
$carriersort=$carriersort."&sortlist=".$sortlist."&orderlist=".$orderlist;

require_once($deflink."inc/select.php");
?>

<?php
switch($ffswitch) {
	case "ffswtabel":
		include("identifikasipenumpang_tabel.php");
	break;
	case "ffswbuat":
		$ffswbuatcase="tampilanawal";
	break;
	case "ffswubah":
		$ffswubahcase="tampilanawal";
	break;
}
?>

<?php
switch($ffswbuatcase) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("identifikasipenumpang_buat.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("identifikasipenumpang_buat.php");
break;
}
?>

<?php
switch($ffswubahcase) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("identifikasipenumpang_ubah.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("identifikasipenumpang_ubah.php");
break;
}
?>


<?php function funhelptip($asd) {

switch($asd) {
case "2": echo("<span class='clahelptip'>Nama penumpang yang bersangkutan (wajib diisi).<br><br>Contoh: <strong>Dewi Prita Maulina</strong></span>"); break;
case "3": echo("<span class='clahelptip'>Jenis kelamin penumpang (wajib diisi).<br><br>Contoh: <strong>Perempuan</strong></span>"); break;
case "4": echo("<span class='clahelptip'>Daerah / kota tempat penumpang dilahirkan.<br><br>Contoh: <strong>Jakarta</strong></span>"); break;
case "5": echo("<span class='clahelptip'>Tanggal, bulan, dan tahun kelahiran penumpang.<br><br>Contoh: <strong>07 - 12 - 1981</strong></span>"); break;
case "6": echo("<span class='clahelptip'>Agama yang dianut oleh penumpang bersangkutan.<br><br>Contoh: <strong>Islam</strong></span>"); break;
case "10": echo("<span class='clahelptip'>Alamat tempat tinggal penumpang.<br><br>Contoh: <br><strong>Jl. Kesemek No. 21<br>Rt. 01/02<br>Kel. Pondok Cina - Kec. Beji</strong></span>"); break;
case "11": echo("<span class='clahelptip'>Kota tempat tinggal penumpang.<br><br>Contoh: <strong>Depok</strong></span>"); break;
case "12": echo("<span class='clahelptip'>Kode pos tempat tinggal penumpang.<br><br>Contoh: <strong>20113</strong></span>"); break;
case "13": echo("<span class='clahelptip'>Nomor telepon rumah / telepon genggam yang aktif.<br><br>Contoh: <strong>0217520653</strong><br><em>Tanpa spasi atau tanda kurung.</em></span>"); break;

case "21": echo("<span class='clahelptip'>Nomor paspor penumpang.<br><br>Contoh: <strong>U865827</strong><br><em>Tanpa spasi atau tanda kurung.</em></span>"); break;
case "22": echo("<span class='clahelptip'>Tempat diterbitkannya paspor penumpang yang bersangkutan.<br><br>Contoh: <strong>Medan</strong></span>"); break;
case "23": echo("<span class='clahelptip'>Tanggal, bulan, dan tahun diterbitkannya paspor penumpang yang bersangkutan.<br><br>Contoh: <strong>07 - 12 - 2010</strong></span>"); break;
case "24": echo("<span class='clahelptip'>Kebangsaan / kewarganegaraan penumpang bersangkutan.<br><br>Contoh: <strong>Depok</strong></span>"); break;
case "31": echo("<span class='clahelptip'>Ciri-ciri penumpang.<br><br>Contoh: <br><strong>Kulit sawo matang, Rambut lurus, dst.</strong></span>"); break;



} } ?>