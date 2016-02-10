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
    <title>SITAMPAN-Permohonan Batal BCF 1.5</title>
    <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
   <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
    </head>
    <body>
        
       
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                    ob_start();
                     session_start();
                     include 'lib/function.php';


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    
                    ?>
                    <table width="100%"><tr><td class="judultabel1">Cetak Buku Agenda Pembatalan</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=cetak_buku_batal"; ?> >
                    <table border="0">
                        
                                                 
                        <tr><td colspan="2">Filter Data</td></tr>
                        <tr>
                            <td>
                                <table BORDER="0" width="100%">
                                    
                                    <tr>
                                     <td ><input type="checkbox" name="SetujuBatalDate" value="1"  <?php  if($_POST['SetujuBatalDate'] == 1){echo 'checked="checked"';}?>>Tgl Agenda</td>
                                     <td colspan="2"><input size="20" type="text"  class="required" name="SetujuBatalDate1" id="tanggal" value="<?php echo $_POST['SetujuBatalDate1']?>"> sd <input size="20" type="text"  class="required" name="SetujuBatalDate2" id="tanggal1" value="<?php echo $_POST['SetujuBatalDate2']?>"></td>
                                   </tr>
                                   <tr>
                                     <td ><input type="checkbox" name="Rpp" value="1"  <?php  if($_POST['Rpp'] == 1){echo 'checked="checked"';}?>>Jumlah Record Yang Akan ditampilkan</td>
                                     <td colspan="2"><input size="5" type="text"  class="required" name="rpp" id="tanggal" value="<?php echo $_POST['rpp']?>"> </td>
                                  
                                     
                                    </tr>
                                   
                                   
                                    
                             
                                </table>
                            </td>
                        </tr>
                        
                         <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Tampilkan" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
               
                    <?php
                    
                    if (($mode=='cari')) {
                        
                        
                                        if (isset($_POST['SetujuBatalDate']))
                                        {
                                           $SetujuBatalDate1 = $_POST['SetujuBatalDate1'];
                                           $SetujuBatalDate2 = $_POST['SetujuBatalDate2'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "SetujuBatalDate between '$SetujuBatalDate1' and '$SetujuBatalDate2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND SetujuBatalDate between '$SetujuBatalDate1' and '$SetujuBatalDate2'";
                                           }
                                        }
                                        
                                        
                                        
                        $rpptotal=$_POST['rpp'];
                        $rpp = $rpptotal; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=cetak_buku_batal";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15,seksi  where bcf15.idseksisetujubatal=seksi.idseksi and  recordstatus='2' and setujubatal='1' and (kdseksi='tpp3' or kdseksi='tpp2')  and ".$bagianWhere." order by setujubatalno asc   ";
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
                     
                        //jika data tidak ditemukan
                        if($count==0){
                                echo "<strong>masukan jumlah record yang mau ditampilkan</strong>";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT * FROM bcf15,seksi  where bcf15.idseksisetujubatal=seksi.idseksi and  recordstatus='2' and setujubatal='1' and (kdseksi='tpp3' or kdseksi='tpp2')  and ".$bagianWhere." order by setujubatalno asc    LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    
                    ?>
         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
        <br/>
                                    <form name="form1" method="get" action="report/export/lap_excel_loket_cet_buku_agenda.php">
                                        
                                        <input  name="in_tglawal" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['SetujuBatalDate1']; ?>" />
                                        <input  name="in_tglakhir" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['SetujuBatalDate2']; ?>" />
                                        
                                        <input type="submit" value="Download To Excel" name="search"/>
                                    </form>
        
                
                    <table class="data" width="100%">
                        <tr>
                            <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">No Agenda</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            
                            <th class="judultabel" rowspan="2">Consignee</th>
                            <th class="judultabel" colspan="3">Dok Pengeluaran</th>
                            
                        </tr>
                            <tr>
                            <th class="judultabel" >Nomor</th>
                            <th class="judultabel" >Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Dokumen</th>
                            
                            </tr>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        $now=date('Y-m-d');
                        $tglbcf=$data['bcf15tgl'];
                        $tglbamasuk=$data['bamasukdate'];
                        
                        $tglbukaposbc11ceisa=$data['tglbukaposbc11ceisa'];
                        if($data['Dokumen2Code']=='1'){$Dokumen2Code='SPPB';} elseif($data['Dokumen2Code']==''){$Dokumen2Code='';} elseif($data['Dokumen2Code']=='0'){$Dokumen2Code='';} elseif($data['Dokumen2Code']=='9'){$Dokumen2Code='BA MUSNAH';}elseif($data['Dokumen2Code']=='11'){$Dokumen2Code='ND Manifest';} elseif($data['Dokumen2Code']=='27'){$Dokumen2Code='Persetujuan Reekspor';}
                        $querytempo ="select datediff('$now','$tglbcf') as selisih,datediff('$now','$tglbamasuk') as selisihtpp ";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
                        $querytrx ="select datediff('$now','$tglbcf') as selisih,datediff('$now','$tglbukaposbc11ceisa') as selisihceisa ";
                        $hasiltrx=mysql_query($querytrx);
                        $datatrx=mysql_fetch_array($hasiltrx);
                        //wakttempou setelah penarikan
                        
                        
                        $selisihtpp=$datatempo['selisihtpp'];
                        $selisihceisa=$datatrx['selisihceisa'];

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
                    <td class="isitabel"><?php echo $data['SetujuBatalNo']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['SetujuBatalDate']); ?></td>
                    <td class="isitabel"><?php echo $data['bcf15no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    <td class="isitabel"><?php echo $Dokumen2Code; ?> </td>
                    <td class="isitabel"><?php echo $data['Dokumen2No']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['Dokumen2Date']); ?></td>
                   </tr>
                    

                    <?php
                    };
                    ?>
                    </table><br/><br />
                    
                    
                   
          
        </body>
        </html>
        <?php
};
?>