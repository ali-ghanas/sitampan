<?php
$level="1,2,3,4";
include("inc/login.php");
include("dependencies.php");
$filefetcher="ubahkatasandi.inc.php";
$filefetchercarrierubah=
	"ffswubahcase=saatproses&".
	"namsubmitubahdatapengguna=ok&".
	"namtextubahpenggunasandilama='+document.getElementById('namtextubahpenggunasandilama').value+'&".
	"namtextubahpenggunasandibaru='+document.getElementById('namtextubahpenggunasandibaru').value+'&".
	"namtextubahpenggunasandibaruulangi='+document.getElementById('namtextubahpenggunasandibaruulangi').value+'";
$loadingtime=0;
?>

<?php
$nambiggie[text]="Ubah Kata Sandi";
$nambiggie[slices]="slices/forubahkatasandi.jpg";
?>

<?php
if ($_POST["namsubmitubahdatapengguna"]=="ok") {
	sleep($loadingtime);
	if (!empty($_POST["namtextubahpenggunasandilama"])&&!empty($_POST["namtextubahpenggunasandibaru"])&&
		!empty($_POST["namtextubahpenggunasandibaruulangi"])) {
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Ubah Kata Sandi: Ubah","RUN","1","","");
		$ubahpenggunasandilama=md5(trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenggunasandilama"]))));
		$ubahpenggunasandibaru=md5(trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenggunasandibaru"]))));
		$ubahpenggunasandibaruulangi=md5(trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenggunasandibaruulangi"]))));
		if ($ubahpenggunasandibaru==$ubahpenggunasandibaruulangi) {
			unset($selectfromtblpengguna); unset($selectfromtblpenggunaresult);
			$selectfromtblpengguna=mysql_query("select penggunalevel from tblpengguna where penggunaid='".$_SESSION["penggunaid"]."' and penggunasandi='".$ubahpenggunasandilama."'");
			$selectfromtblpenggunaresult=mysql_num_rows($selectfromtblpengguna);
			if ($selectfromtblpenggunaresult>0) {
				$updatetblpengguna=mysql_query("update tblpengguna set
					penggunasandi='".$ubahpenggunasandibaru."'
					where penggunaid='".$_SESSION["penggunaid"]."'
				");
				if ($updatetblpengguna) {
					$_SESSION["penggunasandi"]=$ubahpenggunasandibaru;
					$pesanpesan=$statuspwd[21];
					funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBUPD","1","tblpengguna",$_SESSION["penggunaid"]);
				} else { $pesanpesan=$statusdb[32]; }
			} else { $pesanpesan=$statuspwd[311]; }
		} else { $pesanpesan=$statuspwd[312]; }
	} else { $pesanpesan=$statusdb[322]; }
}
?>




<?php
switch($ffswubahcase) {
case "saatproses":
include("ubahkatasandi_ubah.php");
break;
}
?>


<?php function funhelptip($asd) {

switch($asd) {
case "1": echo("<span class='clahelptip'>Masukkan kata sandi lama yang ingin anda ganti (wajib diisi).</span>"); break;
case "2": echo("<span class='clahelptip'>Masukkan kata sandi terbaru yang ingin anda gunakan (wajib diisi).</span>"); break;
case "3": echo("<span class='clahelptip'>Ulangi masukkan kata sandi baru anda (wajib diisi).</span>"); break;

} } ?>