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
    <!--       jquery anytimes -->
        
<!--        <link rel="stylesheet" type="text/css" href="themes/main.css" />-->
        
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl_surat_bukapos1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl_surat_bukapos2").datepicker({
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
                     session_start();
                     ob_start();


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa"; ?> >
                    <table class="isitabel"> 
                         
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                       
                        <tr bgcolor="#8ea2e1">
                            <td colspan="2" ><a href="?hal=pagemanifest&pilih=daf_bukaposbc11ceisa">Input Buka Pos</a> | <a href="?hal=pagemanifest&pilih=query_bukaposbc11ceisa">Monitoring Buka Pos</a> | <a href=?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa>Download To Excel</a> | <a href="?hal=pagemanifest&pilih=grafik_bukapos">Grafik Pengajuan Pos BC 1.1</a> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                         <tr>
                            <td colspan="2"><font size="5" color="#4a6c41">Download To Ecxel Daftar Buka POS BC 1.1</font></td>
                        </tr>
                          <tr><td colspan="2"><b>Pilih Kriteria Download Data <font color="red" size="5">(Maintenance)</font></b></td></tr>
                          <tr >
                              <td >
                                  <table  bgcolor="#7393fc" class="isitabel">
                                       
                                         <tr>
                                         <td><input type="checkbox" name="Tgl_surat_bukapos" value="1"  <?php  if($_POST['Tgl_surat_bukapos'] == 1){echo 'checked="checked"';}?>>Tgl Surat Permohonan Buka Pos</td>
                                         <td><input type="text" id="tgl_surat_bukapos1" size="10" class="required" name="tgl_surat_bukapos1" value="<?php echo $_POST['tgl_surat_bukapos1']?>"> sd <input type="text"  size="10" id="tgl_surat_bukapos2" class="required" name="tgl_surat_bukapos2" value="<?php echo $_POST['tgl_surat_bukapos2']?>"></td>
                                          
                                         </tr>
                                         <tr>
                                         <td><input type="checkbox" name="Batalaju" value="1"  <?php  if($_POST['Batalaju'] == 1){echo 'checked="checked"';}?>>Aju Permohonan Pembatalan 1.5</td>
                                         
                                          
                                         </tr>
                                         <tr>
                                         <td><input type="checkbox" name="Batalbelum" value="1"  <?php  if($_POST['Batalbelum'] == 1){echo 'checked="checked"';}?>>Belum Aju Permohonan Pembatalan BCF 1.5</td>
                                          
                                         </tr>

                                         
                                  </table>
                              </td>
                          </tr>
                             
                             
                             
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
                   
                    <?php
                   
                    if (($mode=='cari')) {
                                    if (isset($_POST['Tgl_surat_bukapos']))
                                        {
                                           $tgl_surat_bukapos1 = $_POST['tgl_surat_bukapos1'];
                                           $tgl_surat_bukapos2 = $_POST['tgl_surat_bukapos2'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "tgl_surat_bukapos between '$tgl_surat_bukapos1' and '$tgl_surat_bukapos2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND (tgl_surat_bukapos between '$tgl_surat_bukapos1' and '$tgl_surat_bukapos2')";
                                           }
                                        }
                                        if (isset($_POST['Batalaju']))//jika telah diajukan permohonan pembatalan BCF 1.5
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Batal= '1'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Batal= '1'";
                                           }
                                        }
                                        if (isset($_POST['Batalbelum']))//jika belum diajukan permohonan pembatalan BCF 1.5
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Batal= '2'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Batal= '2'";
                                           }
                                        }
                   if($_POST['Tgl_surat_bukapos']=='1'){
                      $rpp=100000; 
                   }
                   elseif($_POST['Batalaju']=='1'){
                      $rpp=100000; 
                   }
                   elseif($_POST['Batalbelum']=='1'){
                      $rpp=100000; 
                   }
                   else{
                       $rpp = 20; // Jumlah data per halaman 
                   }                
                       

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa";

                    // data mentah 
                    $sql = "select bcf15.idbcf15,bcf15.bcf15no,bcf15.bcf15tgl,bcf15.tahun,blno,consignee,notify,bc11no,bc11tgl,bc11pos,bc11subpos,idtps,bcf15.idtpp,Dokumen2Code,Dokumen2No,Dokumen2Date,jawaban_bukaposbc11,jawaban_bukaposbc11no,jawaban_bukaposbc11tgl,jawaban_bukaposbc11seksi,jawaban_bukaposbc11ket,bukaposbc11ceisa,nobukaposbc11ceisa,tglbukaposbc11ceisa,bamasukno,bamasukdate,NoKepStatus_Akhr,no_surat_bukapos,tgl_surat_bukapos,tgl_input,nm_petugas_rekam,nip_petugas_rekam,ip_petugas_rekam,nm_pemohon,bukaposbc11.idbcf15,nosuratpermohonanbatalbcf15,tglsuratpermohonanbatalbcf15,nm_pemohon_batal,tgl_input_permohonan,bukaposbc11.status,tgl_surat_bukapos
                    FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and  setujubatal='2' and recordstatus='2' and bukaposbc11ceisa='1' and  ".$bagianWhere."   order by tahun, bcf15no asc ";
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
                    $sqltampil = "select bcf15.idbcf15,bcf15.bcf15no,bcf15.bcf15tgl,bcf15.tahun,blno,consignee,notify,bc11no,bc11tgl,bc11pos,bc11subpos,idtps,bcf15.idtpp,Dokumen2Code,Dokumen2No,Dokumen2Date,jawaban_bukaposbc11,jawaban_bukaposbc11no,jawaban_bukaposbc11tgl,jawaban_bukaposbc11seksi,jawaban_bukaposbc11ket,bukaposbc11ceisa,nobukaposbc11ceisa,tglbukaposbc11ceisa,bamasukno,bamasukdate,NoKepStatus_Akhr,no_surat_bukapos,tgl_surat_bukapos,tgl_input,nm_petugas_rekam,nip_petugas_rekam,ip_petugas_rekam,nm_pemohon,bukaposbc11.idbcf15,nosuratpermohonanbatalbcf15,tglsuratpermohonanbatalbcf15,nm_pemohon_batal,tgl_input_permohonan,bukaposbc11.status,tgl_surat_bukapos
                    FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and  setujubatal='2' and recordstatus='2' and bukaposbc11ceisa='1' and  ".$bagianWhere."   order by tahun, bcf15no asc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    $max	 = ceil($count/$rpp);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa";
                    $tahunnow=date('Y');
                    // data mentah 
                    $sql = "select bcf15.idbcf15,bcf15.bcf15no,bcf15.bcf15tgl,bcf15.tahun,blno,consignee,notify,bc11no,bc11tgl,bc11pos,bc11subpos,idtps,bcf15.idtpp,Dokumen2Code,Dokumen2No,Dokumen2Date,jawaban_bukaposbc11,jawaban_bukaposbc11no,jawaban_bukaposbc11tgl,jawaban_bukaposbc11seksi,jawaban_bukaposbc11ket,bukaposbc11ceisa,nobukaposbc11ceisa,tglbukaposbc11ceisa,bamasukno,bamasukdate,NoKepStatus_Akhr,no_surat_bukapos,tgl_surat_bukapos,tgl_input,nm_petugas_rekam,nip_petugas_rekam,ip_petugas_rekam,nm_pemohon,bukaposbc11.idbcf15,nosuratpermohonanbatalbcf15,tglsuratpermohonanbatalbcf15,nm_pemohon_batal,tgl_input_permohonan,bukaposbc11.status,tgl_surat_bukapos
                    FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and bcf15.tahun='$tahunnow' and recordstatus='2' and setujubatal='2' and bukaposbc11ceisa='1' order by bcf15no desc ";
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
                    $sqltampil = "select bcf15.idbcf15,bcf15.bcf15no,bcf15.bcf15tgl,bcf15.tahun,blno,consignee,notify,bc11no,bc11tgl,bc11pos,bc11subpos,idtps,bcf15.idtpp,Dokumen2Code,Dokumen2No,Dokumen2Date,jawaban_bukaposbc11,jawaban_bukaposbc11no,jawaban_bukaposbc11tgl,jawaban_bukaposbc11seksi,jawaban_bukaposbc11ket,bukaposbc11ceisa,nobukaposbc11ceisa,tglbukaposbc11ceisa,bamasukno,bamasukdate,NoKepStatus_Akhr,no_surat_bukapos,tgl_surat_bukapos,tgl_input,nm_petugas_rekam,nip_petugas_rekam,ip_petugas_rekam,nm_pemohon,bukaposbc11.idbcf15,nosuratpermohonanbatalbcf15,tglsuratpermohonanbatalbcf15,nm_pemohon_batal,tgl_input_permohonan,bukaposbc11.status
                    FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and bcf15.tahun='$tahunnow' and recordstatus='2' and setujubatal='2' and bukaposbc11ceisa='1' order by bcf15no desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    $max	 = ceil($count/$rpp);
                    
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />
                        <form method="get" action="report/export/tutup_pos_bc11.php" >

                            <input type="hidden" name="bagianWhere" id="bagianWhere" value="<?php echo $bagianWhere; ?>" />
                            <input  type="submit" name="search1" value="Download Ke Excell"  />

                         </form>
                    
                    <table class="isitabel">
                        <tr>
                        <td colspan="3"><b>Jumlah Data :</b> <?php echo $count; ?> </td>
                        <td colspan="5" align="right"><b>Halaman ke :</b>
                            <?php
                            //memapilkan previous
                            
                            if ($nohal > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa&page=".($nohal-1)."'>&lt;&lt; Prev</a>";
                            // memunculkan nomor halaman dan linknya
                            //$page=$h $jumpage=$max
                            for($h = 1; $h <= $max; $h++)
                            {
                            if ((($h >= $nohal - 3) && ($h <= $nohal + 3)) || ($h == 1) || ($h == $max))
                            {
                            if (($showPage == 1) && ($h != 2))  echo "...";
                            if (($showPage != ($max - 1)) && ($h == $max))  echo "...";
                            if ($h == $nohal) echo " <b>".$h."</b> ";
                            else echo " <a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa&page=".$h."'>".$h."</a> ";
                            $showPage = $h;
                            }
                            }
                            
                            // menampilkan link next

                            if ($nohal < $max) echo "<a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa&page=".($nohal+1)."'>Next &gt;&gt;</a>";
                            ?></td>
                      </tr>
                      <tr>
                          <td>
                              Periode Tahun : <?php if (($mode=='cari')) { echo $tahun;} else {echo "<font color=red>$tahunnow</font>";}?>
                          </td>
                      </tr>
                    </table><br/>

                    <table class="data" width="100%">
                        <tr>
                            <th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel" colspan="3">BC1.1</th>
                            <th class="judultabel" colspan="3">Permohonan Pembukaan Pos BC 1.1</th>
                            <th class="judultabel" colspan="3">Permohonan Pembatalan</th>
                                                       
                            <th class="judultabel" rowspan="2">Status</th>
                            <th class="judultabel" rowspan="2">Action</th>
                        </tr>
                            <tr>
                             
                            
                            <th class="judultabel" >Nomor</th>
                            <th class="judultabel" >Tanggal</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Pos</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Pemohon</th>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Pemohon</th>
                            
                           
                            
                           
                            
                            </tr>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        $now=date('Y-m-d');
                        $tglbcf=$data['bcf15tgl'];
                        $tglbamasuk=$data['bamasukdate'];
                        
                        $tglbukaposbc11ceisa=$data['tglbukaposbc11ceisa'];
                        if($data['Dokumen2Code']=='1'){$Dokumen2Code='SPPB';} elseif($data['Dokumen2Code']=='0'){$Dokumen2Code='';} elseif($data['Dokumen2Code']=='9'){$Dokumen2Code='BA MUSNAH';}elseif($data['Dokumen2Code']=='11'){$Dokumen2Code='ND Manifest';} elseif($data['Dokumen2Code']=='27'){$Dokumen2Code='Persetujuan Reekspor';}
                        
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
                    <td class="isitabel"><?php echo $data['bc11no']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['bc11tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['bc11pos']; ?> </td>
                    
                    <td class="isitabel"><?php echo $data['no_surat_bukapos']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['tgl_surat_bukapos']); ?></td>
                    <td class="isitabel"><?php echo $data['nm_pemohon']; ?> </td>
                    
                    <td class="isitabel"><?php echo $data['SuratBatalNo']; ?> </td>
                    <td class="isitabel"><?php echo  tglindo($data['SuratBatalDate']); ?></td>
                    <td class="isitabel"><?php echo $data['Pemohon']; ?> </td>
                      
                    <td align="center" class="isitabel"> <?php if ($data['NoKepStatus_Akhr']=='') {echo "";}   else {echo 'Cek BMN atau Belum?'; }
                    if($data[idstatusakhir]=='2') {$statusakhirname='BCF15';} 
                            elseif($data[idstatusakhir]=='4') {echo $statusakhirname="Sudah Dicacah dengan no NHP $data[NHPLelangNo] tanggal $data[NHPLelangDate] oleh nm_pemeriksa";} 
                            elseif($data[idstatusakhir]=='5') {echo $statusakhirname='BTD SIAP LELANG';} 
                            elseif($data[idstatusakhir]=='6') {echo $statusakhirname='BTD TIDAK LAKU L1';} 
                            elseif($data[idstatusakhir]=='7') {echo $statusakhirname='BTD TIDAK LAKU L2';} 
                            elseif($data[idstatusakhir]=='8') {echo $statusakhirname='BTD MUSNAH';} 
                            elseif($data[idstatusakhir]=='9') {echo $statusakhirname='BMN';} 
                            elseif($data[idstatusakhir]=='11') {echo $statusakhirname='PERMOHONAN TUNDA LELANG';} 
                            elseif($data[idstatusakhir]=='13') {echo $statusakhirname='TIDAK LAKU LELANG';} 
                            elseif($data[idstatusakhir]=='14') {echo $statusakhirname='TUTUP POS BY SISTEM (Hub Staf Penarikan)';} 
                            elseif($data[idstatusakhir]=='0') {echo $statusakhirname='BCF15';} 
                            elseif($data[idstatusakhir]=='') {echo $statusakhirname='BCF15';}
                            echo "(";
                            echo $data['status'];
                             echo ")";
                            ?>
                    </td>
                    <td align="center" class="isitabel"> <a href="?hal=pagemanifest&pilih=input_bukaposbc11ceisa&id=<?php  echo $data[idbcf15]?>">Lihat</a>
                    </td>
                    
                   
                    </tr>
                    
                    <?php
                    };
                    ?>
                    </table>
                    <br/><br />
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
                    
            
        </body>
        </html>
        <?php

        ob_end_flush();
};
?>