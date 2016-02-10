<html>
    <head>
    <title>Browse User</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
       
    </head>
<?php // yang belum koneksi database diabaikan aja dulu file ini
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
<form method="post" action=<?php echo "index.php?hal=pageadminman&pilih=tps"; ?> >
<input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="required" />
<input type="submit" name="Submit2" value="Cari" class="button putih bigrounded "  />  
<input name="mode" type="hidden" id="mode" value="cari"  />

</form>

<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Kill User Berhasil";};
if($act=="3"){echo "Tambah User Berhasil";};
if (($mode=='cari')) {
    $rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadminman&pilih=tps";

// data mentah 
$sql = "SELECT * FROM tps where ((nm_tps LIKE '%$katakunci%') 
OR (alamat_tps LIKE '%$katakunci%'))  ";
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
$sqltampil = "SELECT * FROM tps where ((nm_tps LIKE '%$katakunci%') 
OR (alamat_tps LIKE '%$katakunci%')) LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadminman&pilih=tps";

// data mentah 
$sql = "SELECT * FROM tps";
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
$sqltampil = "SELECT * FROM tps LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?>

<table class="data">
	<tr><th class="judultabel" width="40">No</th>
	<th class="judultabel" width="90">Nama TPS</th>
	<th class="judultabel">Alamat</th>
	
	
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
<td class="isitabel"><?php echo  $data['nm_tps']; ?></td>
<td class="isitabel"><?php echo  $data['alamat_tps']; ?></td>


</tr>
<?php
};
?>
</table><br/><br />
<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>
</body>
        </html>