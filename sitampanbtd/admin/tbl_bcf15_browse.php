<?php
include "lib/koneksi.php";
session_start();
ob_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<?php 
 session_start();
if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
$katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
$tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));

?>

<div >


    


<form method="post" action=<?php echo "index.php?hal=tbl_bcf15_browse"; ?> >
    <table border="0">
        <tr>
            <td class="isitabel">
                <h2>Cari BCF 1.5</h2><hr/>
                <span>Silahkan centang kriteria pencarian BCF 1.5 dibawah ini dan masukan <b>KATA KUNCI</b> yang Anda tahu dan klik tombol Cari</span><br/>
                
            </td>
        </tr>
         <tr >
                            <td >
    
                                <table BORDER="0" bgcolor="#f2f5ad"  class="isitabel">
                                    <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                  
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 </td>
                                     <td><input size="10" type="text" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                                     <td><input size="10" type="text"  class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                                   
                                     <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>Pos   </td>
                                     <td><input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Blno" value="1"  <?php  if($_POST['Blno'] == 1){echo 'checked="checked"';}?>>No BL </td>
                                     <td><input type="text"  class="required" name="blno" value="<?php echo $_POST['blno']?>">  </td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Diskripsibrg" value="1"  <?php  if($_POST['Diskripsibrg'] == 1){echo 'checked="checked"';}?>>Uraian Barang </td>
                                     <td><input type="text"  class="required" name="diskripsibrg" value="<?php echo $_POST['diskripsibrg']?>">  </td>
                                     
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Negaraasal" value="1"  <?php  if($_POST['Negaraasal'] == 1){echo 'checked="checked"';}?>>Pelabuhan Asal </td>
                                     <td><input type="text"  class="required" name="negaraasal" value="<?php echo $_POST['negaraasal']?>">  </td>
                                     <td><input type="checkbox" name="Shipper" value="1"  <?php  if($_POST['Shipper'] == 1){echo 'checked="checked"';}?>>Shipper </td>
                                     <td><input type="text"  class="required" name="shipper" value="<?php echo $_POST['shipper']?>">  </td>
                                    </tr>
                                    <tr>
                                     <td><input type="checkbox" name="Consignee" value="1"  <?php  if($_POST['Consignee'] == 1){echo 'checked="checked"';}?>>Consignee </td>
                                     <td><input type="text"  class="required" name="consignee" value="<?php echo $_POST['consignee']?>">  </td>
                                     
                                     <td><input type="checkbox" name="Notify" value="1"  <?php  if($_POST['Notify'] == 1){echo 'checked="checked"';}?>>Notify </td>
                                     <td><input type="text"  class="required" name="notify" value="<?php echo $_POST['notify']?>">  </td>
                                     </tr>
                                     <tr>
                                     <td><input type="checkbox" id="" name="PencarianBebas" class="PencarianBebas1" value="1"  <?php  if($_POST['PencarianBebas'] == 1){echo 'checked="checked"';}?>>Pencarian Bebas </td>
                                     <td colspan="3"><input type="text"  class="required" name="pencarianbebas" id="pencarianbebas" value="<?php echo $_POST['pencarianbebas']?>" title="Karakter bebas : berdasarkan data yang anda ketahui">
                                       
                                     </td>
                                     
                                    </tr>
                                </table>
    
                            </td>
                            
                        </tr>
                        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
                        <script type="text/javascript">
                                       $(document).ready(function() {    
                                          $(".pencarianbebas").hide();

                                          

                                          $(".PencarianBebas1").click(function(e) {
                                               if ($(e.target).val() == "1")
                                                  $(".pencarianbebas").show();
                                               else  
                                                  $(".pencarianbebas").hide();
                                          });        
                                       });   
                                    </script>  
                        <tr>
                            <td class="isitabel">
                                <span id="pencarianbebas" class="pencarianbebas" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;"><b>Pencarian dengan karakter bebas memaksimalkan fungsi pencarian dengan data yang anda punya, pencarian ini akan menampilkan data yang tidak spesifik sehingga seluruh data ditampilkan berdasarkan kriteria yang anda masukkan.</b></span><br/>

                            </td>
                        </tr>
                        
        
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
    </table>
