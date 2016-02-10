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
    <title>Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>


    <style type="text/css"> 
      div.pesan {
        height:250px;
        display:none;
        float: none;
      }
      div.pesan, p.flip {
        margin: 0px;
        padding: 5px;
        text-align: center;
        background: #fff;
        border: 1px solid black;
        cursor: pointer;
        
      }
      
      .ui-widget { 
      font-family: Arial,Verdana,sans-serif; 
      font-size: 1.0em;
   }  
   .ui-widget-header { 
      border: 1px solid #2b3846; 
      background: #2b3846;
      font-weight: bold; }
   .ui-widget-content { 
      border: 1px solid #2b3846; 
      background: #fcfcfd;
      color: #182e43; 
      
   }
   .tabs-bottom .ui-tabs-panel { 
      height: 450px; 
      overflow: auto; 
   } 
   .tabs-bottom .ui-tabs-nav { 
      position: absolute; 
      left: 0; 
      bottom: 0; 
      right:0; 
      padding: 0 0.2em 0.2em 0; 
   }  
   .tabs-bottom .ui-tabs-nav li { 
      margin-top: -2px; 
      margin-bottom: 1px; 
      border-bottom-width: 1px; 
      border-top: none;
      background: #fff;
   }
  #suratbataltpp ul li a  {
       background: #d6dceb;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>
                 
    

    </head>
    <body>
       
	     <?php // aksi untuk edit
