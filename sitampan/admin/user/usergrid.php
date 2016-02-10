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
            <?php 
                if($_SESSION['level']=='admin') {echo "<a href=?hal=user&pilih=manajemenuserinput ><input type='submit' value='Create User' class='btn btn-primary' /> </a>";}
            ?>
        </div>
        <div class="span4" style="left:auto">
            <form class="form-search" method="post" action=<?php echo "index.php?hal=user&pilih=manajemenuser"; ?> >
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

$reload = "index.php?hal=user&pilih=manajemenuser";

// data mentah 
$sql = "SELECT iduser, username,level,nm_lengkap,nip_baru,jabatan,status_user, DATE_FORMAT(tgl_lahir,'%d-%M-%Y') as tgl_lahir,admin,oa,btd,bdn,bmn FROM user where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%'))    ";
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
$sqltampil = "SELECT iduser, username,level,nm_lengkap,nip_baru,jabatan,status_user, DATE_FORMAT(tgl_lahir,'%d-%M-%Y') as tgl_lahir,admin,oa,btd,bdn,bmn FROM user where ((nm_lengkap LIKE '%$katakunci%') 
OR (nip_baru LIKE '%$katakunci%'))  LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=user&pilih=manajemenuser";

// data mentah 
$sql = "SELECT * FROM user ";
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
$sqltampil = "SELECT * FROM user  LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}

/* ======================================================== pagination selesai ===================================================== */
?>

<table class="table table-bordered table-hover" >
	<tr>
            <th rowspan="2" class="text-center">NO</th>
            <th rowspan="2">NAMA</th>
            <th rowspan="2">USERNAME</th>
            
            <th colspan="5">APP</th>
            
            <th  colspan="3" rowspan="2">ACTION</th>
	</tr>
        <tr>
            <th>ADMIN</th>
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
<td class="isitabel"><?php echo  ucwords($data['username']); ?></td>

<td class="isitabel"><?php if($data['admin']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['oa']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['btd']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['bdn']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>
<td class="isitabel"><?php if($data['bmn']=='1') echo "<img src=../css/images/accept.png />"; else { echo "<img src=../css/images/delete.png />";} ?></td>


<td align="center" class="isitabel"><?php if($data['status_user']=='aktif'){ echo "<a href=?hal=user&pilih=manajemenuseredit&id=$data[iduser]; class='btn btn-mini btn-primary'> <i class='icon-edit icon-white'></i><span><strong><small>edit</small></strong></span> </a> ";} else {echo "";} ?>
</td>
<td align="center" class="isitabel"><?php if($data['status_user']=='aktif'){ echo "<a href=?hal=user&pilih=manajemenuserdel&id=$data[iduser]; class='btn btn-mini btn-danger'> <i class='icon-move icon-white'></i><span><strong><small>blokir</small></strong></span></a> ";} else {echo "<a href=?hal=user&pilih=manajemenuserdelundo&id=$data[iduser]; class='btn btn-mini btn-success'> <i class='icon-refresh icon-white'></i><span><strong>buka</strong></a> ";} ?>
</td>
<td align="center" class="isitabel"><?php if($data['status_user']=='aktif'){ echo "<a href=?hal=user&pilih=manajemenuserresetpass&id=$data[iduser]; class='btn btn-mini btn-success'> <i class='icon-tags icon-white'></i><span ><strong><small>reset pass<small></strong></a> ";} else {echo "";} ?></td>

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