<html>
    <head>
    <title></title>
  
    </head>
    <body>
        

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
<div class="span12">
    <div class="span8">
            <?php 
                if($_SESSION['level']=='admin') {echo "<a href=?hal=seksi&pilih=manajemenseksiinput ><input type='submit' value='Tambah Seksi Penandatangan Dokumen' class='btn btn-primary' /> </a>";}
            ?>
    </div>
    <div class="span4" style="left:auto">
        <form method="post" action=<?php echo "index.php?hal=seksi&pilih=manajemenseksi"; ?> >
        <input name="katakunci" class="input-medium search-query" placeholder="cari nama atau NIP" type="text" value="<?php echo "$katakunci"; ?>"  />
        <input type="submit" name="Submit2"  value="Cari" class="btn btn-success" /> 
        <input name="mode" type="hidden" id="mode" value="cari" />

        </form> 
    </div>
</div>
<br />
<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Delete Berhasil";};
if($act=="3"){echo "Input Seksi Berhasil";};
if (($mode=='cari')) {
    $rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=seksi&pilih=manajemenseksi&mode=cari";

// data mentah 
$sql = "SELECT idseksi, nm_seksi,nip,jabatan,bidang, status_seksi  FROM seksi where ((nm_seksi LIKE '%$katakunci%') 
OR (nip LIKE '%$katakunci%')) and status_seksi='aktif'  ";
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
$sqltampil = "SELECT idseksi, nm_seksi,nip,jabatan,bidang,status_seksi FROM seksi where ((nm_seksi LIKE '%$katakunci%') 
OR (nip LIKE '%$katakunci%')) and status_seksi='aktif' LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=seksi&pilih=manajemenseksi";

// data mentah 
$sql = "SELECT * FROM seksi where status_seksi='aktif' ";
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
$sqltampil = "SELECT * FROM seksi where status_seksi='aktif'  LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?><br />


<table class="table table-bordered">
	<tr><th class="judultabel">No</th>
	<th class="judultabel">Nama</th>
	<th class="judultabel">NIP</th>
	<th class="judultabel">Jabatan</th>
	<th class="judultabel">Bidang</th>
        <th class="judultabel">Status</th>
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
<td class="isitabel"><?php echo  ucwords($data['nm_seksi']); ?></td>
<td class="isitabel"><?php echo  $data['nip']; ?></td>
<td class="isitabel"><?php echo  $data['jabatan']; ?></td>
<td class="isitabel"><?php echo  $data['bidang']; ?></td>
<td class="isitabel"><?php echo  $data['status_seksi']; ?></td>
<td align="center" class="isitabel"><a href="?hal=seksi&pilih=manajemenseksiedit&id=<?php echo  $data['idseksi']; ?>" class='btn btn-mini btn-primary' > <i class="icon-edit icon-white"></i><span><strong>Edit</strong></a> 	
        
</td>
</tr>
<?php
};
?>
</table>
<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>


            
        </body>
        </html>