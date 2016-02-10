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
    <title>Ubah BCF 15</title>
    
       
    </head>
    <body>
    
                   <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();
                     include 'lib/function.php';

                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    
                    $now=date('Y-m-d H:i:s');
                    $sekarang=tglindo($now);
                    //ambildata mentah
                    $sql1 = "SELECT konf_bcf15no,idbcf15,konf_statusakhir,konf_btstgl FROM kofirmasi_p2 where  konf_statusakhir='konf_system' and  konf_btstgl < '$now' ";
                    
                    $query1 = mysql_query($sql1);
                    $cek1=mysql_numrows($query1);
                    
                    
                   
                    

                   
                    
                            if ($cek1>0){
                               
                                echo "<table bgcolor=#202750><tr><td><img src=images/new/warning.png /></td><td><font color=#fff>Ada $cek1 Konfirmasi BCF 1.5 yang telah melewati tanggal $now pukul  10:00 WIB dan telah berubah status sehingga diharuskan untuk dikirim hardcopy konfirmasi BCF 1.5  </font></td></tr></table></br>";
                                
                     
                            $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                        
                                                        konf_statusakhir='konf_hardcopy',
                                                        konf_lewatjam='1',
                                                        nm_userp2='System',
                                                        nip_userp2='System',
                                                        status_ket='Konf Lewat Batas Waktu',
                                                        konf_tglkonfp2='$now',
                                                        konf_tglkonfotoma='$now'
                                                        
                                                        	WHERE konf_statusakhir='konf_system' and  konf_btstgl < '$now'");
                            }
                            else {
//                                  echo "<table bgcolor=#339cdf><tr><td><font face=verdana color=#fff><b>Dibawah ini adalah Konfirmasi BCF 1.5 yang telah dijawab dan/atau telah selesai dibatalkan BCF 1.5 </b></font></td></tr></table></br>";
                            } 
               
                    
                    ?>
       
                    <form method="post" action=<?php echo "index.php?hal=daftarconf&pilihp2=setuju"; ?> >
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
                                     <tr>
                                        <td><input type="checkbox" name="Consignee" value="1"  <?php  if($_POST['Consignee'] == 1){echo 'checked="checked"';}?>>Consignee </td>
                                     <td><input type="text" size="10" class="required" name="consignee" value="<?php echo $_POST['consignee']?>"> </td>
                                     
                                     <td><input type="checkbox" name="Notify" value="1"  <?php  if($_POST['Notify'] == 1){echo 'checked="checked"';}?>>Notify  </td>
                                     <td><input type="text" size="10" class="required" name="notify" value="<?php echo $_POST['notify']?>"></td> 
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
                                        if (isset($_POST['Consignee']))
                                        {
                                           
                                           $consignee = $_POST['consignee'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "consignee like '%$consignee%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND consignee like '%$consignee%'";
                                           }
                                        }
                                        if (isset($_POST['Notify']))
                                        {
                                           
                                           $notify = $_POST['notify'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "notify like '%$notify%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND notify like '%$notify%'";
                                           }
                                        }
                                       
                                        
                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=daftarconf&pilihp2=setuju";

                    // data mentah ,
                    $sql = "SELECT kofirmasi_p2.idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,consignee,notify
                       FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and   (konf_statusakhir='konf_jawabok' or konf_statusakhir='konf_selesai' ) and ".$bagianWhere."   ";
                    $result = mysql_query($sql);

                    $tcount = mysql_num_rows($result);

                    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$rpp;
                        set_time_limit(10);
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
                    $sqltampil = "SELECT kofirmasi_p2.idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,consignee,notify
                       FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and   (konf_statusakhir='konf_jawabok' or konf_statusakhir='konf_selesai' ) and ".$bagianWhere."    LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=daftarconf&pilihp2=setuju";

                    // data mentah 
                    $sql = "SELECT kofirmasi_p2.idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,consignee,notify
                       FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and   (konf_statusakhir='konf_jawabok' or konf_statusakhir='konf_selesai' )   ";
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
                    $sqltampil = "SELECT kofirmasi_p2.idbcf15,konf_bcf15no,konf_bcf15tgl,konf_tahun,konf_bc11no,konf_bc11tgl,konf_bc11pos,konf_bc11psubpos,konf_tglkonftpp,nm_usertpp,nip_usertpp,ip_usertpp,konf_statusakhir,konf_tglkonfp2,konf_stsblokir,konf_stssegel,konf_stsnhi,status_ket,nm_userp2,nip_userp2,ip_userp2,catatan_userp2,consignee,notify
                       FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and  (konf_statusakhir='konf_jawabok' or konf_statusakhir='konf_selesai' )  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    ob_end_flush();
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
                   <br/>
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
                   <br/>
                    
                    <table class="data" >
                            <tr ><th class="judultabel" rowspan="2">No</th>
                            <th class="judultabel" colspan="2">BCF 1.5</th>
                            <th class="judultabel"  colspan="3">BC 1.1</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            <th class="judultabel" rowspan="2">Notify</th>
                            <th class="judultabel"  colspan="3">Permintaan Konf</th>
                            <th class="judultabel"  colspan="3">Jawaban Konf</th>
                            <th class="judultabel" rowspan="2">Status</th>
                            <th class="judultabel" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Nomor</th>
                                <th class="judultabel">Tanggal</th>
                                <th class="judultabel">Pos /sub</th>
                                <th class="judultabel">Tgl Kirim</th>
                                <th class="judultabel">Petugas</th>
                                <th class="judultabel">IP</th>
                                <th class="judultabel">Tgl Balas</th>
                                <th class="judultabel">Petugas</th>
                                <th class="judultabel">IP</th>

                            </tr>
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                      if($data['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($data['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($data['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($data['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 

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
                    <td class="isitabel"><?php echo  $data['konf_bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  tglindo($data['konf_bcf15tgl']); ?></td>
                    <td class="isitabel"><?php echo $data['konf_bc11no']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_bc11tgl']; ?></td>
                    <td class="isitabel"><?php echo "pos:"; echo  $data['konf_bc11pos']; echo " sub pos:";echo  $data['konf_bc11psubpos']; ?></td>
                    <td class="isitabel"><?php echo  $data['consignee']; ?></td>
                    <td class="isitabel"><?php echo  $data['notify']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_tglkonftpp']; ?></td>
                    <td class="isitabel">Nama :<?php echo  $data['nm_usertpp']; ?><br/> Nip : <?php echo  $data['nip_usertpp']; ?> <br/></td>
                    <td class="isitabel"><?php echo  $data['ip_usertpp']; ?></td>
                    <td class="isitabel"><?php echo  $data['konf_tglkonfp2']; ?></td>
                    <td class="isitabel">Nama :<?php echo  $data['nm_userp2']; ?><br/> Nip : <?php echo  $data['nip_userp2']; ?> <br/></td>
                    <td class="isitabel"><?php echo  $data['ip_userp2']; ?></td>
                    <td class="isitabel"><?php echo  $status; ?></td>
                    <td class="isitabel"><a href="?hal=daftarconf&pilihp2=view&id=<?php echo $data['idbcf15'] ?>">Lihat</a></td>
                   
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