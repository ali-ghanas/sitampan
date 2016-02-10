<?php
include "lib/koneksi.php";
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
    <title>SITAMPAN-STATUS AKHIR</title>
    
    
    </head>
    <body>
        
            <?php
            include 'lib/function.php';
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15,tpp,typecode WHERE  bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');

                ?>
        <div>
            <table width="100%" border="0">
                <tr>
                    <td colspan="2">Detail Pencarian</td>
                </tr>
                <tr>
                    <td colspan="2"><a href="?hal=detailstatusakhirman&id=<?php echo $data[idbcf15]; ?>">Detail BCF15</a> | <a href="?hal=detailstatusakhir_tarik&id=<?php echo $data[idbcf15]; ?>">Penarikan BCF 1.5</a> | <a href="?hal=detailstatusakhir_bc11&id=<?php echo $data[idbcf15]; ?>">Pembukaan Pos BC 1.1</a> | <a href="?hal=detailstatusakhir_btlbcf15&id=<?php echo $data[idbcf15]; ?>">Pembatalan BCF 1.5</a> | <a>Status Akhir</a> | <a>Catatan Petugas</a> | <a>History By User</a></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr >
                                <td class="isitabel">
                                    Nomor BCF 1.5
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="isitabel">
                                    Nomor BC 1.1
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td class="isitabel">
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM statusakhir WHERE  idstatusakhir=$data[idstatusakhir]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datastatus = mysql_fetch_array($query);
                            
                            ?>
                            <tr >
                                <td class="isitabel">
                                    Status Akhir
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel" colspan="3">
                                    <?php if($data[idstatusakhir]=='') {echo "BCF 1.5";}else{ echo $datastatus['statusakhirname'];} ?>  
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr valign="top" class="isiform">
                    <td width="50%" class="isiform">
                        <table id="tablemodul">
                            <tr >
                                <td class="judultabel">
                                    Nomor BCF 1.5
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td>
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Nomor BC 1.1
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td>
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td>
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Nomor BL
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['blno']; ?>  
                                </td>
                                <td> <?php echo $data['bltgl']; ?></td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Sarana Pengangkut
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['saranapengangkut']; ?>  
                                </td>
                                <td> Voy <?php echo $data['voy']; ?> </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Uraian Barang
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['amountbrg']; ?> <?php echo $data['satuanbrg']; ?>  <?php echo $data['diskripsibrg']; ?>
                                </td>
                            </tr>
                            
                            <tr >
                                <td class="judultabel">
                                    Bruto
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['tonage_groos']; ?> Kg
                                </td>
                                <td class="judultabel">
                                    Volume
                                </td>
                                
                                <td >
                                    <?php echo $data['tonage_netto']; ?> M3
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Pelabuhan Asal
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['negaraasal']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Shipper
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['shipper']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Consignee
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['consignee']; ?>
                                </td>
                                <td >
                                    <?php echo $data['consigneeadrress'];echo $data['consigneekota']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                    Notify
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['notify']; ?>
                                </td>
                                <td >
                                    <?php echo $data['notifyadrress'];echo $data['notifykota']; ?>
                                </td>
                            </tr>
                            <?php 
                        if($data['redress']=='1') {
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>No Surat Redress</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $data[nosuratredress]
                                  </td>";
                            echo "<td>
                                    <font color='#000'>Tanggal</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $data[tglsuratredress]
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
                                    $data[uraianredress]
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
                            
                            
                        </table>
                    </td>
                    <td  class="isiform" width="50%">
                        <table id="tablemodul" >
                            <tr>
                                <td class="judultabel">
                                    TPS
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['idtps']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                    TPP
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['nm_tpp']; ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="judultabel">
                                   Posisi Barang Saat Ini
                                </td>
                                <td >:</td>
                                <td >
                                    <?php if ($data['bamasukno']=='') {echo "<font color=red>TPS :$data[idtps] </font>"; }  else {echo "<font color=blue>TPP :$data[nm_tpp]</font>";} ?> <?php if ($data['bamasukno']==''){echo "";} else { echo "Dengan Berita Acara Penarikan BCF 1.5 nomor : $data[bamasukno] tanggal $data[bamasukdate]";} ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                    No SP BCF 1.5
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['suratpengantarno']; ?>
                                /
                                    <?php echo $data['suratpengantartgl']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                    Kepala Seksi Manifest
                                </td>
                                <td >:</td>
                                <td >
                                    <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksi=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?>
                                </td>
                                 
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Type Cont
                                </td>
                                <td >:</td>
                                <td >
                                     <?php echo $data['nm_type']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel" >No Container</td>
                                <td class="judultabel" >Size</td>
                                <?php
                                     $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                     while($bcfcont = mysql_fetch_array($rowset)){
                                     ?>
                                         
                                        
                                        
                                    
                            </tr>
                            <?php
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
                                        <td class="isitabel" ><?php echo $bcfcont['nocontainer'];?></td>
                                         <td class="isitabel" width="10"><?php echo $bcfcont['idsize'];?></td>
                            <?php };?>
                            
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                
            </table>
        </div>
        

</body>
</html>
<?php
};
?>