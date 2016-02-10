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
    
<form method="post" action=<?php echo "index.php?hal=daftarsptahu"; ?> >
<table border="0" class="isitabel">
        <tr bgcolor="#000">
            <td colspan="3"><font color="#fff" size="4">Arsip Surat Pemberitahuan Ke Consignee Tentang Penetapan BCF 1.5 </font></td>
        </tr>
        
    
    <tr bgcolor="#c1d350">
                            <td >
                                <table BORDER="0" width="100%" class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="Nosp" value="1"  <?php  if($_POST['Nosp'] == 1){echo 'checked="checked"';}?>>No Surat Pemberitahuan</td>
                                     <td><input size="10" type="text"   name="nosp" value="<?php echo $_POST['nosp']?>"></td>
                                  
                                     <td><input type="checkbox" name="Tahun_sp" value="1"  <?php  if($_POST['Tahun_sp'] == 1){echo 'checked="checked"';}?>>Tahun Surat</td>
                                     <td><input size="10" type="text"  name="tahun_sp" value="<?php echo $_POST['tahun_sp']?>"></td>
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
                                                $bagianWhere .= "nomor_sptahu LIKE '%$nosp%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND nomor_sptahu LIKE '%$nosp%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun_sp']))
                                        {
                                           $tahun_sp = $_POST['tahun_sp'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tahun_sptahu='$tahun_sp'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND tahun_sptahu='$tahun_sp'";
                                           }
                                        }
                                        
   if ($_POST['Nosp']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Tahun_sp']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       
       else {
           $rpp = 20; // Jumlah data per halaman 
       }
$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarsptahu";

// data mentah 
$sql = "SELECT * FROM arsip_sptahu,user where arsip_sptahu.iduser=user.iduser   and ".$bagianWhere." ";
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
$sqltampil = "SELECT * FROM arsip_sptahu,user where arsip_sptahu.iduser=user.iduser   and ".$bagianWhere."  LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 10; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=daftarsptahu";

// data mentah 
$sql = "SELECT * FROM arsip_sptahu,user where arsip_sptahu.iduser=user.iduser  order by nomor_sptahu,tahun_sptahu asc ";
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
$sqltampil = "SELECT * FROM arsip_sptahu,user where arsip_sptahu.iduser=user.iduser  order by nomor_sptahu,tahun_sptahu asc  LIMIT $limit,$rpp" ;

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
	<th class="judultabel" >No Surat Pemberitahuan</th>
	
	<th class="judultabel">Tahun Surat</th>
        <th class="judultabel" >File Upload</th>
        <th class="judultabel">Upload</th>
        
	<th class="judultabel">Edit</th>
        <th class="judultabel">Delete</th>
        
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
<td align="center" class="isitabel"><?php echo  $data['nomor_sptahu']; ?></td>

<td align="center" class="isitabel"><?php echo  $data['tahun_sptahu']; ?></td>


<td align="center" class="isitabel"><?php if($data['name']==''){echo "<font color=red>Tidak ada file</font>";}else{echo  $data['name']; } ?></td>
<td align="center" class="isitabel"><a href="?hal=page_arsip&pilih=upload_sptahu&id=<?php echo $data['idarsip_sptahu'] ?>">Upload PDF</a></td>
<td align="center" align="center" class="isitabel"> <a href="?hal=page_arsip&pilih=edit_sptahu&id=<?php echo  $data['idarsip_sptahu']; ?> " target="_blank"><img src="images/new/edit.png"  title="Edit" /></a></td>
<td align="center" align="center" class="isitabel"><a href="arsip/pemberitahuan/sptahu_delete.php?id=<?php echo  $data['idarsip_sptahu']; ?>"><img src="images/new/delete.png" title="Delete SP" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a> </td>

<td align="center" align="center" class="isitabel"><a href="arsip/pemberitahuan/download.php?id=<?php echo  $data['idarsip_sptahu']; ?> "><img src="images/new/printer.png"  title="Download" /></a> </td>
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