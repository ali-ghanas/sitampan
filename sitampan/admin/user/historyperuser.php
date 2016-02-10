<html>
    <head>
    <title>Browse User</title>
    <!--       jquery anytimes -->
        
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.11.custom.css" />
    <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal4").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal5").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
    </head>
<?php // yang belum koneksi database diabaikan aja dulu file ini
 session_start();
$idlog=$_GET['id'];
 
$act = $_GET['act'];
if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
$tglawal=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglawal'])));
$tglakhir=htmlentities(trim(mysql_real_escape_string($_REQUEST['tglakhir'])));
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
        <div class="span4">
            <div class="nav-header">
                <h5>History Akses User <?php echo $idlog ?></h5>
            </div>
        </div>
        <div class="span8" style="left:auto">
            <form class="form-search" method="post" action=<?php echo "index.php?hal=user&pilih=manajemenuserperhist&id=$idlog"; ?> >
            <input name="tglawal" id="tanggal" type="text" placeholder="tgl awal akses" value="<?php echo "$tglawal"; ?>" class="input-medium search-query" /> sd
            <input name="tglakhir" id="tanggal2" type="text" placeholder="tgl akhir akses" value="<?php echo "$tglakhir"; ?>" class="input-medium search-query" />
            <input type="submit" name="Submit2" value="Cari" class="btn btn-success"  />  
            <input name="mode" type="hidden" id="mode" value="cari"  />

            </form>
        </div>
    </div>

    

<div class="highlight2"></div>
    

<?php

if (($mode=='cari')) {
    $rpp = 1000000; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=user&pilih=manajemenuserperhist&id=$idlog";

// data mentah 
$sql = "SELECT * FROM user,log where log.tanggal between '$tglawal' and '$tglakhir' and log.username=user.username  and log.username='$idlog' order by log.tanggal and jamout desc  ";
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
$sqltampil = "SELECT * FROM user,log where log.tanggal between '$tglawal' and '$tglakhir' and log.username=user.username  and log.username='$idlog' order by log.tanggal and jamout desc LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=user&pilih=manajemenuserperhist&id=$idlog";

// data mentah 
$sql = "SELECT * FROM user,log where log.username=user.username   and log.username='$idlog' ";
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
$sqltampil = "SELECT * FROM user,log where log.username=user.username  and log.username='$idlog' LIMIT $limit,$rpp" ;

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
            
            <th colspan="3">Waktu Akses</th>
            
	</tr>
        <tr>
            <th>Tanggal</th>
            <th>Jam Login</th>
            <th>Jam Log Out</th>
            
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
<td class="isitabel"><?php echo  tglindo($data['tanggal']); ?></td>
<td class="isitabel"><?php echo  $data['jamin']; ?></td>
<td class="isitabel"><?php echo  $data['jamout']; ?></td>

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