</form>

<?php

if (($mode=='cari')) {
                        
                        if (isset($_POST['Bcf15no']))
                                        {
                                           $bcf15no = $_POST['bcf15no'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15no LIKE '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15no LIKE '%$bcf15no%'";
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
                                        if (isset($_POST['Bc11no']))
                                        {
                                           $bc11no = $_POST['bc11no'];
                                          
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bc11no LIKE '%$bc11no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bc11no LIKE '%$bc11no%'";
                                           }
                                        }
                                        if (isset($_POST['Bc11pos']))
                                        {
                                           
                                           $bc11pos = $_POST['bc11pos'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bc11pos like '%$bc11pos%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bc11pos like '%$bc11pos%'";
                                           }
                                        }
                                        if (isset($_POST['Blno']))
                                        {
                                           $blno = $_POST['blno'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "blno LIKE '%$blno%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND blno LIKE '%$blno%'";
                                           }
                                        }
                                        if (isset($_POST['Diskripsibrg']))
                                        {
                                           $diskripsibrg = $_POST['diskripsibrg'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "diskripsibrg LIKE '%$diskripsibrg%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND diskripsibrg LIKE '%$diskripsibrg%'";
                                           }
                                        }
                                        if (isset($_POST['Negaraasal']))
                                        {
                                           $negaraasal = $_POST['negaraasal'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "negaraasal LIKE '%$negaraasal%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND negaraasal LIKE '%$negaraasal%'";
                                           }
                                        }
                                        if (isset($_POST['Shipper']))
                                        {
                                           $shipper = $_POST['shipper'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "shipper LIKE '%$shipper%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND shipper LIKE '%$shipper%'";
                                           }
                                        }
                                        if (isset($_POST['Consignee']))
                                        {
                                           $consignee = $_POST['consignee'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "consignee LIKE '%$consignee%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND consignee LIKE '%$consignee%'";
                                           }
                                        }
                                        if (isset($_POST['Notify']))
                                        {
                                           $notify = $_POST['notify'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "notify LIKE '%$notify%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND notify LIKE '%$notify%'";
                                           }
                                        }
                                        if (isset($_POST['PencarianBebas']))
                                        {
                                           $pencarianbebas = $_POST['pencarianbebas'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "(
                                               (saranapengangkut LIKE '%$pencarianbebas%')
                                               or (saranapengangkut LIKE '%$pencarianbebas%') 
                                               or (voy LIKE '%$pencarianbebas%')
                                               or (amountbrg LIKE '%$pencarianbebas%')
                                               or (satuanbrg LIKE '%$pencarianbebas%')
                                               or (diskripsibrg LIKE '%$pencarianbebas%')
                                               or (consigneeadrress LIKE '%$pencarianbebas%')
                                               or (consigneekota LIKE '%$pencarianbebas%')
                                               or (notifyadrress LIKE '%$pencarianbebas%')
                                               or (notifykota LIKE '%$pencarianbebas%')
                                               or (nm_tpp LIKE '%$pencarianbebas%')
                                               or (idtps LIKE '%$pencarianbebas%')
                                               or (keterangan LIKE '%$pencarianbebas%')
                                               or (DokumenNo LIKE '%$pencarianbebas%')
                                               or (Dokumen2No LIKE '%$pencarianbebas%')
                                               or (BatalTarikKet LIKE '%$pencarianbebas%')
                                               or (SuratBatalNo LIKE '%$pencarianbebas%')
                                               or (Pemohon LIKE '%$pencarianbebas%')
                                               or (AlamatPemohon LIKE '%$pencarianbebas%')
                                               or (jawabanp2Ket LIKE '%$pencarianbebas%')
                                               or (tonage_groos LIKE '%$pencarianbebas%')
                                               or (tonage_netto LIKE '%$pencarianbebas%')
                                               or (KetBA_Penarikan LIKE '%$pencarianbebas%')
                                               or (tundalelang LIKE '%$pencarianbebas%')
                                               
                                               )";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND (
                                               (saranapengangkut LIKE '%$pencarianbebas%')
                                               or (saranapengangkut LIKE '%$pencarianbebas%') 
                                               or (voy LIKE '%$pencarianbebas%')
                                               or (amountbrg LIKE '%$pencarianbebas%')
                                               or (satuanbrg LIKE '%$pencarianbebas%')
                                               or (diskripsibrg LIKE '%$pencarianbebas%')
                                               or (consigneeadrress LIKE '%$pencarianbebas%')
                                               or (consigneekota LIKE '%$pencarianbebas%')
                                               or (notifyadrress LIKE '%$pencarianbebas%')
                                               or (notifykota LIKE '%$pencarianbebas%')
                                               or (nm_tpp LIKE '%$pencarianbebas%')
                                               or (idtps LIKE '%$pencarianbebas%')
                                               or (keterangan LIKE '%$pencarianbebas%')
                                               or (DokumenNo LIKE '%$pencarianbebas%')
                                               or (Dokumen2No LIKE '%$pencarianbebas%')
                                               or (BatalTarikKet LIKE '%$pencarianbebas%')
                                               or (SuratBatalNo LIKE '%$pencarianbebas%')
                                               or (Pemohon LIKE '%$pencarianbebas%')
                                               or (AlamatPemohon LIKE '%$pencarianbebas%')
                                               or (jawabanp2Ket LIKE '%$pencarianbebas%')
                                               or (tonage_groos LIKE '%$pencarianbebas%')
                                               or (tonage_netto LIKE '%$pencarianbebas%')
                                               or (KetBA_Penarikan LIKE '%$pencarianbebas%')
                                               or (tundalelang LIKE '%$pencarianbebas%')
                                               
                                               )";
                                           }
                                        }
                                        
       if ($_POST['PencarianBebas']=='1') {
            $rpp = 1000; // Jumlah data per halaman 
       }
       else {
           $rpp = 20; // Jumlah data per halaman 
       }
   

