<html>
    <head>
    <title>Browse User</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
       
    </head>
<?php // yang belum koneksi database diabaikan aja dulu file ini
 session_start();
 include "lib/koneksi.php";
 include "lib/function.php";
 
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
    <br/>
    
<form method="post" action=<?php echo "index.php?hal=daftarbtlbcf"; ?> >
<table border="0" class="isitabel">
        <tr bgcolor="#000">
            <td colspan="3"><font color="#fff" size="4">Arsip Hasil Upload Pembatalan BCF 1.5</font></td>
        </tr>
        
    
    <tr bgcolor="#c1d350">
                            <td >
                                <table BORDER="0" width="100%" class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="SetujuBatalNo" value="1"  <?php  if($_POST['SetujuBatalNo'] == 1){echo 'checked="checked"';}?>>No Agenda Pembatalan</td>
                                     <td><input size="10" type="text"   name="setujuBatalNo" value="<?php echo $_POST['setujuBatalNo']?>"></td>
                                  
                                     
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5 </td>
                                     <td><input size="10" type="text"  name="bcf15no" value="<?php echo $_POST['bcf15no']?>"> </td>
                                   
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 </td>
                                     <td><input size="10" type="text"  name="tahun" value="<?php echo $_POST['tahun']?>"> </td>
                                    </tr>
                                    
                             
                                </table>
                            </td>
                            
                        </tr>
                        
        
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
    </table>

</form>

<div class="highlight2"></div>
    

<?php
if($act=="1"){echo "Hapus Berhasil";};
if($act=="2"){echo "Update Berhasil";};
if($act=="3"){echo "Tambah Kantor Berhasil";};
if (($mode=='cari')) {
                                         if (isset($_POST['SetujuBatalNo']))
                                         {
                                           $setujuBatalNo = $_POST['setujuBatalNo'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "SetujuBatalNo LIKE '%$setujuBatalNo%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND SetujuBatalNo LIKE '%$setujuBatalNo%'";
                                           }
                                        }
                                        if (isset($_POST['Bcf15no']))
                                        {
                                           $bcf15no = $_POST['bcf15no'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15no like '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15no like '%$bcf15no%'";
                                           }
                                        }
                                        
                                        if (isset($_POST['Tahun']))
                                        {
                                           
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND tahun='$tahun'";
                                           }
                                        }
                                   
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarbtlbcf";

// data mentah 
$sql = "SELECT * from arsip_btl_detail where  ".$bagianWhere." ";
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
$sqltampil = "SELECT * from arsip_btl_detail where ".$bagianWhere."  LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarbtlbcf";

// data mentah 
$sql = "SELECT * from arsip_btl_detail  ";
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
$sqltampil = "SELECT * from arsip_btl_detail LIMIT $limit,$rpp" ;

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?>



<?php 
//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>
<br/>

<table class="data" width="80%">
	<tr><th class="judultabel">No</th>
	<th class="judultabel" colspan="2">Agenda Batal</th>
	<th class="judultabel">No BCF 1.5</th>
	<th class="judultabel">Tgl Upload</th>
        
        <th class="judultabel">Download</th>
        
        
        
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
<td align="center" class="isitabel"><?php echo  $data['nobtl']; ?></td>
<td align="center" class="isitabel"><?php echo  $data['tglbtl']; ?></td>
<td align="center" class="isitabel"><?php echo  $data['bcf15no']; ?></td>
<td align="center" class="isitabel"><?php echo  $data['tglinput']; ?></td>

<td align="center" align="center" class="isitabel"><a href="arsip/btlbcf/download.php?id=<?php echo  $data['idbcf15']; ?> ">Download</a> </td>

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