session_start();


                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15,tpp,typecode WHERE  bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');
                
        
        ?>
        <form method="post" id="inputmohonbatal" name="inputmohonbatal" action="?hal=pagefront&pilih=inputpermohonan">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
       <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                <tr>
                    <td>
                        <table>
                            <tr >
                                <td class="isitabelnew">
                                    Nomor BCF 1.5
                                </td>
                                <td class="isitabelnew">:</td>
                                <td >
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td >
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="isitabelnew">
                                    Nomor BC 1.1
                                </td>
                                <td class="isitabelnew">:</td>
                                <td >
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td >
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td >
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM statusakhir WHERE  idstatusakhir=$data[idstatusakhir]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datastatus = mysql_fetch_array($query);
                            
                            $sqlcatatan = "SELECT * FROM catatan_kaki WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                            $querycatatan = mysql_query($sqlcatatan);
                            if($data[reekspor]==1){
                               

                                    echo "<script type='text/javascript'>
                                    alert('PENGAJUAN REEKSPOR KE MANIFEST');</script>";

                                
                            }
                            if($data[idstatusakhir]==15){
                                while($datacatatan = mysql_fetch_array($querycatatan)){

                                    echo "<script type='text/javascript'>
                                    alert('$datacatatan[catatan_kaki]');</script>";

                                }
                            }
                            elseif($data[idstatusakhir]==9){
                               

                                    echo "<script type='text/javascript'>
                                    alert('BCF 1.5 telah ditetapkan menjadi BMN');</script>";

                                
                            }
                            $sqlredress = "SELECT * FROM bcf15redress WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                            $queryredress = mysql_query($sqlredress);
                            $dataredress = mysql_numrows($queryredress);
                            if($dataredress>0){
                                while($uraianredress = mysql_fetch_array($queryredress)){

                                    echo "<script type='text/javascript'>
                                    alert('$uraianredress[uraian_redress]');</script>";

                                }
                                
                            }
                            ?>
                            <tr >
                                <td class="isitabelnew">
                                    Status Akhir
                                </td>
                                <td class="isitabelnew">:</td>
                                <td  colspan="3">
                                    <?php if($data[idstatusakhir]=='') {echo "BCF 1.5";}else{ echo $datastatus['statusakhirname'];} ?>  
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>          
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Manifest</a></li>   
                                  <li><a href="#tabs-2">Penarikan</a></li>
                                  <li><a href="#tabs-3">BukaPos</a></li>
                                  <li><a href="#tabs-4">Batal BCF 1.5</a></li>
                                  <li><a href="#tabs-5">Catatan Petugas</a></li>
                                  <li><a href="#tabs-6">Status Akhir</a></li>
                                  

                              </ul>
                        
                                <div id="tabs-1" >
                                    <table >
                                        <tr valign="top" class="isiform">
                                            <td width="50%" >
                                                <table class="isitabel" >
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            BCF 1.5
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['bcf15no']; ?>  
                                                        </td>
                                                        <td>
                                                            <?php echo $data['bcf15tgl']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            BC 1.1
                                                        </td>
                                                       <td class="isitabelnew">:</td>
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
                                                        <td class="isitabelnew">
                                                            HBL
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['blno']; ?>  
                                                        </td>
                                                        <td> <?php echo $data['bltgl']; ?></td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Sarana Pengangkut
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['saranapengangkut']; ?>  
                                                        </td>
                                                        <td> Voy <?php echo $data['voy']; ?> </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Uraian Barang
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['amountbrg']; ?> <?php echo $data['satuanbrg']; ?>  <?php echo $data['diskripsibrg']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Bruto
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['tonage_groos']; ?> Kg
                                                        </td>
                                                        <td >
                                                            Volume
                                                        </td>

                                                        <td >
                                                            <?php echo $data['tonage_netto']; ?> M3
                                                        </td>

                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Pelabuhan Asal
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['negaraasal']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Shipper
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['shipper']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Consignee
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td colspan="2">
                                                            <?php echo $data['consignee']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td colspan="2">
                                                            <?php echo $data['consigneeadrress'];echo $data['consigneekota']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                            Notify
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td colspan="2">
                                                            <?php echo $data['notify']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td colspan="2">
                                                            <?php echo $data['notifyadrress'];echo $data['notifykota']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                if($data['redress']=='1') {
                                                    echo "<tr  bgcolor='#b7ec98'>";
                                                    echo "<td class='isitabelnew'>
                                                            <font color='#000'>No Surat Redress</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $data[nosuratredress]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $data[tglsuratredress]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#b7ec98'>";
                                                    echo "<td class='isitabelnew'>
                                                            <font color='#000'>Uraian Redress</font>
                                                          </td>
                                                          <td class='isitabelnew'>
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
                                            <td   width="50%">
                                                <table class="isitabel">
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            TPS
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['idtps']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            TPP
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['nm_tpp']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="isitabelnew">
                                                           Posisi Barang Saat Ini
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php if ($data['bamasukno']=='') {echo "<font color=red>TPS :$data[idtps] </font>"; }  else {echo "<font color=blue>TPP :$data[nm_tpp]</font>";} ?> <?php if ($data['bamasukno']==''){echo "";} else { echo "Dengan Berita Acara Penarikan BCF 1.5 nomor : $data[bamasukno] tanggal $data[bamasukdate]";} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            No SP BCF 1.5
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['suratpengantarno']; ?>
                                                        /
                                                            <?php echo $data['suratpengantartgl']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            Kepala Seksi Manifest
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksi=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                           Type Cont
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                             <?php echo $data['nm_type']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr  >
                                                        <td colspan="3">
                                                            <table class="data">
                                                                <tr>
                                                                    <td  class="judultabel">No Container</td>
                                                                    <td  class="judultabel">Size</td>
                                                                </tr>
                                                                <?php
                                                             $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                                             while($bcfcont = mysql_fetch_array($rowset)){
                                                             ?>


                                                                
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

                                                                </tr>
                                                            </table>
                                                        </td>
                                                        
                                                        


                                                    </tr>
                                                    
                                                    
                                                </table>

                                            </td>
                                        </tr>
                                        <?php
                                        $sqlstrip = "SELECT * FROM suratmasukstripping where idbcf15=$data[idbcf15] and setujustrip='1' ";
                                        $querystrip = mysql_query($sqlstrip);
                                        $datastrip=mysql_fetch_array($querystrip);
                                        $cekstrip=mysql_numrows($querystrip);
                                        if($cekstrip>0){
                                       ?>
                                        
                                        <tr>
                                            <td colspan="2">
                                                <table width="100%" class="isitabel">
                                                    <tr>
                                                        <td bgcolor="#d2d945" colspan="4">
                                                            <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Surat Pesetujuan Striping Container</span> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                               Permohonan Stripping
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['nosrt']; ?> /  <?php echo tglindo($datastrip['tglsrt']); ?>
                                                         </td>
                                                    </tr>
                                                   
                                                    
                                                    <tr>
                                                        <td class="isitabelnew">
                                                             Tgl Aju Permohonan
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['tgl_ajupermohonan']; ?>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            Persetujuan Stripping
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['nopersetujuanstriping']; ?> / <?php echo $datastrip['tgpersetujuanstriping']; ?>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            Persetujuan Pengeluaran Empty
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['nosetujuempty']; ?> / <?php echo $datastrip['tglsetujuempty']; ?>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            Container Sebelumnya
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['nocontainerbefore']; ?> 
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="isitabelnew">
                                                            Stripping Ke
                                                         </td>
                                                         <td class="isitabelnew">:</td>
                                                         <td >
                                                                  <?php echo $datastrip['nocontainerafter']; ?> 
                                                         </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                            
                                       <?php } ?>
                                        
                                    </table>
                                    
                                </div>
                                <div id="tabs-2">
                                    <table valign="top">
                                        <tr valign="top" >
                                                <td width="50%" class="isitabel" >
                                                    <table  >

                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                No Surat Perintah
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['suratperintahno']; ?>  
                                                            </td>
                                                            <td>
                                                                <?php echo $data['suratperintahdate']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               Pejabat
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksitp2=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?> 
                                                            </td>

                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                                No Surat Pemberitahuan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['suratno']; ?>  
                                                            </td>
                                                            <td>
                                                                <?php echo $data['suratdate']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               Pejabat 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksitp3=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?>
                                                            </td>

                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               TPS
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['idtps']; ?>
                                                            </td>

                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               TPP
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['nm_tpp']; ?>
                                                            </td>

                                                        </tr>
                                                        <tr valign="top">
                                                            <td class="isitabelnew">
                                                               Posisi Barang Terupdate
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php if ($data['bamasukno']=='') {echo "<font color=red>TPS :$data[idtps] </font>"; }  else {echo "<font color=blue>TPP :$data[nm_tpp]</font>";} ?> <?php if ($data['bamasukno']==''){echo "";} else { echo "Dengan Berita Acara Penarikan BCF 1.5 nomor : $data[bamasukno] tanggal $data[bamasukdate]";} ?>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <table class="data">
                                                                <tr>
                                                                    <td  class="judultabel">No Container</td>
                                                                    <td  class="judultabel">Size</td>
                                                                    <td  class="judultabel">Masuk</td>
                                                                    <td  class="judultabel">Gate</td>
                                                                </tr>
                                                                <?php
                                                                     $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                                                     while($bcfcont = mysql_fetch_array($rowset)){
                                                                     ?>



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
                                                                        <td class="isitabel" width="10"><?php echo $bcfcont['tg_masuk'];?></td>
                                                                        <td class="isitabel" width="10"><?php echo $bcfcont['nm_petugas_masuk'];?></td>
                                                                        <?php };?>

                                                                        </tr>
                                                                </table>
                                                            </td>
                                                        </tr>


                                                    </table>
                                                </td>
                                                <td width="50%" class="isitabel" >
                                                    <table  >
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Penarikan Ke TPP</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Berita Acara Penarikan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['bamasukno']; ?> / <?php echo $data['bamasukdate']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Tanggal Input
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['bamasukdatetrx']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Permohonan Pemberitahuan Batal Tarik</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor Surat
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['BatalTarikNo']; ?> / <?php echo $data['BatalTarikNo2']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Tanggal 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['BatalTarikDate']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Keterangan Penarikan 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['BatalTarikKet']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Pembukaan Segel</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor ND Buka Segel
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['ndsegelno']; ?> / <?php echo $data['ndsegeldate']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Penindakan 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['idp2']; ?> 
                                                            </td>
                                                        </tr>


                                                    </table>

                                                </td>
                                            </tr>
                                            
                                    </table>
                                </div>
                                <div id="tabs-3">
                                    <table width="100%">
                                        <tr valign="top" class="isiform">
                                            <td width="100%" class="isitabel">
                                                <table  width="100%">
                                                    <?php 
                                                    $sqlbukapos = "SELECT * FROM bukaposbc11 where idbcf15=$data[idbcf15] ";
                                                    $querybukapos = mysql_query($sqlbukapos);
                                                    $databukapos=mysql_fetch_array($querybukapos);
                                                    
                                                    ?>
                                                    <tr>
                                                        <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Pembukaan Pos BC 1.1</td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           No Surat Permohonan Pembukaan Pos
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                             <?php echo $databukapos['no_surat_bukapos']; ?> / <?php echo tglindo($databukapos['tgl_surat_bukapos']); ?>
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           Tanggal Pembukaan Pos BC 1.1
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo tglindo($data['tglbukaposbc11ceisa']); ?>
                                                        </td>

                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           Nama Pemohon
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $databukapos['nm_pemohon']; ?>
                                                        </td>

                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           Nota Dinas Pembukaan Pos Ke Manifest
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['nobukaposbc11ceisa']; ?> / <?php echo $data['tglbukaposbc11ceisa']; ?>
                                                        </td>

                                                    </tr>
                                                    <tr >
                                                        <td class="isitabelnew">
                                                           Jawaban Buka Pos Manifest
                                                        </td>
                                                        <td class="isitabelnew">:</td>
                                                        <td >
                                                            <?php echo $data['jawaban_bukaposbc11no']; ?> / <?php echo $data['jawaban_bukaposbc11tgl']; ?>
                                                        </td>

                                                    </tr>


                                                </table>
                                            </td>
                                            
                                        </tr>
                                    </table>
                                </div>
                                <div id="tabs-4">
                                    <table>
                                        <tr valign="top" class="isiform">
                                                <td width="50%" class="isitabel">
                                                    <table  >
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Permohonan Pembatalan BCF 1.5</td>
                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                               No Surat 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['SuratBatalNo']; ?>   
                                                            </td>
                                                            <td>
                                                               <?php echo $data['SuratBatalDate']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Nama Pemohon
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['Pemohon']; ?> 
                                                            </td>

                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Alamat Pemohon
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['AlamatPemohon']; ?> 
                                                            </td>

                                                        </tr>
                                                         <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Pencacahan BCF 1.5 Dalam Rangka Pembatalan BCF 1.5</td>
                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Nomor NHP
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['CacahNo']; ?> /<?php echo $data['CacahDate']; ?> 
                                                            </td>

                                                        </tr>
                                                        <?php 

                                                        if($data['reekspor']=='1'){
                                                        echo "<tr><td colspan=4>Proses Reekspor</td></tr>";
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>No ND Kasi Manifest(Bantuan Pencacahan)</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $data[nondmanifestreekspor] / $data[tglndmanifestreekspor]
                                                              </td>";
                                                        echo "</tr>";
                                                            if($data['jawabanndreekspor']=='1'){
                                                                echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                                echo "<td>
                                                                        <font color='#000'>ND Jawaban Penimbunan</font>
                                                                      </td>
                                                                      <td>
                                                                        <font color='#000'>:</font>
                                                                      </td>
                                                                      <td>
                                                                        $data[jawabanndreeksporno] / $data[jawabanndreeksportgl]
                                                                      </td>";
                                                                echo "</tr>";

                                                            }
                                                            else{
                                                                echo "";
                                                            }

                                                        }



                                                    ?>
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Konfirmasi BCF 1.5 Seksi Penimbunan Ke Seksi Penindakan III</td>
                                                        </tr>
                                                        <?php 
                                                        $sqlkonf = "SELECT * FROM kofirmasi_p2 WHERE  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                                                        $querykonf = mysql_query($sqlkonf);
                                                        $datastatuskonf = mysql_fetch_array($querykonf);
                                                        $cek=mysql_numrows($querykonf);
                                                        if($cek>0){
                                                        echo "<tr><td colspan=4>Konfirmasi Online</td></tr>";
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Tgl Kirim Seksi Penimbunan</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[konf_tglkonftpp]
                                                              </td>";
                                                        echo "</tr>";
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Tgl Jawab P2</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[konf_tglkonfp2]
                                                              </td>";
                                                        echo "</tr>";
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Blokir</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[konf_stsblokir]
                                                              </td>";
                                                        echo "</tr>";
                                                         echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Segel</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[konf_stssegel]
                                                              </td>";
                                                        echo "</tr>";
                                                         echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>NHI</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[konf_stsnhi]
                                                              </td>";
                                                        echo "</tr>";
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Keterangan P2</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[status_ket]
                                                              </td>";
                                                        echo "</tr>";
                                                        if($datastatuskonf[Catatan_manual_p2]==''){echo "";}
                                                        else{
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'></font>
                                                              </td>
                                                              <td>
                                                                <font color='#000'>:</font>
                                                              </td>
                                                              <td>
                                                                $datastatuskonf[Catatan_manual_p2]
                                                              </td>";
                                                        echo "</tr>";

                                                        }
                                                        if($datastatuskonf['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($datastatuskonf['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($datastatuskonf['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($datastatuskonf['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
                                                        echo "<tr class='isitabel' bgcolor='#e78889'>";
                                                        echo "<td>
                                                                <font color='#000'>Status Akhir Konfirmasi</font>
                                                              </td>
                                                              <td>
                                                                <font color='#000' >:</font>
                                                              </td>
                                                              <td>
                                                               <font color='#000' size=4>$status</font>
                                                              </td>";
                                                        echo "</tr>";


                                                    }

                                                    ?>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Nomor Nota Dinas Konfirmasi Ke P2
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['ndkonfirmasino']; ?> /<?php echo $data['ndkonfirmasidate']; ?> 
                                                            </td>

                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Pejabat
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksindkonfirmasi=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?> 
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Jawaban Konfirmasi</td>
                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Nomor Nota Dinas P2 
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['jawabanp2']; ?> /<?php echo $data['jawabanp2date']; ?> 
                                                            </td>

                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Ket
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $datastatuskonf['Catatan_manual_p2']; ?> 
                                                            </td>

                                                        </tr>




                                                    </table>
                                                </td>
                                                <td width="50%" class="isiform">
                                                    <table  >
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Dokumen Pembatalan</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                              Persetujuan Pembatalan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php echo $data['SetujuBatalNo']; ?> / <?php echo $data['SetujuBatalDate']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr >
                                                            <td class="isitabelnew">
                                                              Pejabat
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksisetujubatal=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo($seksi['plh']) ;echo $seksi['nm_seksi'] ;} ?> 
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-decoration: none;color: #273372; font-weight: bolder;font-family: verdana;">Dokumen Pengeluaran</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Dokumen Pemberitahuan
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                                <?php if($data['DokumenCode']=='1') echo "SPPB"; elseif($data['DokumenCode']=='2') echo "BC1.2";elseif($data['DokumenCode']=='3') echo "BC23"; elseif($data['DokumenCode']=='5') echo "BC20";elseif($data['DokumenCode']=='11') echo "ND Kasi Manifest";elseif($data['DokumenCode']=='12') echo "PIB";elseif($data['DokumenCode']=='13') echo "PIBK";elseif($data['DokumenCode']=='27') echo "Persetujuan Reekspor";elseif($data['DokumenCode']=='28') echo "Returnable Package";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['DokumenNo']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                             Tanggal
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['DokumenDate']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Dokumen Pengeluaran
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php if($data['Dokumen2Code']=='1') echo "SPPB"; elseif($data['Dokumen2Code']=='2') echo "BC1.2";elseif($data['Dokumen2Code']=='3') echo "BC23"; elseif($data['Dokumen2Code']=='5') echo "BC20";elseif($data['Dokumen2Code']=='11') echo "ND Kasi Manifest";elseif($data['Dokumen2Code']=='12') echo "PIB";elseif($data['Dokumen2Code']=='13') echo "PIBK";elseif($data['Dokumen2Code']=='27') echo "Persetujuan Reekspor";elseif($data['Dokumen2Code']=='28') echo "Returnable Package";?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                               Nomor
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['Dokumen2No']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                             Tanggal
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php echo $data['Dokumen2Date']; ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew">
                                                             Status Akhir
                                                            </td>
                                                            <td class="isitabelnew">:</td>
                                                            <td >
                                                               <?php if($data['Dokumen2No']=='') {echo "<a>BCF 1.5</a>";} else{echo "<a><font color=red >Selesai</font></a>";} ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                          <?php 
                                                             $sqltutuppem = "SELECT * from tutuppos_bcf15 WHERE  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                                                             $querytutuppem = mysql_query($sqltutuppem);
                                                             $datatutuppem= mysql_fetch_array($querytutuppem);

                                                             ?>
                                                         <td colspan="3"><font color="#359CBA"><strong><?php echo $datatutuppem['keterangan_penutupan']; ?> / <?php echo $datatutuppem['tgltutup']; ?></strong> </font> </td>
                                                     </tr>


                                                    </table>

                                                </td>
                                            </tr>
                                             <?php 
                                                $sqlbtl = "SELECT * from bcf15_batalbcf WHERE  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                                                $querybtl = mysql_query($sqlbtl);
                                                $cekbtl=mysql_num_rows($querybtl);
                                                $databtl= mysql_fetch_array($querybtl);
                                                if($cekbtl>0){  
                                            ?>
                                            
                                            <tr valign="top"> 
                                                            
                                                <td >
                                                    <table width="100%" class="isiform">
                                                        <tr>
                                                            <td class="isitabelnew" width="200">Mengetahui Hanggar TPP</td>
                                                            <td class="isitabelnew">:</td>
                                                            <td ><?php echo $databtl['validasihanggar'];  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew" width="200">Tanggal</td>
                                                            <td class="isitabelnew">:</td>
                                                            <td ><?php echo $databtl['validasihanggardate'];  ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="isitabelnew" width="200">Gate</td>
                                                            <td class="isitabelnew">:</td>
                                                            <td ><?php echo $databtl['validasigate'];  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="isitabelnew" width="200">Tanggal</td>
                                                            <td class="isitabelnew">:</td>
                                                            <td ><?php echo $databtl['validasigatedate'];  ?></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </td>
                                                
                                                <td >
                                                    
                                                        <table class="data">
                                                                <tr>
                                                                    <td  class="judultabel">No Container</td>
                                                                    <td  class="judultabel">Size</td>
                                                                    <td  class="judultabel">Keluar</td>
                                                                    <td  class="judultabel">Gate</td>
                                                                </tr>
                                                                <?php
                                                             $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                                             while($bcfcont = mysql_fetch_array($rowset)){
                                                             ?>


                                                                
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
                                                                <td class="isitabel" width="10"><?php echo $bcfcont['tgl_keluar'];?></td>
                                                                <td class="isitabel" width="10"><?php echo $bcfcont['nm_petugas_keluar'];?></td>
                                                                <?php };?>

                                                                </tr>
                                                            </table>
                                                        
                                                    
                                                </td>
                                            </tr>
                                            
                                            <?php };?>
                                    </table>

                                </div>
                                 <div id="tabs-5">
                                     <?php 
                                         $sqlcat = "SELECT idbcf15,catatan_kaki.iduser,catatan_kaki,tgl_input,nm_lengkap
                                                    FROM catatan_kaki,user WHERE catatan_kaki.iduser=user.iduser and  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                                         $querycat = mysql_query($sqlcat);
                                         $cekcat=mysql_numrows($querycat);
                                        if($cekcat>0) {
                                         ?>
                                     <table >
                                         
                                            
                                            <?php
                                            
                                            while($bcf15cat = mysql_fetch_array($querycat)){


                                            ?>
                                            <tr>

                                                
                                                
                                                
                                                <td class="isitable">
                                                    <span>
                                                            <font color="#dfe0e7" size="5">
                                                            <?php echo $bcf15cat['nm_lengkap'];?> 
                                                            <?php echo $bcf15cat['tgl_input'] ;?>
                                                            </font>
                                                    </span><br/>
                                                    <span>
                                                    <font color="#000" size="5">
                                                    <?php echo $bcf15cat['catatan_kaki'] ;?>
                                                    </font>
                                                    </span>
                                                </td>

                                            </tr>
                                            <?php };
                                            ?>
                                        </table>
                                     <?php }
                                     else {
                                         echo "<h1>Tidak ada atensi atau catatan khusus dari petugas</h1>";
                                     }?>
                                 </div>
                            <div id="tabs-6">
                                <table>
                                  <tr>
                                        <td class="isitabelnew">
                                              Status Akhir
                                        </td>
                                        <td class="isitabelnew">:</td>
                                        <td >
                                           <?php if($data[idstatusakhir]=='')
                                               {
                                               if($data['Dokumen2No']=='') 
                                                   {echo "<a>BCF 1.5</a>";} 
                                               else{echo "<a><font color=red >Selesai(Tutup Pos BCF 1.5)</font></a>";}
                                               
                                               }
                                               else {
                                                   echo $datastatus['statusakhirname'];
                                               }
                                               
                                               ?><br/>
                                          
                                        </td>
                                        
                                 </tr>  
                                 <tr>
                                      <?php 
                                         $sqltutup = "SELECT * from tutuppos_bcf15 WHERE  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                                         $querytutup = mysql_query($sqltutup);
                                         $datatutup= mysql_fetch_array($querytutup);
                                         
                                         ?>
                                     <td><?php echo $datatutup['keterangan_penutupan']; ?> / <?php echo $datatutup['tgltutup']; ?>  </td>
                                 </tr>
                                </table>
                            </div>
                                
                            </div>
                            
                            
                           
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>