$page = intval($_GET["page"]);
if(!$page) $page = 1;


$reload = "index.php?hal=tbl_bcf15_browse";

// data mentah 
$sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg
        FROM bcf15, tpp where bcf15.idtpp=tpp.idtpp and ".$bagianWhere." order by bcf15no,tahun desc" ;
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
$sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg
            FROM bcf15, tpp where bcf15.idtpp=tpp.idtpp  and ".$bagianWhere." order by bcf15no,tahun desc LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
else {
/* ======================================================== pagination mulai ===================================================== */
$rpp = 20; // Jumlah data per halaman 

$page = intval($_GET["page"]);
if(!$page) $page = 1;

$reload = "index.php?hal=tbl_bcf15_browse";
$tgl_now=date('Y-m-d');
$tahun_now=substr($tgl_now,0,4);
// data mentah 
$sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg
        FROM bcf15, tpp where bcf15.idtpp=tpp.idtpp and tahun=$tahun_now order by bcf15no,tahun desc";
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
$sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg
FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and tahun=$tahun_now order by bcf15no,tahun desc LIMIT $limit,$rpp";

if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
$tampil= mysql_query($sqltampil);
$count	=mysql_num_rows($result);
}
/* ======================================================== pagination selesai ===================================================== */
?><br />


<table class="data" border="0">
	<tr ><th class="judultabel" rowspan="2">No</th>
	<th class="judultabel" colspan="2">BCF 1.5</th>
	<th class="judultabel"  colspan="3">BC 1.1</th>
        
        <th class="judultabel"  colspan="2">Container</th>
	<th class="judultabel" rowspan="2">Consignee</th>
        
        <th class="judultabel" rowspan="2">Lokasi Timbun</th>
        <th class="judultabel" rowspan="2">Lama Timbun di TPP</th>
        <th class="judultabel" colspan="4">Status</th>
        <th class="judultabel" rowspan="2">Action</th>
        </tr>
        <tr>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Pos /sub</th>
            
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Ukuran</th>
            <th class="judultabel">Batal Tarik</th>
            <th class="judultabel">Masuk</th>
            <th class="judultabel">Permohonan Batal</th>
            <th class="judultabel">Setuju Batal</th>
            
            
        </tr>

