<html>
    <head>
    <title>View Surat Pemberitahuan</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
       
    </head>
    <body>
        
<h1>DAFTAR SEKSI</h1>

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
<form method="post" action=<?php echo "index.php?hal=pageadmin&pilih=seksi"; ?> >
<input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="required" />
<input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /> <span>*) Nama dan NIP</span> 
<input name="mode" type="hidden" id="mode" value="cari" />

</form>

<br />
<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Delete Berhasil";};
if($act=="3"){echo "Input Seksi Berhasil";};
if (($mode=='cari')) {
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadmin&pilih=seksi";

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
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadmin&pilih=seksi";

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


<table class="data">
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
<td align="center" class="isitabel"><a href="?hal=seksiedit&id=<?php echo  $data['idseksi']; ?>">Edit</a> 	
        
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


<!--Cari User Name-->


<h1>User Aplikasi SITAMPAN (Seksi)</h1>
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
<form method="post" action=<?php echo "index.php?hal=pageadmin&pilih=seksi"; ?> >
<!--<input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" />
<input type="submit" name="Submit2" value="Cari" class="submitsearch" />  -->
<input name="mode" type="hidden" id="mode" value="cari" />

</form>

<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Update Berhasil";};
if($act=="2"){echo "Kill User Berhasil";};
if($act=="3"){echo "Tambah User Berhasil";};
if (($mode=='cari')) {
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadmin&pilih=seksi";

// data mentah 
$sql = "SELECT iduser, username,level,nm_lengkap,nip_baru,jabatan,status_user, DATE_FORMAT(tgl_lahir,'%d-%M-%Y') as tgl_lahir FROM user where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%')) and (level='seksimanifest' or level='seksitpp2' or  level='seksitpp3' ) and status_user='aktif'  ";
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
$sqltampil = "SELECT iduser, username,level,nm_lengkap,nip_baru,jabatan,status_user, DATE_FORMAT(tgl_lahir,'%d-%M-%Y') as tgl_lahir FROM user where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%')) and (level='seksimanifest' or level='seksitpp2' or  level='seksitpp3' ) and status_user='aktif' LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=pageadmin&pilih=seksi";

// data mentah 
$sql = "SELECT * FROM user where (level='seksimanifest' or level='seksitpp2' or  level='seksitpp3' ) and status_user='aktif'";
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
$sqltampil = "SELECT * FROM user where (level='seksimanifest' or level='seksitpp2' or  level='seksitpp3' ) and status_user='aktif' LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?><br />


<table class="data">
	<tr><th class="judultabel">No</th>
	<th class="judultabel">Nama</th>
	<th class="judultabel">NIP</th>
	<th class="judultabel">Jabatan</th>
	<th class="judultabel">Username</th>
        <th class="judultabel">Level Akses</th>
        <th class="judultabel">Status User</th>
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
<td class="isitabel"><?php echo  ucwords($data['nm_lengkap']); ?></td>
<td class="isitabel"><?php echo  $data['nip_baru']; ?></td>
<td class="isitabel"><?php echo  $data['jabatan']; ?></td>
<td class="isitabel"><?php echo  $data['username']; ?></td>
<td class="isitabel"><?php echo  $data['level']; ?></td>
<td class="isitabel"><?php echo  $data['status_user']; ?></td>
<td align="center" class="isitabel"><a href="?hal=useredit&id=<?php echo  $data['iduser']; ?>">Edit</a> | <a href="?hal=userdel&id=<?php echo  $data['iduser']; ?>">Kill User</a> 
	
        
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

            
        </body>
        </html>