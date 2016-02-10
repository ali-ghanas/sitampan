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
<form method="post" action=<?php echo "index.php?hal=suratmasukumum"; ?> >
  
<input class="search" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" />
<input class="button putih bigrounded " type="submit" name="Submit2" value="Cariiii" class="submitsearch" />  
<input  name="mode" type="hidden" id="mode" value="cari" />
<br/><font color="#800000">(Pencarian Berdasarkan No Agenda, No Surat, Perihal , dan Asal Surat)</font>
</form>

<font color="blue" size="4"> Jumlah Surat Untuk Anda <?php $sql = mysql_query ("SELECT * FROM suratmasuk, disposisi where suratmasuk.iddisposisi=disposisi.iddisposisi and disposisi.nip_baru=$_SESSION[nip_baru]");$jumlah = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" size="5">(<?php echo $jumlah ?>)</font></span>  
<?php
if($act=="1"){echo "Disposisi Berhasil";};
if($act=="2"){echo "Delete Berhasil";};
if($act=="3"){echo "Input Surat Berhasil";};
if (($mode=='cari')) {
    $rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=suratmasukumum";

// data mentah 
$sql = "SELECT * FROM suratmasuk,  disposisi where ((noagenda LIKE '%$katakunci%') 
OR (nosurat LIKE '%$katakunci%') OR (perihal LIKE '%$katakunci%') OR (asalsurat LIKE '%$katakunci%')) and suratmasuk.iddisposisi=disposisi.iddisposisi and disposisi.nip_baru=$_SESSION[nip_baru] order by idsuratmasuk desc";
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
$sqltampil = "SELECT * FROM suratmasuk, disposisi where ((noagenda LIKE '%$katakunci%') 
OR (nosurat LIKE '%$katakunci%') OR (perihal LIKE '%$katakunci%') OR (asalsurat LIKE '%$katakunci%')) and suratmasuk.iddisposisi=disposisi.iddisposisi and disposisi.nip_baru=$_SESSION[nip_baru] order by idsuratmasuk desc LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=suratmasukumum";

// data mentah 
$sql = "SELECT * FROM suratmasuk, disposisi where suratmasuk.iddisposisi=disposisi.iddisposisi and disposisi.nip_baru=$_SESSION[nip_baru] order by idsuratmasuk desc";
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
$sqltampil = "SELECT * FROM suratmasuk, disposisi where suratmasuk.iddisposisi=disposisi.iddisposisi and disposisi.nip_baru=$_SESSION[nip_baru] order by idsuratmasuk desc LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?>

 
<table class="data">
	<tr><th class="judultabel">No</th>
	<th class="judultabel">No Surat</th>
	<th class="judultabel">Tanggal</th>
	<th class="judultabel">From</th>
	<th class="judultabel">Hal</th>
        <th class="judultabel" >Status</th>
        <th class="judultabel">Kerjakan</th>
        <th class="judultabel">Detail</th>
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
<td class="isitabel"><?php echo  ucwords($data['nosurat']); ?></td>
<td class="isitabel"><?php echo  $data['tanggalsurat']; ?></td>
<td class="isitabel"><?php echo  $data['asalsurat']; ?></td>
<td class="isitabel"><?php echo  $data['perihal']; ?></td>
<td class="isitabel"><?php if ($data['status']=='open') {echo '<img src="images/indicator.gif"></img>'; } else { echo  $data['status']; }  ?></td>

<td align="center" class="isitabel"><?php if ($data['status']=='open') {echo "<a href='?hal=suratmasukdetail&id=$data[idsuratmasuk]' target='_new'>Kerja</a> ";}  else {echo 'Selesai'; } ?></td>
<td align="center" class="isitabel"><?php if ($data['iddisposisi']!=='0') {echo "<a href='?hal=detailsuratmasuk&id=$data[idsuratmasuk]' target='_new'>Detail</a> ";}  else {echo '<img src="images/indicator.gif"></img>'; } ?></td>

</tr>
<?php
};
?>
</table><br/><br />
<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>