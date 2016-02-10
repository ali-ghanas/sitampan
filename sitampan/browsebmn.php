<html>
    <head>
    <title>Browse User</title>
    <!--       jquery anytimes -->
        
        
       
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
    <div ><a href="?hal=input_bmn">Input BMN</a> | <a href="?hal=page_arsip&pilih=btlviewupload"><img src="../images/new/cari.png" width="20"/>Cari BMN</a></div><br/>
<form method="post" action=<?php echo "index.php?hal=browsebmn"; ?> >
<table border="0" class="isitabel">
        <tr bgcolor="#000">
            <td colspan="3"><font color="#fff" size="4">Daftar Barang Yang Ditetapkan Sebagai Barang Milik Negara </font></td>
        </tr>
        
    
    <tr bgcolor="#c1d350">
                            <td >
                                <table BORDER="0" width="100%" class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="Nokepbm" value="1"  <?php  if($_POST['Nokepbm'] == 1){echo 'checked="checked"';}?>>No Kep BMN</td>
                                     <td><input size="30" type="text"   name="nokepbm" value="<?php echo $_POST['nokepbm']?>"></td>
                                  
                                     
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
                                         if (isset($_POST['Nokepbm']))
                                         {
                                           $nokepbm = $_POST['nokepbm'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "nokepbm LIKE '%$setujuBatalNo%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND nokepbm LIKE '%$setujuBatalNo%'";
                                           }
                                        }
                                        
                                   
    $rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=browsebmn";

// data mentah 
$sql = "SELECT * from bmn   where ".$bagianWhere." ";
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
$sqltampil = "SELECT * from bmn   where ".$bagianWhere."  LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=browsebmn";

// data mentah 
$sql = "SELECT * from bmn  ";
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
$sqltampil = "SELECT * from bmn LIMIT $limit,$rpp" ;

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
	<th class="judultabel" colspan="2">No Kep BMN</th>
	
        <th class="judultabel">Edit</th>
        <th class="judultabel">Hapus</th>
        
        
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
<td align="center" class="isitabel"><?php echo  $data['nokepbm']; ?></td>
<td align="center" class="isitabel"><?php echo  $data['tglkepbmn']; ?></td>

<td align="center" align="center" class="isitabel"><a href="?hal=edit_bmn&id=<?php echo  $data['idbmn']; ?> ">Edit</a> </td>
<td align="center" align="center" class="isitabel"><a href="?hal=page_arsip&pilih=input_btl&id=<?php echo  $data['idbcf15']; ?> ">Upload</a> </td>
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