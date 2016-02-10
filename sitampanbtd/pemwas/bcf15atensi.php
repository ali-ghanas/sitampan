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
    <title>Update Status BCF 1.5</title>
   
    <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal2").datepicker({
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
                    <table width="100%"><tr><td class="judultabel1">ATENSI!</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=pagebcf15pemwas&pilih=bcfatensi"; ?> >
                    
                        <table border="0" bgcolor="#eeefff" class="isitabel">
                        
                        <tr bgcolor="#eee">
                            <td class="isitabel" colspan="2"><b>Dibawah ini adalah BCF 1.5 yang sedang diatensi oleh Petugas.
                        <tr valign="top">
                            <td>
                                <table class="isitabel" bgcolor="#eee" border="0">
                                    <tr><td colspan="4"><b>Pilih Kriteria Pencarian BCF 1.5</b></td></tr>
                          
                             <tr>
                             <td ><input  type="checkbox" name="Bcf15no" value="1"  <?php  if($_POST['Bcf15no'] == 1){echo 'checked="checked"';}?>>No BCF 1.5</td>
                             <td><input size="10" type="text"  class="required" name="bcf15no" value="<?php echo $_POST['bcf15no']?>"></td>
                             
                             <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Tahun BCF 1.5 (2013 dst)</td>
                             <td><input type="text" size="10" class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>
                             </tr>
                             
                             <tr>
                             <td><input type="checkbox" name="Bc11no" value="1"  <?php  if($_POST['Bc11no'] == 1){echo 'checked="checked"';}?>>No BC 1.1 </td>
                             <td><input size="10" type="text"  class="required" name="bc11no" value="<?php echo $_POST['bc11no']?>"> </td>
                             
                             <td><input type="checkbox" name="Bc11pos" value="1"  <?php  if($_POST['Bc11pos'] == 1){echo 'checked="checked"';}?>>No Pos BC 1.1  </td>
                             <td><input type="text" size="10" class="required" name="bc11pos" value="<?php echo $_POST['bc11pos']?>"></td>
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
                                                $bagianWhere .= "bcf15.bcf15no LIKE '%$bcf15no%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.bcf15no LIKE '%$bcf15no%'";
                                           }
                                        }
                                        if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.tahun='$tahun'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.tahun='$tahun'";
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
                                       
                                        

                        $datapp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $dataeload = "index.php?hal=pagebcf15pemwas&pilih=bcfatensi";

                    // data mentah 
                    $sql = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,tundalelang,tglsuratpermohonan,bcf15.idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,catatan_kaki  where catatan_kaki.idbcf15=bcf15.idbcf15 and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='2' and ".$bagianWhere."   group by bcf15no,tahun ";
                    $dataesult = mysql_query($sql);

                    $tcount = mysql_num_rows($dataesult);

                    $tpages = ($tcount) ? ceil($tcount/$datapp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$datapp;
                    while(($count<$datapp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($dataesult,$i);
                        $query = mysql_fetch_array($dataesult);

                        // output each row:

                        $i++;
                        $count++;
                            }

                    // by default we show first page
                    $nohal = 1;
                     
                        //jika data tidak ditemukan
                        if($count==0){
                                echo "<strong><font color=blue size=3>Tidak ada data yang dicari!";
                                     }
                   

                    // if $_GET['page'] defined, use it as page number
                    if(isset($_GET['page']))
                            {
                        $nohal= $_GET['page'];
                            }

                    // counting the offset
                    $limit = ($nohal - 1) * $datapp;
                    $sqltampil = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,tundalelang,tglsuratpermohonan,bcf15.idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,catatan_kaki  where catatan_kaki.idbcf15=bcf15.idbcf15 and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='2' and ".$bagianWhere."  group by bcf15no,tahun  LIMIT $limit,$datapp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($dataesult);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $datapp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $dataeload = "index.php?hal=pagebcf15pemwas&pilih=bcfatensi";

                    // data mentah 
                    $sql = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,tundalelang,tglsuratpermohonan,bcf15.idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,catatan_kaki  where catatan_kaki.idbcf15=bcf15.idbcf15 and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='2'  group by bcf15no,tahun";
                    $dataesult = mysql_query($sql);

                    $tcount = mysql_num_rows($dataesult);

                    $tpages = ($tcount) ? ceil($tcount/$datapp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$datapp;
                    while(($count<$datapp) && ($i<$tcount)) 
                            {
                        mysql_data_seek($dataesult,$i);
                        $query = mysql_fetch_array($dataesult);

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
                    $limit = ($nohal - 1) * $datapp;
                    $sqltampil = "SELECT bcf15.idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,tundalelang,tglsuratpermohonan,bcf15.idstatusakhir,nosuratpermohonan,Pemohon,masuk,NHPLelangNo,NHPLelangDate,idpemeriksa_tpp,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,NoKepStatus_Akhr
                        FROM bcf15,tpp,catatan_kaki  where catatan_kaki.idbcf15=bcf15.idbcf15 and  bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='2' group by bcf15no,tahun  LIMIT $limit,$datapp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($dataesult);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
         <?php 
                    //untuk menampilkan paginasi
                    echo paginate($dataeload, $page, $tpages);
                    ?>
        <br/>
                                    
                    <table border='1' class="data isitabel">
                        <tr >
                        <th rowspan='2' class="judultabel">No</th>
                        <th colspan='2' class="judultabel">BCF 1.5</th>
                        
                        
                        <th rowspan='2' class="judultabel">Consignee</th>
                        
                        
                        
                        <th rowspan='2' class="judultabel">TPP</th>
                        
                        <th rowspan='2' class="judultabel">Lihat</th>
                        
                        </tr>
                        <tr><th class="judultabel">Nomor</th>
                        <th class="judultabel">Tanggal</th>
                        
                                                
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                        if ($data['consignee']=="To Order") { $consignee=$data['notify']; } elseif ($data['consignee']=="to order") { $consignee=$data['notify']; } elseif ($data['consignee']=="To The Order") { $consignee=$data['notify']; } elseif ($data['consignee']=="toorder") { $consignee=$data['notify']; } elseif ($data['consignee']=="ToOrder") {$consignee=$data['notify']; } else  { $consignee=$data['consignee'];}   
                        if ($data['jenis_dok']=="1"){$dok='NHP';}elseif ($data['jenis_dok']=="2"){$dok='BMN';}elseif ($data['jenis_dok']=="3"){$dok='BTDL';}elseif ($data['jenis_dok']=="4"){$dok='Musnah';}elseif ($data['jenis_dok']=="5"){$dok='Lainnya';}
                        if ($data['jenis_dok']=="1"){$no=$data['NHPLelangNo'];$tgl=$data['NHPLelangDate'];}elseif ($data['jenis_dok']=="2"){$no=$data['KepBMNNo'];$tgl=$data['KepBMNtgl'];}elseif ($data['jenis_dok']=="3"){$no=$data['KepLelang1No'];$tgl=$data['KepLelang1tgl'];}elseif ($data['jenis_dok']=="4"){$no=$data['KepMusnahNo'];$tgl=$data['KepMusnahTgl'];}
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
                    <td class="isitabel"><?php echo  $data['bcf15no'] ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl'] ?></td>

                    <td class="isitabel"><?php echo  $consignee ?></td>
                    <td class="isitabel"><?php echo   $data['nm_tpp'] ?></td>
                    
                    
                    <td class="isitabel"><a href="?hal=cat_petugas&id=<?php echo $data['idbcf15'] ?>">Lihat</a></td>
                    
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
