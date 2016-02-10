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
                    <table width="100%"><tr><td class="judultabel1">Daftar Pembukaan POS BC 1.1 (APP CEISA) (Nota Dinas Belum Dibatalkan BCF 1.5nya)</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=bukaposbc11"; ?> >
                    <table border="0">
                        <tr>
                            <td colspan="3"><a href="?hal=mohonbatal">Cari BCF 1.5</a> | <a href="?hal=mohonbatalcont">Cari Container</a> | <a href="?hal=bukaposbc11">Buka Pos BC 1.1 Ceisa (Terbuka)</a> | <a href="?hal=bukaposbc11all">Buka Pos BC 1.1 All</a></td>
                        </tr>
                        <tr>
                            <td height="20"></td>
                        </tr>
                             
                          
                        <tr><td colspan="2">Pilih Kriteria Pencarian BCF 1.5</td></tr>
                        <tr>
                            <td>
                                <table BORDER="0" width="100%">
                                    <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                  
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
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
                                     <td><input type="checkbox" name="Consignee" value="1"  <?php  if($_POST['Consignee'] == 1){echo 'checked="checked"';}?>>Consignee </td>
                                     <td><input type="text"  class="required" name="consignee" value="<?php echo $_POST['consignee']?>">  </td>
                                     
                                     <td><input type="checkbox" name="Notify" value="1"  <?php  if($_POST['Notify'] == 1){echo 'checked="checked"';}?>>Notify </td>
                                     <td><input type="text"  class="required" name="notify" value="<?php echo $_POST['notify']?>">  </td>
                                     </tr>
                             
                                </table>
                            </td>
                        </tr>
                         <tr><td colspan="2">Pilih Kriteria Pencetakan Data</td></tr>
                        <tr>
                            <td>
                                <table BORDER="0" width="100%">
                                    <tr>
                                     <td><input type="checkbox" name="Tglbukaposbc11ceisa" value="1"  <?php  if($_POST['Tglbukaposbc11ceisa'] == 1){echo 'checked="checked"';}?>>Tanggal ND Buka POS BC 11</td>
                                     <td><input size="10" id="tanggal" type="text"  class="required" name="tglbukaposbc11ceisa_1" value="<?php echo $_POST['tglbukaposbc11ceisa_1']?>"></td>
                                  
                                     <td>s.d. </td>
                                     <td><input size="10" id="tanggal1" type="text" class="required" name="tglbukaposbc11ceisa_2" value="<?php echo $_POST['tglbukaposbc11ceisa_2']?>"></td>
                                    </tr>
                                    
                             
                                </table>
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
                                        if (isset($_POST['Tglbukaposbc11ceisa']))
                                        {
                                           $tglbukaposbc11ceisa_1 = $_POST['tglbukaposbc11ceisa_1'];
                                           $tglbukaposbc11ceisa_2 = $_POST['tglbukaposbc11ceisa_2'];
                                          
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tglbukaposbc11ceisa between '$tglbukaposbc11ceisa_1' and '$tglbukaposbc11ceisa_2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND (tglbukaposbc11ceisa between '$tglbukaposbc11ceisa_1' and '$tglbukaposbc11ceisa_2')";
                                           }
                                        }
                                        
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=bukaposbc11";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and bukaposbc11ceisa='1' and setujubatal='2' and ".$bagianWhere."   order by nobukaposbc11ceisa desc ";
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
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari!</font></strong>";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT * FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and  recordstatus='2' and bukaposbc11ceisa='1' and setujubatal='2' and ".$bagianWhere."  order by nobukaposbc11ceisa desc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=bukaposbc11";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode  and bcf15.idtpp=tpp.idtpp and recordstatus='2' and bukaposbc11ceisa='1' and setujubatal='2' order by nobukaposbc11ceisa desc ";
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
                    $sqltampil = "SELECT * FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode  and bcf15.idtpp=tpp.idtpp and recordstatus='2' and bukaposbc11ceisa='1' and setujubatal='2' order by nobukaposbc11ceisa desc  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
        <br/>
                                    <form name="form1" method="get" action="report/daftarbukaposbc11.php">
                                        
                                        <input  name="in_tglbukaposbc11ceisa_1"  class="required" type="hidden" value="<?php echo $_POST['tglbukaposbc11ceisa_1']; ?>" />
                                        <input  name="in_tglbukaposbc11ceisa_2"  class="required" type="hidden" value="<?php echo $_POST['tglbukaposbc11ceisa_2']; ?>" />
                                        
                                        
                                        <input type="submit" value="Cetak Daftar Buka POS BC 1.1" name="search"/>
                                    </form>
                
                    <table class="data" width="100%">
                        <tr>
                            <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel" colspan="2">ND Kasi Penimbunan</th>
                            <th class="judultabel" colspan="2">ND Kasi Adm. Manifest</th>
                            <th class="judultabel" rowspan="2">TPS</th>
                            <th class="judultabel" rowspan="2">TPP</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            <th class="judultabel" colspan="3">Dok Pengeluaran</th>
                            <th class="judultabel" rowspan="2">Lama Timbun di TPP</th>
                            <th class="judultabel" rowspan="2">Lama Proses Transfer PIB</th>
                            <th class="judultabel" rowspan="2">Ket</th>
                            <th class="judultabel" rowspan="2">Action</th>
                        </tr>
                            <tr>
                             
                            
                            <th class="judultabel" >Nomor</th>
                            <th class="judultabel" >Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Dokumen</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            
                           
                            
                           
                            
                            </tr>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        $now=date('Y-m-d');
                        $tglbcf=$data['bcf15tgl'];
                        $tglbamasuk=$data['bamasukdate'];
                        
                        $tglbukaposbc11ceisa=$data['tglbukaposbc11ceisa'];
                        if($data['Dokumen2Code']=='1'){$Dokumen2Code='SPPB';} elseif($data['Dokumen2Code']=='9'){$Dokumen2Code='BA MUSNAH';}elseif($data['Dokumen2Code']=='11'){$Dokumen2Code='ND Manifest';} elseif($data['Dokumen2Code']=='27'){$Dokumen2Code='Persetujuan Reekspor';}
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
                    <td class="isitabel"><?php echo $data['bcf15no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['nobukaposbc11ceisa']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['tglbukaposbc11ceisa']); ?></td>
                    <td class="isitabel"><?php echo $data['jawaban_bukaposbc11no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['jawaban_bukaposbc11tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['idtps']; ?></td>
                    <td class="isitabel"><?php echo $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    <td class="isitabel"><?php echo $Dokumen2Code; ?> </td>
                    <td class="isitabel"><?php echo $data['Dokumen2No']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['Dokumen2Date']); ?></td>
                                  
                    
                    <td class="isitabel" align="center"><?php if ($data['bamasukno']=='') {echo "Tidak Masuk TPP";} else { echo  "$selisihtpp Hari" ;} ?></td>
                    <td class="isitabel" align="center"><?php echo  "$selisihceisa Hari"  ?></td>
                    <td align="center" class="isitabel"> <?php if ($data['NoKepStatus_Akhr']=='') {echo "";}   else {echo 'Cek BMN atau Belum?'; } ?>
                    </td>
                    <td align="center" class="isitabel"> <?php if ($data['SuratBatalNo']=='') {echo "<a href='?hal=inputmohonbatal&id=$data[idbcf15]' target='_self'><img src=\"images/new/update.png\" ></img></a> ";}   else {echo "<a href='?hal=editmohonbatal&id=$data[idbcf15]' target='_self'><img src=\"images/new/update.png\" ></img></a>"; } ?>
                    </td>
                    
                   
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