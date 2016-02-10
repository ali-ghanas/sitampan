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
<?php // yang belum koneksi database diabaikan aja dulu file ini
 session_start();
 include 'lib/function.php';
 
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
<table>
    <tr>
        <td><a href="?hal=suratmasukokbtlbcf">Permohonan Pembatalan BCF 1.5</a></td>
    </tr>
    <tr>
        <td><hr></hr></td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
</table>


<form method="post" action=<?php echo "index.php?hal=suratmasukok"; ?> >
    <input class="search" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" /> 
<input class="button putih bigrounded " type="submit" name="Submit2" value="Cariiii" class="submitsearch" /> <a>Masukan Kata kunci : No Agenda/No Surat /Agenda /Perihal</a> 
<input  name="mode" type="hidden" id="mode" value="cari" />
</form>

<a href="?hal=addsuratmasuk"><input class="button putih bigrounded " type="submit" name="addsuratmasuk" value="Rekam Surat Masuk Lagi"></input></a> <br />
<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Delete Berhasil";};
if($act=="3"){echo "Input Surat Berhasil";};
if (($mode=='cari')) {
    $rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=suratmasukok";

// data mentah 
$sql = "SELECT * FROM suratmasuk where ((noagenda LIKE '%$katakunci%') 
OR (nosurat LIKE '%$katakunci%') OR (perihal LIKE '%$katakunci%') OR (asalsurat LIKE '%$katakunci%')) order by tglagenda desc";
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
$sqltampil = "SELECT * FROM suratmasuk where ((noagenda LIKE '%$katakunci%') 
OR (nosurat LIKE '%$katakunci%') OR (perihal LIKE '%$katakunci%') OR (asalsurat LIKE '%$katakunci%')) order by tglagenda desc LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=suratmasukok";

// data mentah 
$sql = "SELECT * FROM suratmasuk order by tglagenda desc";
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
$sqltampil = "SELECT * FROM suratmasuk order by tglagenda desc LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?><br />

 <br/>
<table class="data">
	<tr><th class="judultabel">No</th>
	<th class="judultabel">No Surat</th>
	<th class="judultabel">Tanggal</th>
	<th class="judultabel">From</th>
	<th class="judultabel">Hal</th>
        <th class="judultabel">Disposisi Ke</th>
        
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
<td class="isitabel"><?php echo  ucwords($data['nosurat']); ?></td>
<td class="isitabel"><?php echo  $data['tanggalsurat']; ?></td>
<td class="isitabel"><?php echo  $data['asalsurat']; ?></td>
<td class="isitabel"><?php echo  $data['perihal']; ?></td>
<td class="isitabel"><?php if ($data['iddisposisi']=='0') {echo 'N/A'; } else { $sql = "SELECT * FROM disposisi ORDER BY iddisposisi"; $qry = @mysql_query($sql) or die ("Gagal query"); while ($bcf15 =mysql_fetch_array($qry)) {if ($bcf15[iddisposisi]==$data[iddisposisi]) {echo "$bcf15[nm_disposisi]";}} } ?></td>

<td align="center" class="isitabel"><a href="?hal=suratmasukedit&id=<?php echo  ubah_teks($data['idsuratmasuk']); ?>"><img src="images/new/update.png" title="Edit" /></a> | 
	<a href="?hal=suratmasukdel&id=<?php echo  ubah_teks($data['idsuratmasuk']); ?>" 
	onclick="javascript:return confirm('Delete : <?php echo $data['noagenda']; ?>?')"><img src="images/new/delete.png" title="Hapus" /></a> 
               
</td>
</tr>
<?php
};
?>
</table><br/><br />
<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>
<?php
};
?>