    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php
//error_reporting(0);
include "lib/koneksi.php";
$id=$_GET['id'];

$sql = "SELECT * FROM bcf15 where idbcf15='$id'";
$query = mysql_query($sql);
$data=mysql_fetch_array($query);

//cari data surat permohonan pembatalan BCF 1.5
$sqlsrt = "SELECT * FROM suratmasukpembatalanbcf15 where noidbcf15='$id'";
$querysrt = mysql_query($sqlsrt);
$datasrt=mysql_fetch_array($querysrt);

//cari data konfirmasi online
$sqlkon = "SELECT * FROM kofirmasi_p2 where idbcf15='$id'";
$querykon = mysql_query($sqlkon);
$datakon=mysql_fetch_array($querykon);
$cekkonf=mysql_numrows($datakon);
                
if($data['SetujuBatalNo']==''){
    $setujubatal='';
}
else {
    $setujubatal="<span class='text-success lead'>Dibatalkan dengan Agenda Pembatalan Nomor :$data[SetujuBatalNo]</span>";
}
if($datasrt['statussurat']==''){$statussurat='';}elseif($datasrt['statussurat']=='Konsep'){$statussurat='<span class="muted lead">(Konsep)</span>';}elseif($datasrt['statussurat']=='<span class="muted lead">Selesai</span>'){$statussurat='(Selesai)';}

if($data['jalur']=='0'){
    if($data['DokumenCode']=='0'){$jalur='';}
    elseif($data['DokumenCode']=='2'){$jalur='BC 1.2';}
    elseif($data['DokumenCode']=='4'){$jalur='BC 2.3';}
    elseif($data['DokumenCode']=='5'){$jalur='BC 3.0';}
    elseif($data['DokumenCode']=='11'){$jalur='Returnable';}
    elseif($data['DokumenCode']=='13'){$jalur='PIBK';}
    elseif($data['DokumenCode']=='30'){$jalur='Lain';}
    else{$jalur='Lain';}
 }
 elseif($data['jalur']=='1'){
     if($data['DokumenCode']=='0'){$jalur='';}
    elseif($data['DokumenCode']=='2'){$jalur='BC 1.2';}
    elseif($data['DokumenCode']=='4'){$jalur='BC 2.3';}
    elseif($data['DokumenCode']=='5'){$jalur='BC 3.0';}
    elseif($data['DokumenCode']=='11'){$jalur='Returnable';}
    elseif($data['DokumenCode']=='13'){$jalur='PIBK';}
    elseif($data['DokumenCode']=='30'){$jalur='Lain';}
    else{$jalur='Lain';}
 }
 elseif($data['jalur']=='2'){
     $jalur='Jalur HIJAU';
 }
 elseif($data['jalur']=='3'){
     $jalur='Jalur KUNING';
 }
 elseif($data['jalur']=='4'){
     $jalur='Jalur MITA PRIORITAS';
 }
 elseif($data['jalur']=='5'){
     $jalur='Jalur MITA NON PRIORITAS';
 }
 elseif($data['jalur']=='6'){
     $jalur='Jalur MERAH';
 }
 elseif($data['jalur']=='7'){
     $jalur='Jalur MERAH MITA PRIORITAS';
 }
 elseif($data['jalur']=='8'){
     $jalur='Jalur MERAH MITA NON PRIORITAS';
 }
 
 //hasil cek online ke P2
 $blokir1=$datakon['konf_stsblokir'];
 if($blokir1=='Tidak'){$blokir='';}elseif($blokir1==''){$blokir='';}else{$blokir='<span class="text-error">Terblokir</span>';}
 $segel1=$datakon['konf_stssegel'];
 if($segel1=='Tidak'){$segel='';}elseif($segel1==''){$segel='';}else{$segel='<span class="text-error">Tersegel</span>';}
 $nhi1=$datakon['konf_stsnhi'];
 if($nhi1=='Tidak'){$nhi='';}elseif($nhi1==''){$nhi='';}else{$nhi='<span class="text-error">(Info Lebih Lanjut Hub Seksi Penindakan)</span>';}
 
 $status_ket=$datakon['status_ket'];
 $Catatan_manual_p2=$datakon['Catatan_manual_p2'];
 if($data['SuratBatalNo']==''){$jawabsrt='Tdk';}
 else{$jawabsrt='Ya';}
 
 if($datakon['konf_manualhc']=='0'){$jawabkononlinehard='Tdk';}elseif($datakon['konf_manualhc']==''){$jawabkononlinehard='Tdk';}else{$jawabkononlinehard='Ya';}
 if($data['SetujuBatalNo']==''){$jawabtl='Tdk';}
 else{$jawabtl='Ya';}
 
?>
    
    <div class="row">
      <div class="span9">
          <h3>Hasil Pencarian</h3>
          <table class="table">
              <tr>
                  <td>BCF 1.5</td><td>:</td><td><?php echo $data['bcf15no'] ?> / <?php echo $data['bcf15tgl'] ?></td>
              </tr>
              <tr>
                  <td>BC 1.1</td><td>:</td><td><?php echo $data['bc11no'] ?> / <?php echo $data['bc11tgl'] ?> Pos <?php echo $data['bc11pos'] ?> Sub Pos <?php echo $data['bc11subpos'] ?></td>
              </tr>
              <tr>
                  <td>Consignee/Notify</td><td>:</td><td><?php echo $data['consignee'] ?> / <?php echo $data['notify'] ?> </td>
              </tr>
              <tr>
                  <td colspan="3">
                      <table width="100%">
                          <tr>
                              <td colspan="4" ><h4>Status BCF 1.5</h4></td>
                          </tr>
                          <tr>
                              <th>No</th>
                              <th>Uraian</th>
                              <th>YA/TDK</th>
                              <th>Tanggal</th>
                              <th>Status</th>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>Surat Permohonan Pembatalan</td>
                              <td><?php echo $jawabsrt ?></td>
                              <td><?php echo $datasrt['tgllengkap']?></td>
                              <td><?php echo $jalur ?></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>Konfirmasi P2 online</td>
                              <td></td>
                              <td><?php echo $datakon['konf_tglkonftpp']?></td>
                              <td> </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>Jawaban Konfirmasi P2 online</td>
                              <td></td>
                              <td><?php echo $datakon['konf_tglkonfp2']?></td>
                              <td><?php echo "$blokir $segel $nhi" ?> <?php echo "$status_ket" ?> </td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td>Konfirmasi P2 Hardcopy</td>
                              <td><?php echo $jawabkononlinehard ?></td>
                              <td><?php echo $datakon['konf_tglinputndtpp']?></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>5</td>
                              <td>Jawaban Konfirmasi P2 Hardcopy</td>
                              <td></td>
                              <td><?php echo $datakon['konf_tglinputndp2']?></td>
                              <td><?php echo "$Catatan_manual_p2" ?></td>
                          </tr>
                          <tr>
                              <td>6</td>
                              <td>Pembatalan BCF 1.5</td>
                              <td><?php echo $jawabtl ?></td>
                              <td><?php echo $data['SetujuBatalDate']?></td>
                              <td><?php echo $setujubatal; echo $statussurat?></td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </div>
    </div>