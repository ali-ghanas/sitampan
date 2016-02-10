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
                    <table width="100%"><tr><td class="judultabel1">DAFTAR USULAN BTD YANG TIDAK LAKU LELANG KE DUA</td></tr></table>
                    <form method="post" action=<?php echo "index.php?hal=pagebcf15pemwas&pilih=bcfatensi"; ?> >
                    
                        <table border="0" bgcolor="#eeefff" class="isitabel">
                        
                        <tr bgcolor="#eee">
                            <td class="isitabel" colspan="2"><b>Dibawah ini adalah BTD Lelang Kedua Yang Tidak Laku Lelang yang sedang dalam proses pengusulan ke Menteri Keuangan.
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
                    $sql = "SELECT * FROM bcf15_tidaklakulelang2  where  ".$bagianWhere."   order by bcf15no,bcf15tgl ";
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
                    $sqltampil = "SELECT * FROM bcf15_tidaklakulelang2  where  ".$bagianWhere." order by bcf15no,bcf15tgl LIMIT $limit,$datapp";

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
                    $sql = "SELECT * FROM bcf15_tidaklakulelang2 order by bcf15no,bcf15tgl";
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
                    $sqltampil = "SELECT * FROM bcf15_tidaklakulelang2 order by bcf15no,bcf15tgl  LIMIT $limit,$datapp" ;

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
                        <th colspan='3' class="judultabel">Usulan Ke Menteri</th>    
                       
                        <th colspan='2' class="judultabel">BCF 1.5</th>
                        
                        
                        <th rowspan='2' class="judultabel">Kep L1</th>
                        <th rowspan='2' class="judultabel">Kep L2</th>
                        
                        <th rowspan='2' class="judultabel">PENETAPAN</th>
                        <th rowspan='2' class="judultabel">STATUS BCF 1.5</th>
                        
                        </tr>
                        <tr>
                        <th class="judultabel">Nomor</th>
                        <th class="judultabel">Tanggal</th>
                         <th class="judultabel">Usulan</th>
                        <th class="judultabel">Nomor</th>
                        <th class="judultabel">Tanggal</th>
                       
                                                
                    
                    <?php
                    while($data = mysql_fetch_array($tampil)){
                                                        $sqlusulan = "SELECT * FROM usulan where idusulan=$data[usulankpu]";
                                                        $qryusulan = @mysql_query($sqlusulan) or die ("Gagal query KPU");
                                                        $datausulan =mysql_fetch_array($qryusulan) ;
                                                        $usulankpu=$datausulan['nm_usulan'];
                                                        
                                                        if($data[status_jwbmk]==''){
                                                            $ptetapmk='-';
                                                        }
                                                        else{
                                                        $sqlmk = "SELECT * FROM usulan where idusulan=$data[status_jwbmk]";
                                                        $qrymk = @mysql_query($sqlmk) or die ("Gagal query MK");
                                                        $datamk =mysql_fetch_array($qrymk) ;
                                                        $ptetapmk=$datamk['nm_usulan'];
                                                        }
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
                    <td class="isitabel"><?php echo  $data['usulan_kpuno'] ?></td>
                    <td class="isitabel"><?php echo  $data['usulan_kpudate'] ?></td>
                    <td class="isitabel"><?php echo  $usulankpu ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no'] ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl'] ?></td>
                    <td class="isitabel"><?php echo  $data['kep_lelang1no'] ?></td>
                    <td class="isitabel"><?php echo  $data['kep_lelang2no'] ?></td>
                    <td class="isitabel"><?php if($data['jwb_mkno']==''){echo "<a href='?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_mk&id=$data[idbcf15]'><img src='images/new/tambah.png' /></a>";} else {echo "$ptetapmk";} ?></td>
                    <td class="isitabel"><?php if($data['status_usulan']=='Usulan'){echo "<a href='?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_tutup&id=$data[idbcf15]'>Usulan MK</a>";} else {echo "$ptetapmk";} ?></td>
                    
                    
                    
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