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
               $("#tanggal4").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal5").datepicker({
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
                    <table width="100%"><tr><td class="judultabel1">DAFTAR BCF 1.5 YANG SIAP DIPINDAHKAN KE TPP</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=down_bcftrbt"; ?> >
                    <table border="0">
                        
                        <tr>
                            <td height="20"></td>
                        </tr>
                             
                          
                        <tr><td colspan="2">Pilih Kriteria Download Data</td></tr>
                        <tr>
                            <td>
                                <table BORDER="0" width="100%">
                                    
                                    <tr>
                                     <td ><input type="checkbox" name="Bcf15tgl" value="1"  <?php  if($_POST['Bcf15tgl'] == 1){echo 'checked="checked"';}?>>Tgl BCF 1.5</td>
                                     <td colspan="2"><input size="20" type="text"  class="required" name="bcf15tgl1" id="tanggal" value="<?php echo $_POST['bcf15tgl1']?>"> sd <input size="20" type="text"  class="required" name="bcf15tgl2" id="tanggal1" value="<?php echo $_POST['bcf15tgl2']?>"></td>
                                  
                                     
                                    </tr>
                                    <tr>
                                     <td ><input type="checkbox" name="setujuBatalDate" value="1"  <?php  if($_POST['setujuBatalDate'] == 1){echo 'checked="checked"';}?>>Tgl Agenda Pembatalan BCF 1.5</td>
                                     <td colspan="2"><input size="20" type="text"  class="required" name="SetujuBatalDate" id="tanggal2" value="<?php echo $_POST['SetujuBatalDate']?>"> sd <input size="20" type="text"  class="required" name="SetujuBatalDate2" id="tanggal3" value="<?php echo $_POST['SetujuBatalDate2']?>"></td>
                                  
                                     
                                    </tr>
                                    <tr>
                                     <td ><input type="checkbox" name="Pecahpos" value="1"  <?php  if($_POST['Pecahpos'] == 1){echo 'checked="checked"';}?>>Pecah Pos</td>
                                     <td colspan="2"><input size="20" type="text"  class="required" name="PecahPosdate" id="tanggal4" value="<?php echo $_POST['PecahPosdate']?>"> sd <input size="20" type="text"  class="required" name="PecahPosdate2" id="tanggal5" value="<?php echo $_POST['PecahPosdate2']?>"></td>
                                  
                                     
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
                        
                        
                                        if (isset($_POST['Bcf15tgl']))
                                        {
                                           $bcf15tgl1 = $_POST['bcf15tgl1'];
                                           $bcf15tgl2 = $_POST['bcf15tgl2'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.bcf15tgl between '$bcf15tgl1' and '$bcf15tgl2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.bcf15tgl between '$bcf15tgl1' and '$bcf15tgl2'";
                                           }
                                        }
                                        if (isset($_POST['setujuBatalDate']))
                                        {
                                            $SetujuBatalDate = $_POST['SetujuBatalDate'];
                                           $SetujuBatalDate2 = $_POST['SetujuBatalDate2'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "SetujuBatalDate between '$SetujuBatalDate' and '$SetujuBatalDate2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND SetujuBatalDate between '$SetujuBatalDate' and '$SetujuBatalDate2'";
                                           }
                                        }
                                       if (isset($_POST['Pecahpos']))
                                        {
                                            $PecahPosdate = $_POST['PecahPosdate'];
                                           $PecahPosdate2 = $_POST['PecahPosdate2'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "PecahPosdate between '$PecahPosdate' and '$PecahPosdate2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND PecahPosdate between '$PecahPosdate' and '$PecahPosdate2'";
                                           }
                                        }
                                       
                                       
                                        
                        $rpptotal=$_POST['rpp'];
                        $rpp = $rpptotal; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=down_bcftrbt";

                    // data mentah 
                    $sql = "SELECT *
                        FROM bcf15  where   ".$bagianWhere."   order by idbcf15 desc ";
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
                                echo "<strong>Tak Ada Data</strong>";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT *
                        FROM bcf15  where   ".$bagianWhere."  order by idbcf15 desc  LIMIT $limit,$rpp";

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
        <table class="isitabel data">
            <tr>
                <td colspan="3" style="color:#1E205C;background-color: #fff;font-size: 20;font-style:normal;font-weight: bold;"><img src="images/new/download.jpg" /><span >Download Dan Email Data BCF 1.5</span></td>
            </tr>
            <tr>
                <td colspan="3" style="color:#1E205C;background-color: #1E205C;font-size: 20;font-style:normal;font-weight: bold;"></td>
            </tr>
            <?php
            if (isset($_POST['Bcf15tgl']))
                                        {
            ?>
            <tr align="center">
                
                <td class="isitabel" >
                    <form name="form1" method="get" action="report/export/lap_excel_hanggar_bcf15terbit.php">
                        <input  name="in_tglawalbcf15" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['bcf15tgl1']; ?>" />
                        <input  name="in_tglakhirbcf15" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['bcf15tgl2']; ?>" />
                         <img src="images/new/mtk.png" /><input class="button putih bigrounded " type="submit" value="BCF 1.5" name="search"/>
                    </form>
                </td>
                <td class="isitabel">
                    <form name="form1" method="get" action="report/export/lap_excel_hanggar_bcf15contterbit.php">
                        <input  name="in_tglawalcont" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['bcf15tgl1']; ?>" />
                        <input  name="in_tglakhircont" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['bcf15tgl2']; ?>" />
                        <img src="images/new/cont.png" width="50"/><input class="button putih bigrounded " type="submit" value="Container" name="search"/>
                    </form>
                </td>
                <?php 
                                        };
                    if (isset($_POST['setujuBatalDate']))
                                        {                    
                 ?>
                <td class="isitabel">
                    <form name="form1" method="get" action="report/export/lap_excel_hanggar_bcf15setujubatal.php">
                        <input  name="in_tglawalbtl" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['SetujuBatalDate']; ?>" />
                        <input  name="in_tglakhirbtl" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['SetujuBatalDate2']; ?>" />
                        <img src="images/new/bc.png" width="50"/><input class="button putih bigrounded " type="submit" value="Pembatalan" name="search"/>
                    </form>
                </td>
                <?php 
                                        };
                     if (isset($_POST['Pecahpos']))
                                        {                          
                ?>
                <td class="isitabel">
                    <form name="form1" method="get" action="report/export/lap_excel_hanggar_bcf15pecahpos.php">
                        <input  name="in_tglawalpp" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['PecahPosdate']; ?>" />
                        <input  name="in_tglakhirpp" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['PecahPosdate2']; ?>" />
                        <img src="images/new/add.png" width="50"/><input class="button putih bigrounded " type="submit" value="BCF 1.5 Pecah Pos" name="search"/>
                    </form>
                </td>
                <td class="isitabel">
                    <form name="form1" method="get" action="report/export/lap_excel_hanggar_bcf15pecahposcont.php">
                        <input  name="in_tglawalcont" id="in_tglawal" class="required" type="hidden" value="<?php echo $_POST['PecahPosdate']; ?>" />
                        <input  name="in_tglakhircont" id="in_tglakhir" class="required" type="hidden" value="<?php echo $_POST['PecahPosdate2']; ?>" />
                        <img src="images/new/cont.png" width="50"/><input class="button putih bigrounded " type="submit" value="Container Pecah Pos" name="search"/>
                    </form>
                </td>
                <?php };?>
            </tr>
        </table>    
                                
        
                            <ol style="background-color: #1E205C;color: #F3F3F3;font-size: 15;font-weight: bold;">Download dan kirim email ke Hanggar TPP
                                <li>Download Excel</li>
                                <li>Simpan dengan Format Excell 97/2003</li>
                                <li>Email Ke Hanggar TPP</li>
                                <li>Selesai</li>
                            </ol>
        <?php 
         if (isset($_POST['Bcf15tgl']))
                                        {
        ?>
                    <table class="data" width="100%">
                        <tr>
                            <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">Surat Perintah Pemindahan</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel" colspan="2">BC11</th>
                            <th class="judultabel" colspan="2">BL</th>
                            <th class="judultabel" rowspan="2">TPS</th>
                            
                            <th class="judultabel" rowspan="2">Consignee</th>
                            
                          
                        </tr>
                            <tr>
                             
                            
                            <th class="judultabel" >Nomor</th>
                            <th class="judultabel" >Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            
                           
                            
                           
                            
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
                    <td class="isitabel"><?php echo $data['suratperintahno']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['suratperintahdate']); ?></td>
                    <td class="isitabel"><?php echo $data['bcf15no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['bc11no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bc11tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['blno']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bltgl']); ?></td>
                    <td class="isitabel"><?php echo $data['idtps']; ?></td>
                    
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    
                    
                   
                    </tr>
                    

                    <?php
                    };
                    ?>
                    </table>
        <?php };
        if (isset($_POST['setujuBatalDate']))
                                        {
        ?>
        <table class="data" width="100%">
                        <tr>
                            <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">Agenda Batal</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel" colspan="2">BC11</th>
                            <th class="judultabel" colspan="2">BL</th>
                            <th class="judultabel" rowspan="2">TPS</th>
                            <th class="judultabel" rowspan="2">TPP</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            
                          
                        </tr>
                            <tr>
                             
                            
                            <th class="judultabel" >Nomor</th>
                            <th class="judultabel" >Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            
                           
                            
                           
                            
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
                    <td class="isitabel"><?php echo $data['bc11no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bc11tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['blno']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bltgl']); ?></td>
                    <td class="isitabel"><?php echo $data['idtps']; ?></td>
                    <td class="isitabel"><?php echo $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    
                    
                   
                    </tr>
                    

                    <?php
                    };
                    ?>
                    </table>
        <?php };
        if (isset($_POST['Pecahpos']))
                                        {
        ?>
        <table class="data" width="100%">
                        <tr>
                           <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">Agenda Batal</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel" colspan="2">BC11</th>
                            <th class="judultabel" colspan="2">BL</th>
                            <th class="judultabel" rowspan="2">TPS</th>
                            <th class="judultabel" rowspan="2">TPP</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            
                          
                        </tr>
                            <tr>
                             
                            
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            
                           
                            
                           
                            
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
                    <td class="isitabel"><?php echo $data['SetujuBatalNo']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['SetujuBatalDate']); ?></td>
                    <td class="isitabel"><?php echo $data['bcf15no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['bc11no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bc11tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['blno']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bltgl']); ?></td>
                    <td class="isitabel"><?php echo $data['idtps']; ?></td>
                    <td class="isitabel"><?php echo $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    
                    
                   
                    </tr>
                    

                    <?php
                    };
                    ?>
                    </table>
        <?php };?>
        <br/><br />
                    
                    
                   
          
        </body>
        </html>
        <?php
};
?>