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

<div class="span12">

    <form method="post" action=<?php echo "index.php?hal=user&pilih=manajemenhistbcf15"; ?> >
            <legend>Pencarian History BCF 1.5</legend>
            <fieldset>
                    <div class="container-fluid">
                            <div class="row-fluid">
                            <div class="span6">
                                <label class="checkbox">
                                    <input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?> /> BCF 1.5 
                                    
                                </label>
                                <label>
                                        <input size="10" type="text"  placeholder="No BCF 1.5…" class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>" />
                                        <span class="help-block">Example : 000001 atau 1234.</span>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 
                                    
                                </label>
                                <label>
                                        <input size="10" type="text"  class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>">
                                       
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="Blno" value="1"  <?php  if($_POST['Blno'] == 1){echo 'checked="checked"';}?>>No BL 
                                    
                                </label>
                                <label>
                                        <input type="text"  class="required" name="blno" value="<?php echo $_POST['blno']?>">  
                                       
                                </label>
                                
                            </div>
                            <div class="span6">
                                    <label class="checkbox">
                                        <input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>> Tahun BCF 1.5 
                                        
                                    </label>
                                    <label>
                                            <input size="10" type="text" class="required" name="tahun" value="<?php echo $_POST['tahun']?>">
                                            <span class="help-block">Example : 2007 atau 2008, etc.</span>
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>Pos   
                                        
                                    </label>
                                    <label>
                                            <input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>">
                                            
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="Diskripsibrg" value="1"  <?php  if($_POST['Diskripsibrg'] == 1){echo 'checked="checked"';}?>>Uraian Barang 
                                        
                                    </label>
                                    <label>
                                          <input type="text"  class="required" name="diskripsibrg" value="<?php echo $_POST['diskripsibrg']?>">  
                                            
                                    </label>
                                    
                                
                            </div>
                            </div>
                        <input class="btn btn-primary" type="submit" name="Submit2" value="Cari" class="submitsearch" /><input name="mode" type="hidden" id="mode" value="cari" />
                    </div>
                
                
                
            </fieldset>
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
                                        if (isset($_POST['dokumenNo']))
                                        {
                                           $DokumenNo = $_POST['DokumenNo'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "DokumenNo LIKE '%$DokumenNo%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND DokumenNo LIKE '%$DokumenNo%'";
                                           }
                                        }
                                        if (isset($_POST['dokumen2No']))
                                        {
                                           $Dokumen2No = $_POST['Dokumen2No'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Dokumen2No LIKE '%$Dokumen2No%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Dokumen2No LIKE '%$Dokumen2No%'";
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
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Bcf15no']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Bc11no']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Diskripsibrg']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Negaraasal']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Consignee']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['Notify']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['dokumenNo']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       elseif ($_POST['dokumenNo']=='1') {
            $rpp = 10000; // Jumlah data per halaman 
       }
       else {
           $rpp = 20; // Jumlah data per halaman 
       }
   

$page = intval($_GET["page"]);
if(!$page) $page = 1;


$reload = "index.php?hal=user&pilih=manajemenhistbcf15";

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

$reload = "index.php?hal=user&pilih=manajemenhistbcf15";
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
?>

           
<table class="table table-bordered table-striped" border="0">
	<tr >
            <th class="judultabel" rowspan="2">No</th>
            <th class="judultabel" colspan="2">BCF 1.5</th>
            <th class="judultabel"  colspan="3">BC 11</th>
            <th class="judultabel"  colspan="2">Container</th>
            <th class="judultabel" rowspan="2">Consignee</th>
            <th class="judultabel" rowspan="2">Lokasi Timbun</th>
            <th class="judultabel" rowspan="2">History</th>
        </tr>
        <tr>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Pos /sub</th>
            
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Ukuran</th>
            
            
            
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
<td class="isitabel" align="center"><a href="#myModalphoto<?php echo $data['idbcf15'] ?>" role="button" class="btn btn-info" data-toggle="modal">History</a></td>
                                        <div id="myModalphoto<?php echo $data['idbcf15'] ?>" class="modal hide fade" tabindex="-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel">History BCF 1.5</h3>
                                                        
                                                      </div>
                                                      <div class="modal-body">
                                                          
                                                            <?php
                                                                        $sql = "SELECT * FROM historybcf15 where bcf15no=$data[bcf15no] and tahun=$data[tahun]"; // memanggil data dengan id yang ditangkap tadi
                                                                        $query = mysql_query($sql);
                                                                        $awal='1';
                                                                        while($datahis = mysql_fetch_array($query)){

                                                            ?>
                                                                  <span>
                                                                          <ul>
                                                                            <li> <?php echo $datahis['tanggalaksi']; ?> | <?php echo $datahis['namaaksi']; ?> | <?php echo $datahis['nama_user']; ?> | <?php echo $datahis['nip_user']; ?></li>
                                                                          </ul>
                                                                  </span>
                                                                 
                                                              <?php
                                                                        };
                                                               ?>
                                                      
                                                      </div>
                                                          
                                                     
                                                          

                                                      
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
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