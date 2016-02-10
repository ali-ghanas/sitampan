<?php
$level="1,2,3";
include("inc/login.php");
include("dependencies.php");
$filefetcher="sumberdatakapal.inc.php";
$filefetchercarriersaringkapal=
"namtextsaringshipsailstatus='+document.getElementById('namtextsaringshipsailstatus').value+'&".
"namtextsaringshipname='+document.getElementById('namtextsaringshipname').value+'&".
"namtextsaringshipdepartureport='+document.getElementById('namtextsaringshipdepartureport').value+'&".
"namtextsaringshipdestinationport='+document.getElementById('namtextsaringshipdestinationport').value+'&".
"namtextsaringshipdeparturedatetanggal='+document.getElementById('namtextsaringshipdeparturedatetanggal').value+'&".
"namtextsaringshipdeparturedatebulan='+document.getElementById('namtextsaringshipdeparturedatebulan').value+'&".
"namtextsaringshipdeparturedatetahun='+document.getElementById('namtextsaringshipdeparturedatetahun').value+'&".
"namtextsaringshipdestinationdatetanggal='+document.getElementById('namtextsaringshipdestinationdatetanggal').value+'&".
"namtextsaringshipdestinationdatebulan='+document.getElementById('namtextsaringshipdestinationdatebulan').value+'&".
"namtextsaringshipdestinationdatetahun='+document.getElementById('namtextsaringshipdestinationdatetahun').value+'";
$filefetchercarriersaringpenumpang=
"namtextsaringpenumpangnama='+document.getElementById('namtextsaringpenumpangnama').value+'&".
"namtextsaringpenumpangjeniskelamin='+document.getElementById('namtextsaringpenumpangjeniskelamin').value+'&".
"namtextsaringpenumpangpasporno='+document.getElementById('namtextsaringpenumpangpasporno').value+'&".
"namtextsaringpenumpangwaktulahirtanggal='+document.getElementById('namtextsaringpenumpangwaktulahirtanggal').value+'&".
"namtextsaringpenumpangwaktulahirbulan='+document.getElementById('namtextsaringpenumpangwaktulahirbulan').value+'&".
"namtextsaringpenumpangwaktulahirtahun='+document.getElementById('namtextsaringpenumpangwaktulahirtahun').value+'&".
"namtextsaringpenumpangpasporpoi='+document.getElementById('namtextsaringpenumpangpasporpoi').value+'&".
"namtextsaringpenumpangpaspordoitanggal='+document.getElementById('namtextsaringpenumpangpaspordoitanggal').value+'&".
"namtextsaringpenumpangpaspordoibulan='+document.getElementById('namtextsaringpenumpangpaspordoibulan').value+'&".
"namtextsaringpenumpangpaspordoitahun='+document.getElementById('namtextsaringpenumpangpaspordoitahun').value+'&".
"namtextsaringpenumpangkebangsaan='+document.getElementById('namtextsaringpenumpangkebangsaan').value+'&".
"namtextsaringpenumpangremarks='+document.getElementById('namtextsaringpenumpangremarks').value+'";
$filefetchercarrierfitur1=
"namsubmitfitur1=ok&".
"namtextvarfitur1='+document.getElementById('namtextvarfitur1').value+'";
$filefetchercarrierubahpenumpang=
"ffswubahpenumpangcase=saatproses&".
"namsubmitubahdatapenumpang=ok&".
"namtextubahpenumpangnama='+document.getElementById('namtextubahpenumpangnama').value+'&".
"namtextubahpenumpangjeniskelamin='+document.getElementById('namtextubahpenumpangjeniskelamin').value+'&".
"namtextubahpenumpangwaktulahirtanggal='+document.getElementById('namtextubahpenumpangwaktulahirtanggal').value+'&".
"namtextubahpenumpangwaktulahirbulan='+document.getElementById('namtextubahpenumpangwaktulahirbulan').value+'&".
"namtextubahpenumpangwaktulahirtahun='+document.getElementById('namtextubahpenumpangwaktulahirtahun').value+'&".
"namtextubahpenumpangpasporno='+document.getElementById('namtextubahpenumpangpasporno').value+'&".
"namtextubahpenumpangpasporpoi='+document.getElementById('namtextubahpenumpangpasporpoi').value+'&".
"namtextubahpenumpangpaspordoitanggal='+document.getElementById('namtextubahpenumpangpaspordoitanggal').value+'&".
"namtextubahpenumpangpaspordoibulan='+document.getElementById('namtextubahpenumpangpaspordoibulan').value+'&".
"namtextubahpenumpangpaspordoitahun='+document.getElementById('namtextubahpenumpangpaspordoitahun').value+'&".
"namtextubahpenumpangkebangsaan='+document.getElementById('namtextubahpenumpangkebangsaan').value+'";
$loadingtime=0;
$pesanpesan=ijinkan(
	"tandahapus=1"
);
?>

