<?php
function sql($tgl) {
$tglsql=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
return $tglsql;
}
function my_ke_tgl ($tgl) {
    $y =substr($tgl,0,4);
    $m=substr($tgl,5,2);
    $d=substr($tgl,8,2);
    
    return "$d/$m/$y";
}
function exc_ke_sql ($tgl) {
    $tglsql=substr($tgl,6,4)."-".substr($tgl,0,2)."-".substr($tgl,3,2);
    return $tglsql;
}
function exc_ke_sql_time ($tgl) {
    $tglsql=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2)." ".substr($tgl,11,4);
    return $tglsql;
}
function view($tgl) {
$tglview=substr($tgl,8,2)."/".substr($tgl,5,2)."/".substr($tgl,0,4);
return $tglview;
}

function viewstrip($tgl) {
$tglview=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
return $tglview;
}

function HitungUmur($tglndpenimbunan)
 {  
    list($tgl,$bln,$thn) = explode('-',$tglndpenimbunan);
    $batastgl=mktime(0, 0, 0, (int)$bln, (int)$tgl+1, $thn);
    $lahir = mktime(0, 0, 0, (int)$bln, (int)$tgl, $thn); //jam,menit,detik,bulan,tanggal,tahun
    
    $t = time(); 
    $umur = ($lahir < 0) ? ( $t + ($lahir * -1) ) : $t - $lahir; 
    $tahun = 60 * 60 * 24 * 365; 
    $tahunlahir = $umur / $tahun; $umursekarang=floor($tahunlahir) ; 
    return $umursekarang; }

function tgl_ws($tgl) {
		if (!empty($tgl)){
		
		$tgl_jam=explode(" ",$tgl);
		
		$tgl_db=explode("-",$tgl_jam[0]);
		
		if($tgl_db[1]=='01'){$bulanws='JAN';}
		elseif($tgl_db[1]=='02'){$bulanws='FEB';}
		elseif($tgl_db[1]=='03'){$bulanws='MAR';}
		elseif($tgl_db[1]=='04'){$bulanws='APR';}
		elseif($tgl_db[1]=='05'){$bulanws='MAY';}
		elseif($tgl_db[1]=='06'){$bulanws='JUN';}
		elseif($tgl_db[1]=='07'){$bulanws='JUL';}
		elseif($tgl_db[1]=='08'){$bulanws='AUG';}
		elseif($tgl_db[1]=='09'){$bulanws='SEP';}
		elseif($tgl_db[1]=='10'){$bulanws='OCT';}
		elseif($tgl_db[1]=='11'){$bulanws='NOV';}
		elseif($tgl_db[1]=='12'){$bulanws='DEC';}

		$tgl_nya=$tgl_db[2] . "-" . $bulanws . "-" . $tgl_db[0];
		
		
		return($tgl_nya);
		}else{
		return ($tgl);
		}
	}
function rp($angka)
{
$angka = number_format($angka);
$angka = str_replace(',', '.', $angka);
$angka =Rp." $angka";

return $angka;
}

function angka($angka)
{
$angka = number_format($angka);
$angka = str_replace(',', '.', $angka);

return $angka;
}

function desimal($angka)
{
$angka = number_format($angka,2,",",".");

return $angka;
}
function tgl_ind_to_eng() {
	$tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
	return $tgl_eng;
}

function tglindo($tgl){
      $tanggal = substr($tgl,8,2);
      $bulan    = getBulan(substr($tgl,5,2));
      $tahun    = substr($tgl,0,4);
      return $tanggal." ".$bulan." ".$tahun;        
    }    
    function getBulan($bln){
      switch ($bln){
        case 1:
          return "Januari";
          break;
        case 2:
          return "Februari";
          break;
        case 3:
          return "Maret";
          break;
        case 4:
          return "April";
          break;
        case 5:
          return "Mei";
          break;
        case 6:
          return "Juni";
          break;
        case 7:
          return "Juli";
          break;
        case 8:
          return "Agustus";
          break;
        case 9:
          return "September";
          break;
        case 10:
          return "Oktober";
          break;
        case 11:
          return "November";
          break;
        case 12:
          return "Desember";
          break;
    }
} 

function ubah_teks($teks)
{
    $teks=strrev($teks);
    
    $st="";
    for ($i=0; $i < strlen($teks); $i++)
    {
        $ascii=ord(substr($teks,$i,1));
        
        $hex=dechex($ascii);
        if(strlen($hex)==1)
            $hex="0".$hex;
        
        $st=$st.$hex;
    }
    return $st;
}

function balik_teks($teks)
{
    $st="";
    for ($i=0; $i< strlen($teks) / 2; $i++)
    {
        $dua_angka=substr($teks, 2 * $i, 2);
        $des=hexdec($dua_angka);
        $kar=chr($des);
        
        $st=$st.$kar;
    }
    $st=strrev($st);
    return $st;
}

function rp_satuan($angka)
{
$a_str['1']="satu";
$a_str['2']="dua";
$a_str['3']="tiga";
$a_str['4']="empat";
$a_str['5']="lima";
$a_str['6']="enam";
$a_str['7']="tujuh";
$a_str['8']="delapan";
$a_str['9']="sembilan";

$panjang=strlen($angka);
for ($b=0;$b<$panjang;$b++)
{
$a_bil[$b]=substr($angka,$panjang-$b-1,1);
}

if ($panjang>2)
{
if ($a_bil[2]=="1")
{
$terbilang=" seratus";
}
else if ($a_bil[2]!="0")
{
$terbilang= " ".$a_str[$a_bil[2]]. " ratus";
}
}

if ($panjang>1)
{
if ($a_bil[1]=="1")
{
if ($a_bil[0]=="0")
{
$terbilang .=" sepuluh";
}
else if ($a_bil[0]=="1")
{
$terbilang .=" sebelas";
}
else
{
$terbilang .=" ".$a_str[$a_bil[0]]." belas";
}
return $terbilang;
}
else if ($a_bil[1]!="0")
{
$terbilang .=" ".$a_str[$a_bil[1]]." puluh";
}
}

if ($a_bil[0]!="0")
{
$terbilang .=" ".$a_str[$a_bil[0]];
}
return $terbilang;

}
function buatKode($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
	
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}


?>
