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
    
<form method="post" action=<?php echo "index.php?hal=daftarsp"; ?> >
<table border="0" class="isitabel">
        <tr>
            <td colspan="3">Pencarian Arsip Surat Pengantar BCF 1.5 dari Seksi Administrasi Manifest Ke Seksi Tempat Penimbunan </td>
        </tr>
        
    
    <tr >
                            <td >
                                <table BORDER="0" width="100%" class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="Nosp" value="1"  <?php  if($_POST['Nosp'] == 1){echo 'checked="checked"';}?>>No Surat Pengantar</td>
                                     <td><input size="10" type="text"   name="nosp" value="<?php echo $_POST['nosp']?>"></td>
                                  
                                     <td><input type="checkbox" name="Tahun_sp" value="1"  <?php  if($_POST['Tahun_sp'] == 1){echo 'checked="checked"';}?>>Tahun SP</td>
                                     <td><input size="10" type="text"  name="tahun_sp" value="<?php echo $_POST['tahun_sp']?>"></td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Det_nobcf" value="1"  <?php  if($_POST['Det_nobcf'] == 1){echo 'checked="checked"';}?>>No BCF 1.5 </td>
                                     <td><input size="10" type="text"  name="det_nobcf" value="<?php echo $_POST['det_nobcf']?>"> </td>
                                   
                                     <td><input type="checkbox" name="Idtpp" value="1"  <?php  if($_POST['Idtpp'] == 1){echo 'checked="checked"';}?>>TPP </td>
                                     <td><select id="idtpp" name="idtpp">
                                          <option value="" selected>::Pilih TPP::</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$_POST[idtpp]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                                        }
                                                        ?>
                                            </select></td>
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
                                     if (isset($_POST['Nosp']))
                                        {
                                           $nosp = $_POST['nosp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "nosp LIKE '%$nosp%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND nosp LIKE '%$nosp%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun_sp']))
                                        {
                                           $tahun_sp = $_POST['tahun_sp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tahun_sp='$tahun_sp'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND tahun_sp='$tahun_sp'";
                                           }
                                        }
                                        if (isset($_POST['Det_nobcf']))
                                        {
                                           $det_nobcf = $_POST['det_nobcf'];
                                          
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "det_nobcf LIKE '%$det_nobcf%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND det_nobcf LIKE '%$det_nobcf%'";
                                           }
                                        }
                                        if (isset($_POST['Idtpp']))
                                        {
                                           
                                           $idtpp = $_POST['idtpp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "arsip_sp_detail.idtpp='$idtpp'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND arsip_sp_detail.idtpp='$idtpp'";
                                           }
                                        }
                                        
                                        
                    if($_POST['Idtpp']=='1'){
                      $rpp=100000; 
                   }
                   elseif($_POST['Det_nobcf']=='1'){
                      $rpp=100000; 
                   }
                   elseif($_POST['Tahun_sp']=='1'){
                      $rpp=100000; 
                   }
                  
                   else{
                       $rpp = 20; // Jumlah data per halaman 
                   }

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarsp";

// data mentah 
$sql = "SELECT * FROM arsip_sp_detail,user,tpp where arsip_sp_detail.iduser=user.iduser  and arsip_sp_detail.idtpp=tpp.idtpp  and ".$bagianWhere." ";
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
$sqltampil = "SELECT * FROM arsip_sp_detail,user,tpp where arsip_sp_detail.iduser=user.iduser and arsip_sp_detail.idtpp=tpp.idtpp  and ".$bagianWhere."  LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarsp";

// data mentah 
$sql = "SELECT * FROM arsip_sp_detail,user,tpp where arsip_sp_detail.iduser=user.iduser  and arsip_sp_detail.idtpp=tpp.idtpp order by nosp,tahun_sp,bulan_sp asc ";
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
$sqltampil = "SELECT * FROM arsip_sp_detail,user,tpp where arsip_sp_detail.iduser=user.iduser and arsip_sp_detail.idtpp=tpp.idtpp order by nosp,tahun_sp,bulan_sp asc LIMIT $limit,$rpp" ;

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
	<th class="judultabel" colspan="2">Surat Pengantar(BCF 1.5)</th>
	<th class="judultabel">TPP</th>
	<th class="judultabel">Jumlah BCF 1.5</th>
        <th class="judultabel" >File Upload</th>
        
        
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
<td align="center" class="isitabel"><?php echo  $data['nosp']; ?></td>
<td align="center" class="isitabel"><?php echo  tglindo($data['tglsp']); ?></td>
<td align="center" class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
<td align="center" class="isitabel"><?php echo  $data['jumlah_bcf15']; ?></td>

<td align="center" class="isitabel"><?php if($data['name']==''){echo "<font color=red>Tidak ada file</font>";}else{echo  $data['name']; } ?></td>


<td align="center" align="center" class="isitabel"><a href="arsip/sp/download.php?id=<?php echo  $data['idarsip_sp_detail']; ?> "><img src="images/new/printer.png"  title="Download" /></a> </td>
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