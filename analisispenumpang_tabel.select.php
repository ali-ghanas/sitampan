<?php
/* DEKLARASI VARIABEL BETWEEN ARRAY SERTA MENGGABUNGKAN DALAM CODE MYSQL */
if ($betweenstatus==0) {
	if (!empty($betweenfield)&&!empty($betweenkey)) {
		if (!empty($betweenoperator)) {
			$between="(".$betweenfield[0]." between '".$betweenkey[0]."' and '".$betweenkey[1]."' ".$betweenoperator[0]." ".$betweenfield[1]." between '".$betweenkey[0]."' and '".$betweenkey[1]."')";
		} else {
			$between=$betweenfield[0]." between '".$betweenkey[0]."' and '".$betweenkey[1]."'";
		}
	}
} elseif ($betweenstatus==1) {
	if (!empty($betweenfield)&&!empty($betweenkey)) {
		if (!empty($betweenoperator)) {
			for ($x=0;$x<=10;$x++) {
				if (!empty($betweenkey[$x])) {
					if (empty($between)) {
						$between="(";			
					} else {
						$between.="or ";
					}
					$between.=$betweenfield[0]." like '".$betweenkey[$x]."' ".$betweenoperator[0]." ".$betweenfield[1]." like '".$betweenkey[$x]."' ";
				}
			}
			$between.=")";
		} else {
			$between=$betweenfield[0]." = '".$betweenkey[0]."' or ".$betweenfield[0]." = '".$betweenkey[1]."'";
		}
	}
}

if (!empty($as)) { $select=implode(",",$as); }
else { $select="*";}

/* DEKLARASI VARIABEL AND ARRAY SERTA MENGGABUNGKAN DALAM CODE MYSQL */
if (!empty($andfield)&&!empty($andkey)) {
	for ($x=0;$x<=10;$x++) {
		if (!empty($andkey[$x])) {
			if (empty($and)) {
				$and="(";			
			} else {
				$and.="or ";
			}
			$and.=$andfield." like '".$andkey[$x]."' ";
		}
	}
	$and.=")";
}

/* DEKLARASI VARIABEL ARRAY SERTA MENGGABUNGKAN DALAM CODE MYSQL */
$jav=count($av)-1;
$y=0; $z=0;
for ($x=0;$x<=$jav;$x++) {
	if (!empty($av[$x])) {
		if ($y==0) { $ha=" where "; }
		if ($y>=1) {
			if ($at[$x-1]==$at[$x]) { $hub=" or "; }
			else { $hub=" and "; }
		}
		$ha=$ha.$hub.$at[$x]." like '%".$av[$x]."%'";
		$y++;
	}
}
if (!empty($ha)) { if (!empty($between)) { $ha.=" and ".$between." "; }
} else { if (!empty($between)) { $ha.=" where ".$between." "; } }

if (!empty($ha)) { if (!empty($and)) { $ha.=" and ".$and." "; }
} else { if (!empty($and)) { $ha.=" where ".$and." "; } }

/* DEKLARASI VARIABEL COUNT SERTA MENGGABUNGKAN DALAM CODE MYSQL */
if (!empty($counterfield)&&!empty($counterkey)&&!empty($counteras)) {
	for ($i=0;$i<count($counterfield);$i++) { $count.=",count(if(".$counterfield[$i]."='".$counterkey[$i]."',1,NULL)) as ".$counteras[$i]; }
}

/* DEKLARASI VARIABEL KOSONG ATAU TIDAK */
if ($ha=="" && !empty($between)) { $ha=" where ".$between." "; }
if (!empty($group) || $group!="") { $groupby=" group by ".$group." "; }
if (empty($page) || !isset($page)) { $page=1; }
if (empty($line) || !isset($line)) { $line=1; }
if (empty($limitawal) || !isset($limitawal)) { $limitawal=0; }
if (empty($limit) || !isset($limit)) { $limit=15; }


/* MENCARI JUMLAH DATA DARI TABEL */
$jml=mysql_query("select ".$select." from ".$tname.$ha.$groupby);
$rjml=mysql_num_rows($jml);


/* EKSEKUSI FIELD LIMIT */
if ($_POST[limit]) { $limit=$_POST[limit]; }
if ($limit=="*") {
	$limit=$rjml;
	$jmlhal=1;
}
else {
	$jmlhal=intval($rjml/$limit);
	if ($rjml%$limit) {$jmlhal++;}
}


/* EKSEKUSI FIELD HALAMAN */
if ($_POST[hal]) {
	if ($jmlhal < 1) { $page=1; $limitawal=0; }
	elseif ($_POST[hal] > $jmlhal) { $page=$jmlhal; $limitawal=$limit*($jmlhal-1); }
	elseif ($_POST[hal] < 1) { $page=1; $limitawal=0; }
	else { $page=$_POST[hal]; $limitawal=$limit*($_POST[hal]-1); }
}


/* MENCARI HALAMAN YANG SEDANG DIBUKA */
for ($i=1;$i<=$jmlhal;$i++) {
	$baru=$limit*($i-1);
	if ($limitawal==$baru) {$hal=$page=$i; }
}


/* DEKLARASI VARIABEL-VARIABEL PEMBAWA */
if ($limit>=$rjml) {
	$limit=$rjml;
	$hal=$page=$line=$jmlhal=1;
	$first="&laquo;Awal";
	$prev="&#8249;Sebelum";
	$next="Sesudah&#8250;";
	$last="Akhir&raquo;";
}
$line=$limitawal+1;
$limitakhir=$limit;
if ($jmlhal<=1) { $limitawal=0; }


/* KE HALAMAN AWAL */
if ($page>1) {
	$first="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswtabel&page=1&limit=".$limit."&limitawal=0&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist."','')\">&laquo;Awal</div>";
}
else { $hal=$page=$line=1; $limitawal=0; $first="&laquo;Awal"; }

/* KE HALAMAN SEBELUM */
if ($page>1) {
	$prevpage=$page-1;
	$prevlimit=($limit*($page-1))-$limit;
	if ($page>$jmlhal) { $prevlimit=($limit*($page-1))-(2*$limit); }
	$prev="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswtabel&page=".$prevpage."&limit=".$limit."&limitawal=".$prevlimit."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist."','')\">&#8249;Sebelum</div>";
}
else { $prev="&#8249;Sebelum"; }

/* KE HALAMAN SESUDAH */
if ($jmlhal>0&&$page<$jmlhal) {
	$nextpage=$page+1;
	$nextlimit=$page*$limit;
	$next="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswtabel&page=".$nextpage."&limit=".$limit."&limitawal=".$nextlimit."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist."','')\">Sesudah&#8250;</div>";
}
else { $next="Sesudah&#8250;"; }

/* KE HALAMAN AKHIR */
if ($jmlhal>1&&$page<$jmlhal) {
	$lastpage=$jmlhal;
	$lastlimit=($jmlhal*$limit)-$limit;
	$last="<div onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswtabel&page=".$lastpage."&limit=".$limit."&limitawal=".$lastlimit."&".$carrier."&sortlist=".$sortlist."&orderlist=".$orderlist."','')\">Akhir&raquo;</div>";
}
else { $hal=$page=$jmlhal; $limitawal=($jmlhal*$limit)-$limit; $line=$limitawal+1; $last="Akhir&raquo;"; }

/* PENGAMBILAN DATA DARI DATABASE PADA TABEL YANG DITUJU */
$sort=mysql_query("select ".$select.$count." from ".$tname.$ha.$groupby." order by ".$order." limit ".$limitawal.",".$limitakhir);
?>