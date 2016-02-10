<?php
$level="1";
include("inc/login.php");
include("dependencies.php");
$filefetcher="aktifitaspengguna.inc.php";
$filefetchercarriersaring=
"namtextsaringuserlogtanggal='+document.getElementById('namtextsaringuserlogtanggal').value+'&".
"namtextsaringuserlogbulan='+document.getElementById('namtextsaringuserlogbulan').value+'&".
"namtextsaringuserlogtahun='+document.getElementById('namtextsaringuserlogtahun').value+'&".
"namtextsaringuserlogjam='+document.getElementById('namtextsaringuserlogjam').value+'&".
"namtextsaringuserlogmenit='+document.getElementById('namtextsaringuserlogmenit').value+'&".
"namtextsaringuserlogdetik='+document.getElementById('namtextsaringuserlogdetik').value+'&".
"namtextsaringuserlogipadd='+document.getElementById('namtextsaringuserlogipadd').value+'&".
"namtextsaringuserloguserid='+document.getElementById('namtextsaringuserloguserid').value+'&".
"namtextsaringuserlogact='+document.getElementById('namtextsaringuserlogact').value+'&".
"namtextsaringuserlogproc='+document.getElementById('namtextsaringuserlogproc').value+'&".
"namtextsaringuserlogtar='+document.getElementById('namtextsaringuserlogtar').value+'";
$loadingtime=0;
?>

<?php
$nambiggie[text]="Aktifitas Pengguna";
$nambiggie[slices]="slices/foraktifitaspengguna.jpg";
?>

<?php
if (!empty($namtextsaringuserlogtahun)||
!empty($namtextsaringuserlogbulan)||
!empty($namtextsaringuserlogtanggal)) {
	if (empty($namtextsaringuserlogtahun)) { $namtextsaringuserlogtahunresult="%-"; $thnhub=""; }
	else { $namtextsaringuserlogtahunresult=$namtextsaringuserlogtahun; $thnhub="-"; }
	if (empty($namtextsaringuserlogbulan)) { $namtextsaringuserlogbulanresult="%"; }
	else { $namtextsaringuserlogbulanresult=$namtextsaringuserlogbulan; }
	if (empty($namtextsaringuserlogtanggal)) { $namtextsaringuserlogtanggalresult="-%"; $tglhub=""; }
	else { $namtextsaringuserlogtanggalresult=$namtextsaringuserlogtanggal; $tglhub="-"; }
	$namtextsaringuserlog1=$namtextsaringuserlogtahunresult.$thnhub.$namtextsaringuserlogbulanresult.$tglhub.$namtextsaringuserlogtanggalresult;
}

if (!empty($namtextsaringuserlogjam)||
!empty($namtextsaringuserlogmenit)||
!empty($namtextsaringuserlogdetik)) {
	if (empty($namtextsaringuserlogjam)) { $namtextsaringuserlogjamresult="%:"; $thnhub=""; }
	else { $namtextsaringuserlogjamresult=$namtextsaringuserlogjam; $thnhub=":"; }
	if (empty($namtextsaringuserlogmenit)) { $namtextsaringuserlogmenitresult="%"; }
	else { $namtextsaringuserlogmenitresult=$amtextsaringuserlogmenit; }
	if (empty($namtextsaringuserlogdetik)) { $namtextsaringuserlogdetikresult=":%"; $tglhub=""; }
	else { $namtextsaringuserlogdetikresult=$namtextsaringuserlogdetik; $tglhub=":"; }
	$namtextsaringuserlog2=$namtextsaringuserlogjamresult.$thnhub.$namtextsaringuserlogmenitresult.$tglhub.$namtextsaringuserlogdetikresult;
}
?>

<?php
if ($changesort=="ok") {
	if (empty($sortlist)) { $sortlist="asc"; }
	else if ($sortlist=="asc") { $sortlist="desc"; }
	else { $sortlist="asc"; }
}

if (empty($orderlist)) { $sortlist="desc"; $orderlist="plogtime"; }
elseif ($orderlist!=$oldorderlist&&isset($oldorderlist)) { $sortlist="desc"; $oldorderlist=$orderlist; $orderlist=$orderlist; }

$namtextsaringuserlogwaktu=$namtextsaringuserlog1." ".$namtextsaringuserlog2;

$av=array(
	$namtextsaringuserlogwaktu,
	$namtextsaringuserlogipadd,
	$namtextsaringuserloguserid,
	$namtextsaringuserlogact,
	$namtextsaringuserlogproc,
	$namtextsaringuserlogproc,
	$namtextsaringuserlogtar,
	$namtextsaringuserlogtar
	);
$at=array(
	"plogtime",
	"plogipaddress",
	"penggunaid",
	"plogaction",
	"plogprocess",
	"plogprocessstatus",
	"plogtargettable",
	"plogtargetid"
	);
$tname="tblpenggunalog";
$order=$orderlist." ".$sortlist;
$group="";
$limit=20;
$carrier="namtextsaringuserlogtanggal=".$namtextsaringuserlogtanggal."&".
		"namtextsaringuserlogbulan=".$namtextsaringuserlogbulan."&".
		"namtextsaringuserlogtahun=".$namtextsaringuserlogtahun."&".
		"namtextsaringuserlogjam=".$namtextsaringuserlogjam."&".
		"namtextsaringuserlogmenit=".$namtextsaringuserlogmenit."&".
		"namtextsaringuserlogdetik=".$namtextsaringuserlogdetik."&".
		"namtextsaringuserlogipadd=".$namtextsaringuserlogipadd."&".
		"namtextsaringuserloguserid=".$namtextsaringuserloguserid."&".
		"namtextsaringuserlogact=".$namtextsaringuserlogact."&".
		"namtextsaringuserlogproc=".$namtextsaringuserlogproc."&".
		"namtextsaringuserlogtar=".$namtextsaringuserlogtar;
$carriersort="page=".$page."&limitawal=".$limitawal."&limit=".$limit;
$carriersort=$carriersort."&sortlist=".$sortlist."&orderlist=".$orderlist;
$modeturbo=1;

require_once($deflink."inc/select.php");
?>

<?php
switch($ffswitch) {
	case "ffswtabel":
		include("aktifitaspengguna_tabel.php");
	break;
}
?>

