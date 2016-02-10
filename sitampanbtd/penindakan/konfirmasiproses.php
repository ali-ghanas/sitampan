<?php
include "lib/koneksi.php";
include "lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
elseif($_SESSION['level']=="tpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="tpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="seksitpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 
else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#konfirmasiproses").submit(function() {
                 if ($.trim($("#konf_stsblokir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Anda Belum Memilih Status Blokir atau tidak");
                    $("#konf_stsblokir").focus();
                    return false;  
                 }
                 if ($.trim($("#konf_stssegel").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Anda Belum Memilih Status Segel atau tidak");
                    $("#konf_stssegel").focus();
                    return false;  
                 }
                 if ($.trim($("#konf_stsnhi").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Anda Belum Memilih Status NHI atau tidak");
                    $("#konf_stsnhi").focus();
                    return false;  
                 }
                 
                
                 
              });      
           });
        </script> 
        

</head>

<body>

<?php // aksi untuk edit
 
            $id = $_POST['id'];
            $ndkonfirmasito = $_POST['ndkonfirmasito'];
            $konf_stsblokir = $_POST['konf_stsblokir'];
            $konf_stssegel = $_POST['konf_stssegel'];
            $konf_stsnhi = $_POST['konf_stsnhi'];
            $status_ket = $_POST['status_ket'];
            $nm_userp2=$_SESSION['nm_lengkap'];
            $nip_userp2=$_SESSION['nip_baru'];
            $ip_userp2= $_SERVER['REMOTE_ADDR'];
            $now=date('Y-m-d H:i:s');
            
