
<!----------- FORMULAE ------------->
<?php function funribuan($nilai) {
$nilai=explode(".",$nilai);
$tmpnilai=$nilai[0];
if(strlen($tmpnilai)>0) {
	$panjang = strlen($tmpnilai);
	$jum = ceil($panjang/3);
	for($i=0; $i<$jum; $i++) {
		$tmp[] = substr($tmpnilai,-3);
		$tmpnilai = substr($tmpnilai,0,$panjang-3);
		$panjang = $panjang-3;
		}
	$jum = count($tmp);
	for($j=0; $j<$jum; $j++) {
		if($j>0) { $isi .= ".".$tmp[$jum-$j-1]; } else { $isi = $tmp[$jum-$j-1]; }
		}
	if (!empty($nilai[1])) {
		$nilaikanan=substr($nilai[1],0,2);
		echo($isi.",".$nilaikanan);
	}
	else { echo($isi); }
	return $isi;
	}
} ?>

<?php function funterbilang($inp) {
	$terbilang=null;
	$huruf=array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
	if($inp<12) { $terbilang=" ".$huruf[$inp]; }
	else if ($inp<20) { $terbilang=funterbilang($inp-10)." Belas"; }
	else if ($inp<100) { $terbilang=funterbilang($inp/10)." Puluh ".funterbilang($inp%10); }
	else if ($inp<200) { $terbilang="Seratus ".funterbilang($inp-100); }
	else if ($inp<1000) { $terbilang=funterbilang($inp/100)." Ratus ".funterbilang($inp%100); }
	else if ($inp<2000) { $terbilang="Seribu ".funterbilang($inp-1000); }
	else if ($inp<1000000) { $terbilang=funterbilang($inp/1000)." Ribu ".funterbilang($inp%1000); }
	else if ($inp<1000000000) { $terbilang=funterbilang($inp/1000000)." Juta ".funterbilang($inp%1000000); }
	else if ($inp=1000000000) { $terbilang="Satu Milyar"; }
	return $terbilang;
}
?>

