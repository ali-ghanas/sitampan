<html>
    <head>
    <title>Browse User</title>
  
       
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
                    if($_SESSION['level']=='admin') {echo "<a href=?hal=settapp&pilih=manajementppinput ><input type='submit' value='Tambah TPP' class='btn btn-primary' /> </a>";}
                ?>
        </div>
        <div class="span4" style="left:auto">
            <form method="post" action=<?php echo "index.php?hal=settapp&pilih=manajementpp"; ?> >
                <input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="input-medium search-query" placeholder="cari nama TPP..." />
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
    $rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=settapp&pilih=manajementpp";

// data mentah 
$sql = "SELECT * FROM tpp where ((nm_tpp LIKE '%$katakunci%') 
OR (alamat_tpp LIKE '%$katakunci%'))  ";
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
$sqltampil = "SELECT * FROM tpp where ((nm_tpp LIKE '%$katakunci%') 
OR (alamat_tpp LIKE '%$katakunci%')) LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=settapp&pilih=manajementpp";

// data mentah 
$sql = "SELECT * FROM tpp";
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
$sqltampil = "SELECT * FROM tpp LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?>

<table class="table table-bordered">
	<tr>
            <th class="judultabel" width="40">No</th>
            <th class="judultabel" width="200">Nama TPP</th>
            <th class="judultabel">Alamat TPP</th>
            <th class="judultabel" width="90">Kota</th>
            <th class="judultabel" colspan="3">Action</th>
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
<td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
<td class="isitabel"><?php echo  $data['alamat_tpp']; ?></td>
<td class="isitabel"><?php echo  $data['kota_tpp']; ?></td>
<td align="center" class="isitabel"><a href="?hal=settapp&pilih=manajementppedit&id=<?php echo  $data['idtpp']; ?> " class='btn btn-mini btn-primary'> <i class='icon-edit icon-white'></i><span><strong>Edit</strong></span></a></td>
<td align="center" class="isitabel"><a href="?hal=settapp&pilih=manajementppfoto&id=<?php echo  $data['idtpp']; ?> " >Foto</a></td>
<td align="center" class="isitabel"><a href="?hal=settapp&pilih=manajementppdel&id=<?php echo  $data['idtpp']; ?> " onclick="javascript:return confirm('Anda Ingin Melanjutkan Menghapus TPP?')" class='btn btn-mini btn-danger'> <i class='icon-trash icon-white'></i><span><strong>Delete</strong></span></a></td>
	
        



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