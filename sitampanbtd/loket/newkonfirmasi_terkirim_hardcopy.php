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
    <title>SITAMPAN-Hardcopy Konfirmasi BCF 1.5</title>
   
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
                    <table width="100%"><tr><td class="judultabel1">Daftar Pengiriman Hardcopy Konfirmasi Ke P2</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=newkonfirmasi&pilihloket=new_hardcopy_terkirim"; ?> >
                    
                        <table border="0" >
                        
                        
                             
                        <tr>
                            <td><b>
                                <table class="data isitabel" bgcolor="#fafbea">
                                    <tr><td colspan="2"><b>Pilih Kriteria Pencarian BCF 1.5</b></td></tr>
                          
                                     <tr>
                                     <td><input type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                                     <td><input type="text" size="10" class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                                    
                                     <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                                     <td><input type="text" size="10" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                                     </tr>

                                     <tr>
                                     <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                                     <td><input type="text" size="10" class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                                     
                                     <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>No Pos BC 1.1  </td>
                                     <td><input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
                                     </tr>
                                     
                                </table>
                                </b></td>
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
                                                $bagianWhere .= "konf_bcf15no LIKE '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND konf_bcf15no LIKE '%$bcf15no%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "konf_tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND konf_tahun='$tahun'";
                                           }
                                        }
                                        if (isset($_POST['Bc11no']))
                                        {
                                           $bc11no = $_POST['bc11no'];
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "konf_bc11no LIKE '%$bc11no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND konf_bc11no LIKE '%$bc11no%'";
                                           }
                                        }
                                        if (isset($_POST['Bc11pos']))
                                        {
                                           
                                           $bc11pos = $_POST['bc11pos'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "konf_bc11pos like '%$bc11pos%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND konf_bc11pos like '%$bc11pos%'";
                                           }
                                        }
                                        
                                        

                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=newkonfirmasi&pilihloket=new_hardcopy_terkirim";

                    // data mentah 
                    $sql = "SELECT idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,konf_lewatjam,konf_nondp2,konf_tglndp2,konf_nondtpp,konf_tglndtpp,konf_manualhc,konf_jwabanmanualhc
                           FROM kofirmasi_p2 where   (konf_statusakhir='konf_hardcopy'  ) and konf_manualhc='1' and ".$bagianWhere."   order by idbcf15 desc ";
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
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $rpp;
                    $sqltampil = "SELECT idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,konf_lewatjam,konf_nondp2,konf_tglndp2,konf_nondtpp,konf_tglndtpp,konf_manualhc,konf_jwabanmanualhc
                           FROM kofirmasi_p2 where   (konf_statusakhir='konf_hardcopy'  ) and konf_manualhc='1'  and ".$bagianWhere."   order by idbcf15 desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=newkonfirmasi&pilihloket=new_hardcopy_terkirim";

                    // data mentah 
                    $sql = "SELECT idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,konf_lewatjam,konf_nondp2,konf_tglndp2,konf_nondtpp,konf_tglndtpp,konf_manualhc,konf_jwabanmanualhc
                           FROM kofirmasi_p2 where  (konf_statusakhir='konf_hardcopy'  ) and konf_manualhc='1'  order by idbcf15 desc ";
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
                    $sqltampil = "SELECT idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,konf_lewatjam,konf_nondp2,konf_tglndp2,konf_nondtpp,konf_tglndtpp,konf_manualhc,konf_jwabanmanualhc
                           FROM kofirmasi_p2 where  (konf_statusakhir='konf_hardcopy'  ) and konf_manualhc='1' order by idbcf15 desc  LIMIT $limit,$rpp" ;

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
        
                
                    <table class="data" width="100%">
                            <tr ><th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel"  colspan="3">BC 1.1</th>
                            <th class="judultabel"  colspan="4">Respon Konfirmasi</th>
                            <th class="judultabel"  colspan="2">Nota Dinas Penimbunan</th>
                            <th class="judultabel" rowspan="2">Status</th>
                            <th class="judultabel" rowspan="2" colspan="3">Action</th>
                            </tr>
                            <tr>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Pos /sub</th>
                                <th class="judultabel">Blokir</th>
                                <th class="judultabel">Segel</th>
                                <th class="judultabel">NHI</th>
                                <th class="judultabel">Catatan</th>
                                
                                <th class="judultabel" >Nomor</th>
                                <th class="judultabel" >Tanggal</th>
                               
                                
                                

                            </tr>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                    if($data['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($data['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($data['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($data['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
                      if($data['konf_lewatjam']=='1') {$respon='<img src="images/new/ok.png" />';} elseif($data['konf_lewatjam']=='0'){$respon='--';}
                      if($data['konf_manualhc']=='1') {$manualtpp='<img src="images/new/ok.png" />';} elseif($data['konf_manualhc']=='0'){$manualtpp='System';}
                      if($data['konf_jwabanmanualhc']=='1') {$manualp2='<img src="images/new/ok.png" />';} elseif($data['konf_jwabanmanualhc']=='0'){$manualp2='System';}
                     
                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1 >";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2 >";
                                            $j--;
                                            }

                    ?>
                    <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['konf_bcf15tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['konf_bc11no']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_bc11tgl']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_bc11pos']; ?></td>
                    
                    
                    <td class="isitabel"><?php echo  $data['konf_stsblokir']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_stssegel']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_stsnhi']; ?></td>
                    <td class="isitabel"><?php echo  $data['status_ket']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_nondtpp']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_tglndtpp']; ?></td>
                    
                    
                    <td class="isitabel"><?php echo  $status; ?></td>
                    <td class="isitabel"><a href="?hal=newkonfirmasi&pilihloket=new_viewkonf&id=<?php echo $data['idbcf15'] ?>">Lihat</a></td>
                    <td class="isitabel"><a href="?hal=newkonfirmasi&pilihloket=new_hardcopy_kirim&id=<?php echo $data['idbcf15'] ?>">Edit</a></td>
                    <td class="isitabel"><a href="report/doc/ndkonfirmasi.php?id=<?php echo $data['idbcf15'] ?>&tahun=<?php echo $data['tahun'] ?>&nond=<?php echo $data['ndkonfirmasino'] ?>">Cetak</a></td>
                    
                    
                   
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