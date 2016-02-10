<html>
    <head>
    <title>Browse User</title>
    <!--       jquery anytimes -->
        
        
       
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
    <div class="span12">
        <div class="span8">
            <div class="nav-header">
                <h3>User Online...</h3>
            </div>
        </div>
        <div class="span4" style="left:auto">
            <form class="form-search" method="post" action=<?php echo "index.php?hal=user&pilih=manajemenuserol"; ?> >
            <input name="katakunci" type="text" placeholder="Pencarian" value="<?php echo "$katakunci"; ?>" class="input-medium search-query" />
            <input type="submit" name="Submit2" value="Cari" class="btn btn-success"  />  
            <input name="mode" type="hidden" id="mode" value="cari"  />

            </form>
        </div>
    </div>

    

<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Kill User Berhasil";};
if($act=="3"){echo "Tambah User Berhasil";};
if (($mode=='cari')) {
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=user&pilih=manajemenuserol";

// data mentah 
$sql = "SELECT * FROM user,log where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%')) and log.username=user.username and log.status='online'   ";
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
$sqltampil = "SELECT * FROM user,log where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%')) and log.username=user.username and log.status='online' LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=user&pilih=manajemenuserol";

// data mentah 
$sql = "SELECT * FROM user,log where log.username=user.username and log.status='online'  ";
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
$sqltampil = "SELECT * FROM user,log where log.username=user.username and log.status='online' LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}

/* ======================================================== pagination selesai ===================================================== */
?>

<table class="table table-bordered" >
	<tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">NIP</th>
            <th rowspan="2">Waktu Akses</th>
            <th colspan="5">Otoritas SITAMPAN</th>
            <th  colspan="2" rowspan="2">Action</th>
	</tr>
        <tr>
            <th>Admin</th>
            <th>OA</th>
            <th>BTD</th>
            <th>BDN</th>
            <th>BMN</th>
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
<td class="isitabel"><?php echo  ucwords($data['nm_lengkap']); ?></td>
<td class="isitabel"><?php echo  $data['nip_baru']; ?></td>
<td class="isitabel"><?php echo tglindo($data['tanggal']);  ?>  <?php echo $data['jamin'];  ?></td>
<td class="isitabel"><?php if($data['admin']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['oa']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['btd']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['bdn']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['bmn']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>

<td align="center" class="isitabel"><?php if($data['status_user']=='aktif'){ echo "<a href=?hal=user&pilih=manajemenuserkick&id=$data[idlog] class='text-success'>clear Session</a> ";} else {echo "";} ?>
</td>

<td align="center" class="isitabel"><?php if($data['status_user']=='aktif'){ echo "<a href=?hal=user&pilih=manajemenuserperhist&id=$data[username] >History Akses</a> ";} else {echo "";} ?></td>

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