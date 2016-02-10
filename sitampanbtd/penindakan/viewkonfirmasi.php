<?php
include "lib/koneksi.php";
include "lib/function.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<html>
    <head>
    <title>Ubah BCF 15</title>
    <link type="text/css" rel="stylesheet" href="themes/main.css" />
       
    </head>
    <body>
<?php

$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15, seksi, manifest, tpp, p2, typecode WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksindkonfirmasi=seksi.idseksi and bcf15.idmanifest=manifest.idmanifest and bcf15.idtypecode=typecode.idtypecode and bcf15.ndkonfirmasito=p2.idp2 and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        $tglndkonf=$data['ndkonfirmasidate'];
        
        $tahun  =  substr($tglndkonf,0,4);

        ?>

	
        
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="thn" value="<?php echo  $data['tahun']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?>" />
        
            <table border="0" width="100%" cellspacing="2" cellpadding="2">
                <tr>
                    <td colspan="2" class="judultabel1">Detail Konfirmasi BCF 1.5</td>
                </tr>
                <tr>
                    <td valign="top">
                        <table id="groupmodul1" width="100%">
                            <tr>
                                <td colspan="2" class="judultabel1"> Data BCF 1.5</td>
                            </tr>
                            <tr>
                                <td class="judulform">BCF 1.5</td>
                                <td class="isitabel" ><?php echo  $data['bcf15no']; ?>/<?php echo  $data['kd_manifest']; ?>/<?php echo  $data['tahun']; ?> - <?php echo  tglindo($data['bcf15tgl']); ?></td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">BC 1.1</td>
                                <td class="isitabel"><?php echo  $data['bc11no']; ?>     | Pos : <?php echo  $data['bc11pos']; ?> |  subpos :<?php echo  $data['bc11subpos']; ?> | <?php echo  tglindo($data['bc11tgl']); ?> </td>
                            </tr>
                            <tr>
                                <td class="judulform">B / L </td>
                                <td class="isitabel" ><?php echo  $data['blno']; ?>   <?php echo  tglindo($data['bltgl']); ?></td>
                            </tr>
                            <tr>
                                <td class="judulform">Sarana Pengangkut </td>
                                <td class="isitabel" ><?php echo  $data['saranapengangkut']; ?> <?php echo  $data['voy']; ?></td>
                            </tr>
                             <tr>
                                <td class="judulform">Jumlah/Satuan/Uraian Brg</td>
                                <td class="isitabel" ><?php echo  $data['amountbrg']; ?> <?php echo  $data['satuanbrg']; ?> <?php echo  $data['diskripsibrg']; ?></td>
                            </tr>
                            <tr>
                                <td class="judulform">Bruto (Kg)</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['tonage_groos']; ?></td>

                            </tr>
                            <tr>
                                <td class="judulform">Netto (Kg)</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['tonage_netto']; ?></td>

                            </tr>

                            <tr>
                                <td class="judulform">Shipper</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['shipper']; ?></td>

                            </tr>
                            <tr>
                                <td class="judulform">Negara Asal</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['negaraasal']; ?></td>

                            </tr>

                            <tr>
                                <td class="judulform">Consignee</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['consignee']; ?></td>

                            </tr>
                             <tr>
                                <td class="judulform">Notify</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['notify']; ?></td>

                            </tr>
                            <tr>
                                <td class="judulform">TPS</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['idtps']; ?></td>

                            </tr>
                            <tr>
                                <td class="judulform">TPP Tujuan</td>
                                <td class="isitabel" colspan="3"><?php echo  $data['nm_tpp']; ?></td>

                            </tr>
                            <tr>
                                <td class="judulform">Posisi Barang (Terupdate)</td>
                                <td class="isitabel"><?php if ($data['bamasukno']=='') {echo "<font color='blue'>TPS :$data[idtps] </font>"; }  else {echo "<font color=red>TPP :$data[nm_tpp]</font>";} ?></td>
                    
                            </tr>
                            <tr>
                            <tr>
                                <td class="judulform">Type Cont</td>
                                <td class="isitabel"><?php echo  $data['nm_type']; ?></td>

                            </tr>
                            <td colspan="2">
                    
                                <table cellspacing="3" cellpadding="3">
                                    <tr>

                                        <td class="judultabel">No Container</td>
                                        <td class="judultabel">Ukuran</td>
                                        <td class="judultabel">Segel Pelayaran</td>


                                    </tr>
                                        <?php
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                             while($bcfcont = mysql_fetch_array($rowset)){



                                        ?>
                                    <tr>

                                        <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                        <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>
                                        <td class="isitabel"><?php if ($bcfcont['segelpelayaran_man']=='') {echo "<font color=blue>N/A</font>"; }  else {echo $bcfcont['segelpelayaran_man'];}  ?></td>

                                    </tr>
                                    <?php };?>
                                </table>
                             </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table id="groupmodul1" width="100%" cellspacing="2" cellpadding="2">
                             <tr>
                                <td colspan="2" class="judultabel1"> Data Pemberitahuan</td>
                            </tr>
                            <tr>
                                <td class="judulform"><?php
                                        $sql1 = "SELECT * FROM dokumen ORDER BY iddokumen";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[iddokumen]==$data[DokumenCode]) {
                                                  
                                                    echo "$jawaban[dokumenname]";
                                                }
                                            }
                                    ?></td>
                                 <td class="isitabel" ><?php echo  $data['DokumenNo']; ?> / <?php echo  tglindo($data['DokumenDate']); ?> </td>
                                
                                    
                            
                            <tr>
                                <td class="judulform"><?php
                                        $sql1 = "SELECT * FROM dokumen ORDER BY iddokumen";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[iddokumen]==$data[Dokumen2Code]) {
                                                  
                                                    echo "$jawaban[dokumenname]";
                                                }
                                            }
                                    ?></td>
                                <td class="isitabel" ><?php echo  $data['Dokumen2No']; ?> / <?php echo  tglindo($data['Dokumen2Date']); ?> </td>
                                
                                    
                            </tr>
                            
                            <tr>
                                <td class="judulform">Jalur</td>
                                <td class="isitabel" >
                                    <?php
                                        $sql1 = "SELECT * FROM jalur ORDER BY idjalur";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[idjalur]==$data[jalur]) {
                                                  
                                                    echo "$jawaban[nm_jalur]";
                                                }
                                            }
                                    ?>
                                </td>
                                    
                            </tr>
                            
                        </table>
                         <table id="groupmodul1" width="100%" cellspacing="2" cellpadding="2">
                            <tr>
                                <td colspan="2" class="judultabel1"> Surat Permohonan Pembatalan BCF 1.5</td>
                            </tr>
                            <tr>
                                <td class="judulform">Nomor</td>
                                <td class="isitabel"><?php echo $data['SuratBatalNo'];?>  </td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">Tanggal</td>
                                <td class="isitabel"> <?php echo $data['SuratBatalDate'];?> </td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">Nama Pemohon </td>
                                <td class="isitabel"> <?php echo $data['Pemohon'];?> </td>
                                    
                            </tr>
                            <tr>
                                <td colspan="2" class="judultabel1"> Konfirmasi BCF 1.5 Dari Seksi TP</td>
                            </tr>
                            <tr>
                                <td class="judulform">Nomor</td>
                                <td class="isitabel"><?php echo $data['ndkonfirmasino'];?>  </td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">Tanggal </td>
                                <td class="isitabel"> <?php echo $data['ndkonfirmasidate'];?> </td>
                                    
                            </tr>
                            
                            <tr>
                                <td class="judulform">Seksi TP</td>
                                <td class="isitabel">  <?php echo $data['nm_seksi'];?></td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">NIP</td>
                                <td class="isitabel"> <?php echo $data['nip'];?> </td>
                                    
                            </tr>
                            <tr>
                                <td class="judulform">Jabatan</td>
                                <td class="isitabel"> <?php echo $data['plh'];?><?php echo $data['jabatan'];?> </td>
                                    
                            </tr>
                           
                        </table>
                    </td>
                </tr>
                <tr><td colspan="6">
                <?php
                                            $sqlkon = "SELECT * FROM bcf15,jawabankonfirmasi where bcf15.jawabanndkonfirmasi=jawabankonfirmasi.idjawabankonfirmasi and  idbcf15='$id'"; // memanggil data dengan id yang ditangkap tadi
                                            $query = mysql_query($sqlkon);
                                            while($bcf15 = mysql_fetch_array($query)) {
                                                
                                                if ($bcf15['jawabanndkonfirmasi']=='2'){
                                              
                                         
                                                 echo "<table  id='groupmodul1' border='0' cellpadding='2' cellspacing='2' width='50%'>";
                                                 echo "<tr><td  class='judulform' width='20'>Jawaban</td><td class='isitabel' bgcolor='red'><font color='#fff'>Tidak Setuju</font></td></tr>";
                                                 echo "<tr><td  class='judulform' width='20'>Alasan</td><td class='isitabel' bgcolor='red'><font color='#fff'>$bcf15[jawabanp2Ket]</font></td></tr>";
                                                 echo "";
                                                }
                                                elseif ($bcf15['jawabanndkonfirmasi']=='1'){
                                                    echo "<table  id='groupmodul1' border='0' cellpadding='2' cellspacing='2' width='50%'>";
                                                 echo "<tr><td  class='judulform' width='20'>Jawaban</td><td class='isitabel' bgcolor='green'><font color='#fff'>Setuju, Proses Lanjut</font></td></tr>";
                                                 
                                                 echo "";
                                                }
                                         echo "</table>";
                                            }
                                               
                                        ?>
                    </td></tr>
                
           
            </table>
        
       
<?php ;?>
  </body>
        </html>
        <?php
};
?>