<?php
while($data = mysql_fetch_array($tampil)){
    $now=date('Y-m-d');
                        $tglbcf=$data['bamasukdate'];
                        
                        $querytempo ="select datediff('$now','$tglbcf') as selisih";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
                        $selisih=$datatempo['selisih'];

if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
			echo "<tr class=highlight1 valign='top'>";
			$j++;
			}
	else
			{
			echo "<tr class=highlight2 valign='top'>";
			$j--;
			}
	
?>
<td align="center" class="isitabel"><?php echo  $awal++; ?></td>
<td class="isitabel"><?php echo  ucwords($data['bcf15no']); ?></td>
<td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
<td class="isitabel"><?php echo  $data['bc11no']; ?></td>
<td class="isitabel"><?php echo  $data['bc11tgl']; ?></td>
<td class="isitabel"><?php echo  $data['bc11pos']; if($data['bc11subpos']=='') {echo "";} else {echo " Sub Pos $data[bc11subpos]";} ?></td>

<td class="isitabel">
    <table cellspacing="0" cellpadding="0">
                    
         <?php
         $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
         while($bcfcont = mysql_fetch_array($rowset)){
         ?>
             <tr>
             <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
              </tr>
                                    <?php };?>
    </table>
</td>
<td class="isitabel">
    <table cellspacing="0" cellpadding="0">
                    
         <?php
         $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
         while($bcfcont = mysql_fetch_array($rowset)){
         ?>
             <tr>
             
             <td class="isitabel" ><?php echo $bcfcont['idsize'];?></td>

              </tr>
                                    <?php };?>
    </table>
</td>
<td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];;};?></td>

<td class="isitabel" align="center"><?php if ($data['bamasukno']=="") {echo "<font face='arial' color='red'>$data[idtps]</font>"; }  else  {echo "<font face='arial' color='blue'>$data[nm_tpp]</font>";}?></td>
<td class="isitabel" align="center"><?php if ($data['bamasukno']=="") {echo "<font face='arial' color='red'>tidak Masuk TPP</font>"; } else {echo  "$selisih Hari" ;} ?></td>
<td class="isitabel" align="center"><?php if ($data['BatalTarikNo']=="") {echo ""; }  else  {echo "<img src='images/new/ok.png' />";};?></td>
<td class="isitabel" align="center"><?php if ($data['bamasukno']=="") {echo ""; }  else  {echo "<img src='images/new/ok.png' />";};?></td>
<td class="isitabel" align="center"><?php if ($data['SuratBatalNo']=="") {echo ""; }  else  {echo "<img src='images/new/ok.png' />";};?></td>
<td class="isitabel" align="center"><?php if ($data['SetujuBatalNo']=="") {echo ""; }  else  {echo "<img src='images/new/ok.png' />";};?></td>
<td align="center" class="isitabel">
        <a href="?hal=tbl_bcf15_update&id=<?php echo  $data['idbcf15']; ?> " target="_new"><img src="images/new/view.png" /></a></td>
</tr>
<?php
};
?>
</table><br/><br />

<?php 

//untuk menampilkan paginasi
echo paginate($reload, $page, $tpages);
?>
</div>

<?php
};
ob_end_flush();
?>