//jika yang ditekan adalah tombol setuju
if(isset($_POST['submit1'])) // jika tombol editsubmit ditekan
    
	{
            if($konf_stsnhi=='NHI') {
                echo "<table bgcolor=#202750><tr><td><img src=images/new/warning.png /></td><td><font size=5 color=#fff>GAGAL MENYIMPAN....Anda menyatakan bahwa BCF 1.5 ini terkena NHI, Sebaiknya minta Seksi Tempat Penimbunan Untuk mengirim hardcopy konfirmasi atas BCF 1.5 ini, Masukkan kembali data segel, blokir, dan NHI kemudian klik tombol Kirim Hardcopy. </font></td></tr></table></br>";
                
                 echo "<a href=?hal=daftarconf&pilihp2=jwb_konf&id=$id><<-Kembali->></a>";
            }
            
            elseif($konf_stsblokir=='Blokir') {
                echo "<table bgcolor=#202750><tr><td><img src=images/new/warning.png /></td><td><font size=5 color=#fff>GAGAL MENYIMPAN....Anda menyatakan bahwa importirnya terblokir, Sebaiknya minta Seksi Tempat Penimbunan Untuk mengirim hardcopy konfirmasi atas BCF 1.5 ini, Masukkan kembali data segel, blokir, dan NHI kemudian klik tombol Kirim Hardcopy. </font></td></tr></table></br>";
                
                 echo "<a href=?hal=daftarconf&pilihp2=jwb_konf&id=$id><<-Kembali->></a>";
            }
            else {
    
            $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                        
                                                        konf_statusakhir='konf_jawabok',
                                                      
                                                        konf_stsblokir='$konf_stsblokir',
                                                        konf_stssegel='$konf_stssegel',
                                                        konf_stsnhi='$konf_stsnhi',
                                                        status_ket='$status_ket',
                                                        nm_userp2='$nm_userp2',
                                                        nip_userp2='$nip_userp2',
                                                        ip_userp2='$ip_userp2',
                                                        konf_tglkonfp2='$now'
                                                        
                                                        	WHERE idbcf15='$id'");
                    if($update_konf){
                    $edit = mysql_query("UPDATE bcf15 SET
                                                        ndkonfirmasi='1',
							ndkonfirmasijawaban='1',
                                                        recordstatuskonf='3'
                                                        
                                                        	WHERE idbcf15='$id'");
                
              echo "<table bgcolor=#202750><tr><td><img src=images/new/warning.png /></td><td><font size=5 color=#fff>Konfirmasi persetujuan ini telah disimpan dan dikirim ke Seksi Tempat Penimbunan untuk dibatalkan  status BCF 1.5 nya </font></td></tr></table></br>";
              if($ndkonfirmasito=='1'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan1><<-Inbox Penindakan I->></a>";
              }
              elseif($ndkonfirmasito=='1'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan2><<-Inbox Penindakan II->></a>";
              }
              elseif($ndkonfirmasito=='3'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan3><<-Inbox Penindakan III->></a>";
              }
               

            }
            else {
                echo "tidak berhasil menyimpan";
            }
        }
        }
        //jika yang ditekan adalah tombol kirim hardcopy
elseif(isset($_POST['submit2'])) // jika tombol editsubmit ditekan
	{ 
            $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                        
                                                        konf_statusakhir='konf_hardcopy',
                                                        
                                                        konf_stsblokir='$konf_stsblokir',
                                                        konf_stssegel='$konf_stssegel',
                                                        konf_stsnhi='$konf_stsnhi',
                                                        status_ket='$status_ket',
                                                        nm_userp2='$nm_userp2',
                                                        nip_userp2='$nip_userp2',
                                                        ip_userp2='$ip_userp2',
                                                        konf_tglkonfp2='$now'
                                                        
                                                        	WHERE idbcf15='$id'");
            if($update_konf){
            $edit = mysql_query("UPDATE bcf15 SET
                                                        ndkonfirmasi='1',
							ndkonfirmasijawaban='1',
                                                        recordstatuskonf='2',
                                                        jawabanndkonfirmasi='2'
                                                        
                                                        	WHERE idbcf15='$id'");
                
                
          echo "<table bgcolor=#202750><tr><td><img src=images/new/warning.png /></td><td><font size=5 color=#fff>Permintaan anda berhasil dikirimkan, Hardcopy konfirmasi pembatalan BCF 1.5 akan segera dikirim oleh Seksi Penimbunan. </font></td></tr></table></br>";
              if($ndkonfirmasito=='1'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan1><<-Inbox Penindakan I->></a>";
              }
              elseif($ndkonfirmasito=='1'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan2><<-Inbox Penindakan II->></a>";
              }
              elseif($ndkonfirmasito=='3'){
                  echo "<a href=?hal=daftarconf&pilihp2=newkonf_penindakan3><<-Inbox Penindakan III->></a>";
              }
               
		
        }
        }
else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15, seksi, manifest, tpp, p2, typecode WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and bcf15.idmanifest=manifest.idmanifest and bcf15.idtypecode=typecode.idtypecode and bcf15.ndkonfirmasito=p2.idp2 and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tglndkonf=$data['ndkonfirmasidate'];
        
        $tahun  =  substr($tglndkonf,0,4);
        ?>
   
	
        <form method="post" id="konfirmasiproses" name="konfirmasiproses" action="?hal=daftarconf&pilihp2=jwb_konf">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="ndkonfirmasito" value="<?php echo  $bcf15['ndkonfirmasito']; ?>" />
        
         <div id="groupmodul1">
            <table border="0" width="100%">
     
                <tr valign="top">
                    <td colspan="2">
                        <table class="data isitabel" bgcolor="#eeefff">
                            <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Data BCF 1.5</font>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BCF 1.5
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bcf15no'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bcf15tgl']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BC 1.1
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bc11no'] ?> Pos <?php echo $bcf15['bc11pos'] ?> SubPos <?php if($bcf15['bc11subpos']==''){echo "--";}else{echo $bcf15['bc11subpos'];} ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bc11tgl']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BL/AWB
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['blno'] ?> 
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bltgl']) ?>
                                </td>
                            </tr>
                           <tr class="isitabel">
                                <td >
                                   Consignee
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['consignee'] ?> 
                                </td>
                                <td >
                                  Notify
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['notify'] ?>
                                </td>
                            </tr>
                            
                            <tr class="isitabel">
                                <td >
                                   Uraian Barang
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['amountbrg'] ?>  <?php echo $bcf15['satuanbrg'] ?> <?php echo $bcf15['diskripsibrg'] ?> 
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Berat Bruto (Kg)
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['tonage_groos'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Volume (M3)
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['tonage_netto'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Shipper
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['shipper'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Pelabuhan Asal
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['negaraasal'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor Container
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <table>
                                        
                                               <?php
                                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                                     while($bcfcont = mysql_fetch_array($rowset)){

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
                                            <tr>
                                
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?> / <?php echo $bcfcont['idsize'];?></td>
                                

                            </tr>
                            <?php };?>
                                    </table>
                                    
                                </td>
                                
                            </tr>
                            
                           
                        </table>
                    </td>
                    <td>
                        <table class="data isitabel" bgcolor="#eeefff">
                            <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Posisi Barang</font>
                                </td>
                            </tr>
                             <tr class="isitabel">
                                <td >
                                  No BA Penarikan
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bamasukno'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bamasukdate']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Permohonan  Batal Tarik
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['BatalTarikNo'] ?> <?php echo $bcf15['BatalTarikNo2'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['BatalTarikDate']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Alasan Belum Ditarik
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['BatalTarikKet'] ?>
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  TPS
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['idtps'] ?> 
                                </td>
                                <td >
                                   TPP Tujuan
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['nm_tpp']?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Status
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php if($bcf15[masuk]=='2') echo "<font color=red>Masih DI TPS</font>"; else {echo "MASUK TPP";} ?>
                                </td>
                                
                            </tr>
                            
                        </table>
                    </td>
                </tr>
                
            
            <tr valign="top">
                <td colspan="4">
                    <table class="data isitabel" bgcolor="#eeefff">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Konfirmasi Pembatalan</font>
                                </td>
                         </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Penindakan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                
                                        <?php
                                            $sql = "SELECT * FROM p2 ORDER BY idp2";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idp2]==$bcf15[idp2]) {
                                                          
                                                    echo "$data[nm_p2]";
                                            }
                                            }
                                            ?>
                               
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No Surat Permohonan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['SuratBatalNo'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['SuratBatalDate']) ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Nama Pemohon</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['Pemohon'] ?>
                            </td>
                            
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Alamat</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['AlamatPemohon'] ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Jalur</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                
                                       <?php
                                        $sql = "SELECT * FROM jalur ORDER BY idjalur";
                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                        while ($data =mysql_fetch_array($qry)) {
                                                if ($data[idjalur]==$bcf15[jalur]) {
                                                       
                                                    echo "$data[jalur]";
                                            }
                                        }
                                            ?>
                                
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Dokumen Pemberitahuan</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                
                                       <?php
                                        $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[DokumenCode]) {
                                                    
                                                       
                                                    echo "$data[dokumenname]";
                                            }
                                        }
                                            ?>
                                
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Pemberitahuan Nomor /Tgl</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['DokumenNo'] ?> / <?php echo tglindo($bcf15['DokumenDate']) ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Dokumen Pengeluaran</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                
                                       <?php
                                        $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[Dokumen2Code]) {
                                                    
                                                       
                                                    echo "$data[dokumenname]";
                                            }
                                        }
                                            ?>
                                
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Pengeluaran Nomor /Tgl</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['Dokumen2No'] ?> / <?php echo tglindo($bcf15['Dokumen2Date']) ?>
                            </td>
                        </tr>
                         <?php 
                         $query  = "SELECT * FROM arsip_loket_pembatalan where idbcf15='$id' and jenis_dok='2'";
                         $hasil  = mysql_query($query);
                         
                         $cek=mysql_numrows($hasil);
                         if($cek>0){

                            
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Lihat Persetujuan Reekspor</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    <p><a href='arsip/reekspor/download.php?id=".$bcf15['idbcf15']."'><img src=images/new/download.jpg /></a></p>
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
                        <?php
                        $sqlkonf = "SELECT * FROM kofirmasi_p2 where  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sqlkonf);
                        $data = mysql_fetch_array($query);
                        ?>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Nama Importir</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['nm_consignee'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">NPWP Importir</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['npwp_consignee'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No NHP</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['CacahNo'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['CacahDate']) ?>
                            </td>
                        </tr>
                        <?php 
                        if($bcf15['redress']=='1') {
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>No Surat Redress</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $bcf15[nosuratredress]
                                  </td>";
                            echo "<td>
                                    <font color='#000'>Tanggal</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $bcf15[tglsuratredress]
                                  </td>";
                            echo "</tr >";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Uraian Redress</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    $bcf15[uraianredress]
                                  </td>";
                            
                            echo "</tr >";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Lihat Dokumen</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    <p><a href='redressbc11/download.php?id=".$data['idbcf15']."'><img src=images/new/download.jpg /></a></p>
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
                    </table>
                </td>
            </tr>
            
            <tr valign="top">
                <td colspan="4">
                    
                    <table class="data isitabel" bgcolor="#153351">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Isikan data dibawah ini</font>
                                </td>
                         </tr>
                        <tr>
                            <td>
                                <font color="#fff">Status Blokir</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" disabled name="konf_stsblokir1" value="<?php echo $data['konf_stsblokir'] ?>"/> /
                                
                                <select name="konf_stsblokir" id="konf_stsblokir">
                                    <option value=""></option>
                                    <option value="Blokir">Blokir</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">Status Segel</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                               <input type="text" disabled name="konf_stssegel1" value="<?php echo $data['konf_stssegel'] ?>"/> /
                               <select name="konf_stssegel" id="konf_stssegel">
                                    <option value=""></option>
                                    <option value="Segel">Tersegel</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">Status NHI</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                               <input type="text" disabled name="konf_stsnhi1" value="<?php echo $data['konf_stsnhi'] ?>"/> / 
                               <select name="konf_stsnhi" id="konf_stsnhi">
                                    <option value=""></option>
                                    <option value="NHI">NHI</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">Uraian Ket</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                               <textarea type="text" cols="40" rows="1" id="status_ket" name="status_ket" ><?php echo $data['status_ket'] ?></textarea> 
                            </td>
                            
                        </tr>
                       
                        
                    </table>
                </td>
            </tr>
            <tr><td ><input type="submit" name="submit1" value="Setuju dibatalkan" class="button putih " onclick="javascript:return confirm('BCF 1.5 ini akan dikirim ke Penimbunan dan segera dibatalkan, ANDA YAKIN?')"  /></td><td><input type="submit" name="submit2" value="Kirimkan Hardcopy nya" class="button putih" onclick="javascript:return confirm('BCF 1.5 akan diteliti lebih lanjut,ANDA YAKIN?')"  /></td><td colspan="2"><input class="button putih bigrounded" type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
         </div>  
        </form>
      
	<?php
        
        
        }; // penutup else
?>
    
	

</body>
</html>
<?php
};
?>