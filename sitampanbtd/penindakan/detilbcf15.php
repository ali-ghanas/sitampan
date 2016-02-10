<?php
include "../lib/koneksi.php";
include "../lib/function.php";
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
    <link type="text/css" rel="stylesheet" href="../themes/main.css" />
       
    </head>
    <body>
<?php

$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15, seksi, manifest, tpp, p2, typecode WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and bcf15.idmanifest=manifest.idmanifest and bcf15.idtypecode=typecode.idtypecode and bcf15.ndkonfirmasito=p2.idp2 and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        $tglndkonf=$data['ndkonfirmasidate'];
        
        $tahun  =  substr($tglndkonf,0,4);

        ?>

	
        <form method="post" id="validasitpp3edit" name="validasitpp3edit" action="?hal=validasitpp3edit">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="thn" value="<?php echo  $data['tahun']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?>" />
        <div id="groupmodul1">
            <table border="0">
     
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Detail BCF 1.5</b> </td>
                </tr>
                <tr>
                    <td class="judultabel1">Nomor BCF 1.5</td><td>:</td>
                    <td class="isitabel" ><?php echo  $data['bcf15no']; ?>/<?php echo  $data['kd_manifest']; ?>/<?php echo  $data['tahun']; ?></td>
                   
                </tr>
                <tr>
                    <td class="judultabel1">Tgl BCF 1.5</td><td>:</td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    
                </tr>
                <tr>
                    <td class="judultabel1">Nomor / tgl BC 11</td><td>:</td>
                    <td class="isitabel"><?php echo  $data['bc11no']; ?>     | Pos : <?php echo  $data['bc11pos']; ?> |  subpos :<?php echo  $data['bc11subpos']; ?> | <?php echo  tglindo($data['bc11tgl']); ?> </td>
                    
                </tr>
                <tr>
                    <td class="judultabel1">Nomor/tgl BL</td><td>:</td>
                    <td class="isitabel" ><?php echo  $data['blno']; ?>   <?php echo  tglindo($data['bltgl']); ?></td>
                   
                </tr>
                <tr>
                    <td class="judultabel1">Sarkut/Voy</td><td>:</td>
                    <td class="isitabel" ><?php echo  $data['saranapengangkut']; ?> <?php echo  $data['voy']; ?></td>
                   
                    
                </tr>
                <tr>
                    <td class="judultabel1">Jumlah/Satuan/Uraian Brg</td><td>:</td>
                    <td class="isitabel" ><?php echo  $data['amountbrg']; ?> <?php echo  $data['satuanbrg']; ?> <?php echo  $data['diskripsibrg']; ?></td>
                  
                </tr>
                <tr>
                    <td class="judultabel1">Consignee</td><td>:</td>
                    <td class="isitabel" colspan="3"><?php echo  $data['consignee']; ?></td>
                                        
                </tr>
                 <tr>
                    <td class="judultabel1">Notify</td><td>:</td>
                    <td class="isitabel" colspan="3"><?php echo  $data['notify']; ?></td>
                                        
                </tr>
                <tr>
                    <td class="judultabel1">TPS</td><td>:</td>
                    <td class="isitabel" colspan="3"><?php echo  $data['idtps']; ?></td>
                                        
                </tr>
                <tr>
                    <td class="judultabel1">TPP Tujuan</td><td>:</td>
                    <td class="isitabel" colspan="3"><?php echo  $data['nm_tpp']; ?></td>
                                        
                </tr>
                
                <tr>
                    <td class="judultabel1">Posisi Barang (Terupdate)</td><td>:</td>
                    <td class="isitabel"><?php if ($data['bamasukno']=='') {echo "<font color=blue>TPS :$data[idtps] ($data[nm_tpp])</font>"; }  else {echo "<font color=red>TPP :$data[nm_tpp]</font>";} ?></td>
                    
                </tr>
                <tr>
                    <td class="judultabel1">Type Cont</td><td>:</td>
                    <td class="isitabel"><?php echo  $data['nm_type']; ?></td>
                    
                </tr>
                
               
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Container</b> </td>
                </tr>
                <tr>
                <td colspan="2"></td>
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
            <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Permohonan Pembatalan</b> </td>
           </tr>
           <tr>
               <td class="judultabel1">No Surat Permohonan</td><td>:</td>
               <td class="isitabel">
                  <?php echo $data['SuratBatalNo'];?>   <?php echo $data['SuratBatalDate'];?> 
               </td>
           </tr>
           <tr>
               <td class="judultabel1">Identitas Pemohon</td><td>:</td>
               <td class="isitabel">
                  <?php echo $data['Pemohon'];?>  <?php echo "alamat : $data[AlamatPemohon]";?> 
               </td>
           </tr>
           <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Konfirmasi</b> </td>
           </tr>
           <tr>
               <td class="judultabel1">Tujuan Konfirmasi</td><td>:</td>
               <td class="isitabel">
                  <?php echo $data['nm_p2'];  ?>   
               </td>
           </tr>
           <tr>
               <td class="judultabel1">No ND Konfirmasi</td><td>:</td>
               <td class="isitabel">
                  <?php echo $data['ndkonfirmasino'];?><?php if ($data['bamasukno']=='') {echo "<font color=blue>/KPU.01/BD.0404/$tahun</font>"; }  else {echo "/KPU.01/BD.0503/$tahun";}  ?>  /  <?php echo tglindo($data['ndkonfirmasidate']);?>  
                  
               </td>
           </tr>
           
           
           
           
            </table>
        </div>
        </form>
<?php ;?>
  </body>
        </html>
        <?php
};
?>