<?php
$nambiggie[text]="Sumber Data";
$nambiggie[slices]="slices/forsumberdatakapal.jpg";
?>

<?php
if ($_POST["namsubmitubahdatapenumpang"]=="ok") {
	sleep($loadingtime);
	if (!empty($_POST["namtextubahpenumpangnama"])&&!empty($_POST["namtextubahpenumpangjeniskelamin"])) {
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Sumber Data Penumpang: Ubah Data","RUN","1","","");
		$ubahpenumpangnama=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangnama"]))); $ubahpenumpangnama=ucwords($ubahpenumpangnama);
		$ubahpenumpangjeniskelamin=$_POST["namtextubahpenumpangjeniskelamin"];
		$ubahpenumpangwaktulahirtahun=$_POST["namtextubahpenumpangwaktulahirtahun"];
		$ubahpenumpangwaktulahirbulan=$_POST["namtextubahpenumpangwaktulahirbulan"];
		$ubahpenumpangwaktulahirtanggal=$_POST["namtextubahpenumpangwaktulahirtanggal"];
		$ubahpenumpangwaktulahir=$ubahpenumpangwaktulahirtahun."-".$ubahpenumpangwaktulahirbulan."-".$ubahpenumpangwaktulahirtanggal;
		
		$ubahpenumpangpasporno=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangpasporno"])));
		$ubahpenumpangpasporpoi=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangpasporpoi"])));
		$ubahpenumpangpaspordoitahun=$_POST["namtextubahpenumpangpaspordoitahun"];
		$ubahpenumpangpaspordoibulan=$_POST["namtextubahpenumpangpaspordoibulan"];
		$ubahpenumpangpaspordoitanggal=$_POST["namtextubahpenumpangpaspordoitanggal"];
		$ubahpenumpangpaspordoi=$ubahpenumpangpaspordoitahun."-".$ubahpenumpangpaspordoibulan."-".$ubahpenumpangpaspordoitanggal;
		$ubahpenumpangkebangsaan=trim(strip_tags(funbuangkarakteraneh($_POST["namtextubahpenumpangkebangsaan"])));

		$proses=$_POST["proses"];
		switch($proses) {
			case "ubahdata":
				$updatetblanalisispenumpangsumber=mysql_query("update tblanalisispenumpangsumber set
					penumpangnama='".$ubahpenumpangnama."',
					penumpangjeniskelamin='".$ubahpenumpangjeniskelamin."',
					penumpangwaktulahir='".$ubahpenumpangwaktulahir."',
					penumpangpasporno='".$ubahpenumpangpasporno."',
					penumpangpasporpoi='".$ubahpenumpangpasporpoi."',
					penumpangpaspordoi='".$ubahpenumpangpaspordoi."',
					penumpangkebangsaan='".$ubahpenumpangkebangsaan."'
					where sumberid='".$linubahsumberdata."' and penumpangnama='".$linubahpenumpangnama."' and penumpangjeniskelamin='".$linubahpenumpangjeniskelamin."' and penumpangwaktulahir='".$linubahpenumpangwaktulahir."' and penumpangpasporno='".$linubahpenumpangpasporno."' and penumpangkebangsaan='".$linubahpenumpangkebangsaan."'
				");
				if ($updatetblanalisispenumpangsumber) {
					$pesanpesan=$statusdb[22];
					funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBUPD","1","tblanalisispenumpangsumber",$linubahsumberdata);
				}
				else { $pesanpesan=$statusdb[32]; }
			break;
		}
	}
	else { $pesanpesan=$statusdb[322]; }
}
?>

<?php
if ($_POST["tandahapus"]==1) {
	funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Sumber Data - Kapal: Hapus","RUN","1","","");
	$deletefromtblanalisispenumpangxls=mysql_query("delete from tblanalisispenumpangxls where sumberid='".$linhapussumberdata."' limit 1");
	if ($deletefromtblanalisispenumpangxls) {
		$pesanpesan=$statusdb[23];
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBDEL","1","tblanalisispenumpangxls",$linhapussumberdata);
	}
	else { $pesanpesan=$statusdb[33]; }

	$deletefromtblanalisispenumpangxls=mysql_query("delete from tblanalisispenumpangsumber where sumberid='".$linhapussumberdata."'");
	if ($deletefromtblanalisispenumpangxls) { funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBDEL","1","tblanalisispenumpangsumber",$linhapussumberdata); }
} elseif ($_POST["tandahapus"]==2) {
	funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Sumber Data - Penumpang: Hapus","RUN","1","","");
	$deletefromtblanalisispenumpangsumber=mysql_query("delete from tblanalisispenumpangsumber where sumberid='".$linhapussumberdata."' and penumpangnama='".$linhapuspenumpangnama."' and penumpangjeniskelamin='".$linhapuspenumpangjeniskelamin."' and penumpangwaktulahir='".$linhapuspenumpangwaktulahir."' and penumpangpasporno='".$linhapuspenumpangpasporno."' and penumpangkebangsaan='".$linhapuspenumpangkebangsaan."' limit 1");
	if ($deletefromtblanalisispenumpangsumber) {
		$pesanpesan=$statusdb[23];
		funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBDEL","1","tblanalisispenumpangsumber",$linhapussumberdata);
	}
	else { $pesanpesan=$statusdb[33]; }
}
?>

<?php
if ($_POST["namsubmitfitur1"]=="ok") {
	$namtextvarfitur1=$_POST["namtextvarfitur1"];
}
?>

<?php
if ($changesort=="ok") {
	if (empty($sortlist)) { $sortlist="asc"; }
	else if ($sortlist=="asc") { $sortlist="desc"; }
	else { $sortlist="asc"; }
}

if (empty($orderlist)) { $sortlist="desc"; $orderlist="sumberid"; }
elseif ($orderlist!=$oldorderlist&&isset($oldorderlist)) { $sortlist="asc"; $oldorderlist=$orderlist; $orderlist=$orderlist; }

if (empty($ffswitch)||$ffswitch=="ffswtabelkapal"||$ffswitch=="ffswlihat") {
	$carrierselectffswtabel="ffswtabelkapal";

	if (!empty($namtextsaringshipdeparturedatetanggal)||
	!empty($namtextsaringshipdeparturedatebulan)||
	!empty($namtextsaringshipdeparturedatetahun)) {
		if (empty($namtextsaringshipdeparturedatetahun)) { $namtextsaringshipdeparturedatetahunresult="%-"; $thnhub=""; }
		else { $namtextsaringshipdeparturedatetahunresult=$namtextsaringshipdeparturedatetahun; $thnhub="-"; }
		if (empty($namtextsaringshipdeparturedatebulan)) { $namtextsaringshipdeparturedatebulanresult="%"; }
		else { $namtextsaringshipdeparturedatebulanresult=$namtextsaringshipdeparturedatebulan; }
		if (empty($namtextsaringshipdeparturedatetanggal)) { $namtextsaringshipdeparturedatetanggalresult="-%"; $tglhub=""; }
		else { $namtextsaringshipdeparturedatetanggalresult=$namtextsaringshipdeparturedatetanggal; $tglhub="-"; }
		$namtextsaringshipdeparturedate=$namtextsaringshipdeparturedatetahunresult.$thnhub.$namtextsaringshipdeparturedatebulanresult.$tglhub.$namtextsaringshipdeparturedatetanggalresult;
	}

	if (!empty($namtextsaringshipdestinationdatetanggal)||
	!empty($namtextsaringshipdestinationdatebulan)||
	!empty($namtextsaringshipdestinationdatetahun)) {
		if (empty($namtextsaringshipdestinationdatetahun)) { $namtextsaringshipdestinationdatetahunresult="%-"; $thnhub=""; }
		else { $namtextsaringshipdestinationdatetahunresult=$namtextsaringshipdestinationdatetahun; $thnhub="-"; }
		if (empty($namtextsaringshipdestinationdatebulan)) { $namtextsaringshipdestinationdatebulanresult="%"; }
		else { $namtextsaringshipdestinationdatebulanresult=$namtextsaringshipdestinationdatebulan; }
		if (empty($namtextsaringshipdestinationdatetanggal)) { $namtextsaringshipdestinationdatetanggalresult="-%"; $tglhub=""; }
		else { $namtextsaringshipdestinationdatetanggalresult=$namtextsaringshipdestinationdatetanggal; $tglhub="-"; }
		$namtextsaringshipdestinationdate=$namtextsaringshipdestinationdatetahunresult.$thnhub.$namtextsaringshipdestinationdatebulanresult.$tglhub.$namtextsaringshipdestinationdatetanggalresult;
	}

	$av=array(
		$namtextsaringshipsailstatus,
		$namtextsaringshipname,
		$namtextsaringshipdepartureport,
		$namtextsaringshipdestinationport,
		$namtextsaringshipdeparturedate,
		$namtextsaringshipdestinationdate
		);
	$at=array(
		"shipsailstatus",
		"shipname",
		"shipdepartureport",
		"shipdestinationport",
		"shipdeparturedate",
		"shipdestinationdate"
		);
	$group="sumberid";
	$carrier="carrierffswtabel=".$carrierffswtabel."&".
		"namtextsaringshipsailstatus=".$namtextsaringshipsailstatus."&".
		"namtextsaringshipname=".$namtextsaringshipname."&".
		"namtextsaringshipdepartureport=".$namtextsaringshipdepartureport."&".
		"namtextsaringshipdestinationport=".$namtextsaringshipdestinationport."&".
		"namtextsaringshipdeparturedatetanggal=".$namtextsaringshipdeparturedatetanggal."&".
		"namtextsaringshipdeparturedatebulan=".$namtextsaringshipdeparturedatebulan."&".
		"namtextsaringshipdeparturedatetahun=".$namtextsaringshipdeparturedatetahun."&".
		"namtextsaringshipdestinationdatetanggal=".$namtextsaringshipdestinationdatetanggal."&".
		"namtextsaringshipdestinationdatebulan=".$namtextsaringshipdestinationdatebulan."&".
		"namtextsaringshipdestinationdatetahun=".$namtextsaringshipdestinationdatetahun;
} else if ($ffswitch=="ffswtabelpenumpang"||$ffswitch=="ffswubahpenumpang") {
	$carrierselectffswtabel="ffswtabelpenumpang";

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
	if (!empty($namtextsaringpenumpangpaspordoitanggal)||
	!empty($namtextsaringpenumpangpaspordoibulan)||
	!empty($namtextsaringpenumpangpaspordoitahun)) {
		if (empty($namtextsaringpenumpangpaspordoitahun)) { $namtextsaringpenumpangpaspordoitahunresult="%-"; $thnhub=""; }
		else { $namtextsaringpenumpangpaspordoitahunresult=$namtextsaringpenumpangpaspordoitahun; $thnhub="-"; }
		if (empty($namtextsaringpenumpangpaspordoibulan)) { $namtextsaringpenumpangpaspordoibulanresult="%"; }
		else { $namtextsaringpenumpangpaspordoibulanresult=$namtextsaringpenumpangpaspordoibulan; }
		if (empty($namtextsaringpenumpangpaspordoitanggal)) { $namtextsaringpenumpangpaspordoitanggalresult="-%"; $tglhub=""; }
		else { $namtextsaringpenumpangpaspordoitanggalresult=$namtextsaringpenumpangpaspordoitanggal; $tglhub="-"; }
		$namtextsaringpenumpangpaspordoi=$namtextsaringpenumpangpaspordoitahunresult.$thnhub.$namtextsaringpenumpangpaspordoibulanresult.$tglhub.$namtextsaringpenumpangpaspordoitanggalresult;
	}
	
	$av=array(
		$namtextsaringpenumpangnama,
		$namtextsaringpenumpangjeniskelamin,
		$namtextsaringpenumpangpasporno,
		$namtextsaringpenumpangwaktulahir,
		$namtextsaringpenumpangkebangsaan,
		$namtextsaringpenumpangpasporpoi,
		$namtextsaringpenumpangpaspordoi,
		$namtextsaringpenumpangremarks
		);
	$at=array(
		"penumpangnama",
		"penumpangjeniskelamin",
		"penumpangpasporno",
		"penumpangwaktulahir",
		"penumpangkebangsaan",
		"penumpangpasporpoi",
		"penumpangpaspordoi",
		"penumpangremarks"
		);
	$carrier="carrierffswtabel=".$carrierffswtabel."&".
		"namtextsaringpenumpangnama=".$namtextsaringpenumpangnama."&".
		"namtextsaringpenumpangjeniskelamin=".$namtextsaringpenumpangjeniskelamin."&".
		"namtextsaringpenumpangpasporno=".$namtextsaringpenumpangpasporno."&".
		"namtextsaringpenumpangwaktulahirtanggal=".$namtextsaringpenumpangwaktulahirtanggal."&".
		"namtextsaringpenumpangwaktulahirbulan=".$namtextsaringpenumpangwaktulahirbulan."&".
		"namtextsaringpenumpangwaktulahirtahun=".$namtextsaringpenumpangwaktulahirtahun."&".
		"namtextsaringpenumpangpasporpoi=".$namtextsaringpenumpangpasporpoi."&".
		"namtextsaringpenumpangpaspordoitanggal=".$namtextsaringpenumpangpaspordoitanggal."&".
		"namtextsaringpenumpangpaspordoibulan=".$namtextsaringpenumpangpaspordoibulan."&".
		"namtextsaringpenumpangpaspordoitahun=".$namtextsaringpenumpangpaspordoitahun."&".
		"namtextsaringpenumpangkebangsaan=".$namtextsaringpenumpangkebangsaan."&".
		"namtextsaringpenumpangremarks=".$namtextsaringpenumpangremarks;
}

$tname="tblanalisispenumpangsumber";
$order=$orderlist." ".$sortlist;
$carriersort="page=".$page."&limitawal=".$limitawal."&limit=".$limit;
$carriersort=$carriersort."&sortlist=".$sortlist."&orderlist=".$orderlist;

require_once($deflink."inc/select.php");
?>

<?php
switch($ffswitch) {
	case "ffswtabelkapal":
		include("sumberdatakapal_tabelkapal.php");
	break;
	case "ffswtabelpenumpang":
		include("sumberdatakapal_tabelpenumpang.php");
	break;
	case "ffswlihat":
		$ffswlihatcase="tampilanawal";
	break;
	case "ffswfitur01":
		$ffswfitur01case="tampilanawal";
	break;
	case "ffswfitur02":
		$ffswfitur02case="tampilanawal";
	break;
	case "ffswfitur03":
		$ffswfitur03case="tampilanawal";
	break;
	case "ffswfitur04":
		$ffswfitur04case="tampilanawal";
	break;
	case "ffswubahpenumpang":
		$ffswubahpenumpangcase="tampilanawal";
	break;
}
?>

<?php
switch($ffswtabelkapal) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_tabelkapal.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_tabelkapal.php");
break;
}
?>

<?php
switch($ffswtabelpenumpang) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_tabelpenumpang.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_tabelpenumpang.php");
break;
}
?>

<?php
switch($ffswlihatcase) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainlilbox">
<?php include("sumberdatakapal_lihat.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_lihat.php");
break;
}
?>

<?php
switch($ffswfitur01case) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_fitur01.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_fitur01.php");
break;
}
?>

<?php
switch($ffswfitur02case) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_fitur02.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_fitur02.php");
break;
}
?>

<?php
switch($ffswfitur03case) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_fitur03.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_fitur03.php");
break;
}
?>

<?php
switch($ffswfitur04case) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_fitur04.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_fitur04.php");
break;
}
?>

<?php
switch($ffswubahpenumpangcase) {
case "tampilanawal":
?>
<table border="0" cellpadding="0" cellspacing="0"><tr><td><div id="divmainsub">
<?php include("sumberdatakapal_ubahpenumpang.php"); ?>
</div></td></tr></table>
<?php
break;
case "saatproses":
include("sumberdatakapal_ubahpenumpang.php");
break;
}
?>
