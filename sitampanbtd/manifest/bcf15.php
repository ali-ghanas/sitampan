<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
<link rel="stylesheet" type="text/css" href="themes/main.css" />



</head>
    <body>
   

<?php 
 session_start();

 
$act = $_GET['act'];
if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
$katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
/*
cara baca halaman ini :
pilih sembarang dari table user
buatkan header table (dengan perintah <th>)
hingga (while) data habis, buatkan baris baru dengan isi data sesuai yang di echo
tutup table
*/
//$sql = "SELECT * FROM user";
//$query = mysql_query($sql);
//$nourut=1;
?>
<form method="post" action=<?php echo 'index.php?hal=pagemanifest&pilih=bcf15baru'; ?> />
<input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="search" />
<input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /><strong bgcolor="ddffff"> Cari Berdasarkan No BCF 15, BL, Nm Consignee, Notify</strong>  
<input name="mode" type="hidden" id="mode" value="cari" />

</form>

<br />
<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Delete Berhasil";};
if($act=="3"){echo "Input BCF 1.5 Berhasil";};
if (($mode=='cari')) {
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pagemanifest&pilih=bcf15baru";

// data mentah 
$sql = "SELECT * FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and perintah='2'";
$result = mysql_query($sql);

$tcount = mysql_num_rows($result);

$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

$count = 0;
$i = ($page-1)*$rpp;
while(($count<$rpp) && ($i<$tcount)) 
	{
    mysql_data_seek($result,$i);
    $query = mysql_fetch_array($result);

    // output each row:

    $i++;
    $count++;
	}

// by default we show first page
$nohal = 1;

// if $_GET['page'] defined, use it as page number
if(isset($_GET['page']))
	{
    $nohal= $_GET['page'];
	}

// counting the offset
$limit = ($nohal - 1) * $rpp;
$sqltampil = "SELECT *  FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and perintah='2' and recordstatus='1' LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pagemanifest&pilih=bcf15baru";

// data mentah 
$sql = "SELECT * FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and perintah='2' and recordstatus='1'";
$result = mysql_query($sql);

$tcount = mysql_num_rows($result);

$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

$count = 0;
$i = ($page-1)*$rpp;
while(($count<$rpp) && ($i<$tcount)) 
	{
    mysql_data_seek($result,$i);
    $query = mysql_fetch_array($result);

    // output each row:

    $i++;
    $count++;
	}

// by default we show first page
$nohal = 1;

// if $_GET['page'] defined, use it as page number
if(isset($_GET['page']))
	{
    $nohal= $_GET['page'];
	}

// counting the offset
$limit = ($nohal - 1) * $rpp;
$sqltampil = "SELECT * FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and perintah='2' and recordstatus='1' LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?><br />


<table class="data">
	<tr><th class="judultabel">No</th>
	<th class="judultabel">No BCF 15</th>
	<th class="judultabel">Tangal BCF</th>
	<th class="judultabel">No BC 11</th>
	<th class="judultabel">Tanggal BC 11</th>
        <th class="judultabel">TPP Tujuan</th>
        <th class="judultabel">TPS Asal</th>
        <th class="judultabel">Consignee</th>
        <th class="judultabel">Type Cont</th>
	<th class="judultabel">Action</th>
        
	</tr>

<?php
while($data = mysql_fetch_array($tampil)){

if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
			echo "<tr class=highlight1>";
			$j++;
			}
	else
			{
			echo "<tr class=highlight2>";
			$j--;
			}
	
?>
<td align="center" class="isitabel"><?php echo  $awal++; ?></td>
<td class="isitabel"><?php echo  ucwords($data['bcf15no']); ?></td>
<td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
<td class="isitabel"><?php echo  $data['bc11no']; ?></td>
<td class="isitabel"><?php echo  $data['bc11tgl']; ?></td>
<td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
<td class="isitabel"><?php echo  $data['idtps']; ?></td>
<td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
<td class="isitabel"><?php echo  $data['nm_type']; ?></td>
<td align="center" class="isitabel"><a href="?hal=bcfedit&id=<?php echo  $data['idbcf15']; ?>"><img src="images/new/update.png" title="Edit BCF 1.5"/></a> | <a  href="?hal=bcf15report&id=<?php echo  $data['idbcf15']; ?>" target="_blank" ><img src="images/new/view.png" title="Cetak BCF 1.5" /></a> 
         
</td>

</tr>
<?php
};
?>
</table><br/><br />
<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?><br />

    </body>
</html>
<?php
};
?>