<?php function funconvangka($inp) {
	$huruf=array('Nol','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
	if (strpos($inp,",")) {
		$pecahan=explode(",",$inp);
		if (intval($pecahan[0])==0&&$pecahan[1]==0) { $out="Nol koma Nol"; }
		else if (intval($pecahan[0])==0&&$pecahan[1]>0) { 
			for ($i=0;$i<strlen($pecahan[1]);$i++) { $terbilangkoma.=$huruf[$pecahan[1][$i]]." "; }
			$out="Nol koma ".rtrim($terbilangkoma);
		}
		else if (intval($pecahan[0])>0&&$pecahan[1]==0) { $out=funterbilang($pecahan[0])." koma Nol"; }
		else { 
			for ($i=0;$i<strlen($pecahan[1]);$i++) { $terbilangkoma.=$huruf[$pecahan[1][$i]]." "; }
			$out=funterbilang($pecahan[0])." koma ".rtrim($terbilangkoma);
		}
	} else { $out=funterbilang(intval($inp)); }
	return $out;
}
?>

<!----------- OPERATION STRING ------------->

<?php function funtheid($id) {
	$waktu=date("YmdHis");
	$acakx=rand(0,9);
	$acaky=rand(0,9);
	$acakz=rand(0,9);
	$theid=$id.$waktu.$acakx.$acaky.$acakz;
	return $theid;
} ?>

<?php function funbuangkarakteraneh($case) {
	$case=str_replace("\'","",$case);
	$case=str_replace("\"","",$case);
	$case=str_replace("\\","",$case);
	$case=trim(strip_tags($case));
	return $case;
} ?>

<!------------------------>



<?php function funconvdotcoma($case) {
	$case=str_replace("\'","",$case);
	$case=str_replace("\\","",$case);
	$case=str_replace(",",".",$case);
	return $case;
} ?>

<?php function funconvjeniskelamin($case) {
	switch($case) {
		case "L": echo("Laki-laki"); break;
		case "P": echo("Perempuan"); break;
	}
} ?>

<?php function funconvjeniskelaminpendek($case) {
	switch($case) {
		case "L": echo("Lk"); break;
		case "P": echo("Pr"); break;
	}
} ?>

<?php function funconvstatusaktif($case) {
	switch($case) {
		case "1": echo("Aktif"); break;
		case "2": echo("Tidak Aktif"); break;
	}
} ?>

<?php function funconvstatusyatidak($case) {
	switch($case) {
		case "1": echo("Ya"); break;
		case "2": echo("Tidak"); break;
	}
} ?>

<?php function funconvstatushadir($case) {
	switch($case) {
		case "A": echo("Alpa"); break;
		case "H": echo("Hadir"); break;
		case "I": echo("Ijin"); break;
		case "M": echo("Masuk"); break;
		case "S": echo("Sakit"); break;
		case "L": echo("Libur"); break;
	}
} ?>

<?php function funconvtimeperiodmode($case) {
	switch($case) {
		case "io": $mode="Hanya Absensi Masuk"; break;
		case "ii": $mode="Absensi Masuk &amp; Pulang"; break;
	}
	return $mode;
} ?>

<?php function funconvmasaakademikjenis($case) {
	switch($case) {
		case "2-1": $tampil="Semester 1"; break;
		case "2-2": $tampil="Semester 2"; break;
		case "3-1": $tampil="Caturwulan 1"; break;
		case "3-2": $tampil="Caturwulan 2"; break;
		case "3-3": $tampil="Caturwulan 3"; break;
		case "4-1": $tampil="Triwulan 1"; break;
		case "4-2": $tampil="Triwulan 2"; break;
		case "4-3": $tampil="Triwulan 3"; break;
		case "4-4": $tampil="Triwulan 4"; break;
	}
	return $tampil;
} ?>

<?php function funconvnamahari($case) {
	switch($case) {
		case 0: echo("Setiap Hari"); break;
		case 1: echo("Senin"); break;
		case 2: echo("Selasa"); break;
		case 3: echo("Rabu"); break;
		case 4: echo("Kamis"); break;
		case 5: echo("Jumat"); break;
		case 6: echo("Sabtu"); break;
		case 7: echo("Minggu"); break;
	}
} ?>
<?php function funconvnamabulan($case) {
	switch($case) {
		case "01": $bln="Januari"; break;
		case "02": $bln="Februari"; break;
		case "03": $bln="Maret"; break;
		case "04": $bln="April"; break;
		case "05": $bln="Mei"; break;
		case "06": $bln="Juni"; break;
		case "07": $bln="Juli"; break;
		case "08": $bln="Agustus"; break;
		case "09": $bln="September"; break;
		case "10": $bln="Oktober"; break;
		case "11": $bln="Nopember"; break;
		case "12": $bln="Desember"; break;
	}
	echo($bln);
} ?>

<?php function funconvtanggal($case) {
	$tanggal=explode("-",$case);
	switch($tanggal[1]) {
		case "01": $bln="Januari"; break;
		case "02": $bln="Februari"; break;
		case "03": $bln="Maret"; break;
		case "04": $bln="April"; break;
		case "05": $bln="Mei"; break;
		case "06": $bln="Juni"; break;
		case "07": $bln="Juli"; break;
		case "08": $bln="Agustus"; break;
		case "09": $bln="September"; break;
		case "10": $bln="Oktober"; break;
		case "11": $bln="Nopember"; break;
		case "12": $bln="Desember"; break;
	}
	$tampil=$tanggal[2]." ".$bln." ".$tanggal[0];
	return $tampil;
} ?>

<?php function funconvtanggalpendek($case) {
$tanggal=explode("-",$case);
$tampil=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
return $tampil;
} ?>

<?php function funconvtanggalpendekmir($case) {
$tanggal=explode("-",$case);
$tampil=$tanggal[2]."/".$tanggal[1]."/".$tanggal[0];
return $tampil;
} ?>

<?php function funconvtanggalmiring($case) {
$tanggal=explode("-",$case);
$tampil=$tanggal[2]."/".$tanggal[1]."/".substr($tanggal[0],2,4);
return $tampil;
} ?>

<?php function funpenggalansms($case) {
	$penggalan=substr($case,0,65);
	$panjang=strlen($case);
	if ($panjang > 65) { echo($penggalan."..."); }
	else { echo($penggalan); }
} ?>

<?php function funpangkasnama($inp) {
	$inp=str_replace("'","",$inp);
	if(strpos($inp," ")) {
		$arraynama=explode(" ",$inp);
		if(strlen($arraynama[0])>6) {
			$katapertama=substr($arraynama[0],0,1)." ";
			if(strlen($arraynama[1])>6) {
				$katakedua=substr($arraynama[1],0,6);
			} else {
				$katakedua=$arraynama[1];
			}
		} else {
			$katapertama=$arraynama[0]." ";
			$katakedua=substr($arraynama[1],0,1);
		}
		$out=$katapertama.$katakedua;
	} else {
		$out=substr($inp,0,8);
	}
	return $out;
} ?>

<?php function funconvdokfilesizecat($inp) {
if (!empty($inp)) {
if ($inp<1048576) { $output="1"; }
else if ($inp>=1048576&&$inp<5242880) { $output="2"; }
else if ($inp>=5242880&&$inp<1.048576e+007) { $output="3"; }
else if ($inp>=1.048576e+007&&$inp<5.24288e+007) { $output="4"; }
else if ($inp>=5.24288e+007) { $output="5"; }
}
return $output;
} ?>

<!----------- OPERATION IMAGE GD ------------->


<?php function funimgresize($pathsrc,$pathdest,$newwidth,$newheight) {
	$filename=$pathsrc;
	$filehandle=fopen($filename,"rb");
	$filecontents=addslashes(fread($filehandle, filesize($filename)));
	fclose($filehandle);
	list($width,$height)=getimagesize($filename);
	if ($width>=$height) {
		$percent=$newwidth/$width;
		$newheight=$height*$percent;
	} else {
		$percent=$newheight/$height;
		$newwidth=$width*$percent;
	}
	$source1=imagecreatetruecolor($newwidth,$newheight);
	$source2=imagecreatefromjpeg($filename);
	imagecopyresized($source1,$source2,0,0,0,0,$newwidth,$newheight,$width,$height);
	$output=imagejpeg($source1,$pathdest);
	return $output;
} ?>

<?php function funinsertimgtomysql($pathsrc) {
	$filehandle=fopen($pathsrc,"rb");
	$filecontents=addslashes(fread($filehandle,filesize($pathsrc)));
	fclose($filehandle);
	list($width,$height)=getimagesize($pathsrc);
	$source1=imagecreatetruecolor($width,$height);
	$source2=imagecreatefromjpeg($pathsrc);
	imagecopyresized($source1,$source2,0,0,0,0,$width,$height,$width,$height);
	ob_start();
	imagejpeg($source1);
	$output=addslashes(ob_get_clean());
	return $output;
} ?>



<!------------------------>

<?php function funplog($plogipaddress,$penggunaid,$plogaction,$plogprocess,$plogprocessstatus,$plogtargettable,$plogtargetid) {
	include("inc/connect.php");
	$plogtime=date("Y-m-d H:i:s");
	$insertinto=mysql_query("insert into tblpenggunalog
		(
			plogtime,
			plogipaddress,
			penggunaid,
			plogaction,
			plogprocess,
			plogprocessstatus,
			plogtargettable,
			plogtargetid
		) values (
			'".$plogtime."',
			'".$plogipaddress."',
			'".$penggunaid."',
			'".$plogaction."',
			'".$plogprocess."',
			'".$plogprocessstatus."',
			'".$plogtargettable."',
			'".$plogtargetid."'
		)
	");
} ?>